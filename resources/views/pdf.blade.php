<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Riwayat Deteksi Hoaks</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            color: #333;
            font-size: 14px;
            line-height: 1.6;
            padding: 40px;
        }

        .header {
            text-align: center;
            margin-bottom: 30px;
        }

        .header h2 {
            margin: 0;
            font-size: 24px;
            color: #4A47A3;
        }

        .section {
            margin-bottom: 25px;
        }

        .section h4 {
            color: #222;
            border-bottom: 1px solid #ccc;
            padding-bottom: 5px;
            margin-bottom: 10px;
        }

        .verdict {
            display: inline-block;
            padding: 6px 12px;
            border-radius: 5px;
            background-color: #e0f7e9;
            color: #2e7d32;
            font-weight: bold;
        }

        .links a {
            color: #1e88e5;
            text-decoration: none;
            display: block;
            margin-bottom: 5px;
        }

        .footer {
            text-align: center;
            font-size: 12px;
            margin-top: 50px;
            color: #999;
        }
    </style>
</head>

<body>
    <div class="header">
        <h2>Laporan Deteksi Hoaks</h2>
        <p>Dihasilkan oleh Liepocalypse</p>
    </div>

    <div class="section">
        <h4>Ringkasan Berita</h4>
        <p>{{ $riwayat->summary }}</p>
    </div>

    <div class="section">
        <h4>Hasil Deteksi</h4>
        <p class="verdict">{{ $riwayat->verdict }}</p>
    </div>

    <div class="section">
        <h4>Artikel Terkait</h4>
        @php
            $articles = is_array($riwayat->related_articles)
                ? $riwayat->related_articles
                : json_decode($riwayat->related_articles, true);
        @endphp
        <div class="links">
            @foreach ($articles as $link)
                <a href="{{ $link }}">{{ $link }}</a>
            @endforeach
        </div>
    </div>

    <div class="footer">
        © {{ date('Y') }} Liepocalypse. Semua hak dilindungi.
    </div>
</body>

</html>
