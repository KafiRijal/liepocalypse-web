<h2>Hasil Deteksi Hoaks</h2>

<p><strong>Ringkasan:</strong> {{ $result['summary'] }}</p>
<p><strong>Hasil Deteksi:</strong> {{ $result['verdict'] }}</p>

@if (!empty($result['related_articles']))
    <p><strong>Artikel Pembanding:</strong></p>
    <ul>
        @foreach ($result['related_articles'] as $link)
            <li><a href="{{ $link }}" target="_blank">{{ $link }}</a></li>
        @endforeach
    </ul>
@endif
