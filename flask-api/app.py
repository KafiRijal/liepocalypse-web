from flask import Flask, request, jsonify
from newspaper import Article, Config
from transformers import pipeline
from serpapi import GoogleSearch
import logging
import os
from sklearn.feature_extraction.text import TfidfVectorizer
from sklearn.metrics.pairwise import cosine_similarity
from PIL import Image
import pytesseract
import io
from flask_cors import CORS

pytesseract.pytesseract.tesseract_cmd = r'C:\Program Files\Tesseract-OCR\tesseract.exe'

app = Flask(__name__)
logging.basicConfig(level=logging.INFO)
CORS(app)

# Load AI models
summarizer = pipeline("summarization", model="facebook/bart-large-cnn")
nli_model = pipeline("text-classification", model="roberta-large-mnli")

SERP_API_KEY = "123ed16c72c2586fd9c255b152ca1557049b76d181613774ad99944b9570ad3b"

# Fungsi bantu
def fetch_article_text(url):
    config = Config()
    config.browser_user_agent = 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Safari/537.36'
    config.request_timeout = 10

    article = Article(url, config=config)
    article.download()
    article.parse()
    return article.text

def chunk_text(text, max_words=200):
    words = text.split()
    return [" ".join(words[i:i+max_words]) for i in range(0, len(words), max_words)]

def summarize_article(article_text):
    chunks = chunk_text(article_text, max_words=200)
    summaries = []
    for chunk in chunks:
        try:
            summary = summarizer(chunk, max_length=100, min_length=30, do_sample=False)
            summaries.append(summary[0]['summary_text'])
        except Exception as e:
            logging.warning(f"Gagal merangkum: {e}")
    return " ".join(summaries)

def search_related_articles(query):
    params = {
        "q": query,
        "api_key": SERP_API_KEY,
        "num": 3,
        "engine": "google",
    }
    search = GoogleSearch(params)
    results = search.get_dict()
    links = []
    for r in results.get("organic_results", []):
        link = r.get("link")
        if link:
            links.append(link)
        if len(links) >= 3:
            break
    return links

def fetch_texts_from_urls(urls):
    texts = []
    for url in urls:
        try:
            article = Article(url)
            article.download()
            article.parse()
            texts.append(article.text[:1000])
        except Exception as e:
            logging.warning(f"Gagal fetch dari {url}: {e}")
    return texts

def verify_claim_with_sources(claim, sources):
    verdicts = []
    for source in sources:
        try:
            result = nli_model(f"{claim} </s> {source}")
            verdicts.append(result[0])
        except Exception as e:
            logging.warning(f"Gagal verifikasi: {e}")
    return verdicts

@app.route('/api/detect', methods=['POST'])
def detect():
    url = request.form.get('url')
    text_input = request.form.get('text')
    file = request.files.get('file')

    try:
        # Ambil teks dari URL
        if url:
            article_text = fetch_article_text(url)

        # Ambil teks langsung dari inputan
        elif text_input:
            article_text = text_input

        # Ambil teks dari gambar (OCR)
        elif file:
            image = Image.open(io.BytesIO(file.read()))
            article_text = pytesseract.image_to_string(image)

        else:
            return jsonify({'error': 'Tidak ada input yang diberikan'}), 400

        if not article_text.strip():
            return jsonify({'error': 'Artikel kosong atau tidak valid'}), 400

        summary = summarize_article(article_text)
        related_urls = search_related_articles(summary)
        related_texts = fetch_texts_from_urls(related_urls)
        verdicts = verify_claim_with_sources(summary, related_texts)

        entailments = sum(1 for v in verdicts if v['label'] == 'ENTAILMENT')
        contradictions = sum(1 for v in verdicts if v['label'] == 'CONTRADICTION')

        verdict_label = 'BENAR / FAKTA' if entailments >= contradictions else 'PALSU / HOAX'

        return jsonify({
            'summary': summary,
            'verdict': verdict_label,
            'related_articles': related_urls,
        })

    except Exception as e:
        logging.error(f"Deteksi gagal: {e}")
        return jsonify({'error': str(e)}), 500

if __name__ == '__main__':
    app.run(debug=True)
