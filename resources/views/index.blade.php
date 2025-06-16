@extends('template/main')

@section('content')
    <!-- ====================================== Section One ===================================== -->
    <section class="section-one position-relative" id="home">
        <img class="blue-gardient1" src="{{ asset('assets/images/home-page/blue-gardient1.png') }}" alt="blue-gardient1" />
        <img class="blue-gardient2" src="{{ asset('assets/images/home-page/blue-gardient2.png') }}" alt="blue-gardient2" />
        <div class="container">
            <p class="elevate">Temukan Kebenaran di Balik Berita</p>
            <h1 class="bestAI">Liepocalypse</h1>
            <p class="olut">
                Liepocalypse menggunakan AI untuk mendeteksi hoaks dan memverifikasi informasi dari berbagai sumber.
            </p>
            <form id="factCheckForm" action="{{ route('deteksi.hoaks') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="inputGenerate">
                    <div id="inputArea" class="input-field">
                        {{-- Default tampil: placeholder perintah --}}
                        <input type="text" name="defaultInput" id="defaultInput"
                            placeholder="Pilih input mode terlebih dahulu" style="display: block;" readonly />

                        {{-- Input teks --}}
                        <textarea name="text" id="textInput" placeholder="Tulis berita di sini..." style="display: none;"></textarea>

                        {{-- Input link --}}
                        <input type="text" name="url" id="linkInput" placeholder="Masukkan link berita..."
                            style="display: none;" />

                        {{-- Input gambar --}}
                        <input type="file" name="file" id="imageInput" accept="image/*" style="display: none;" />

                        <div id="inputError"
                            style="color: red; font-size: 0.9rem; margin-top: 5px; {{ $errors->has('input_error') ? '' : 'display: none;' }}">
                            {{ $errors->first('input_error') }}
                        </div>
                    </div>

                    @auth
                        <button type="submit" class="button generate-btn">Cek Fakta
                            <span class="hoverEffect"><span></span></span>
                        </button>
                    @else
                        {{-- Jangan pakai type="submit" agar tidak submit form --}}
                        <button type="button" class="button generate-btn" data-bs-toggle="modal"
                            data-bs-target="#exampleModal">
                            Cek Fakta
                            <span class="hoverEffect"><span></span></span>
                        </button>
                    @endauth
                </div>
            </form>
            <div id="loadingIndicator" style="display: none; text-align: center; margin-top: 20px;">
                <div class="custom-spinner"></div>
                <p style="color:#00ffc2">Sedang mendeteksi...</p>
            </div>

            @php
                $result = session('result');
            @endphp

            @if ($result)
                <div class="result-hoax-box relative">
                    <h2 class="result-title">Hasil Deteksi Hoaks</h2>

                    <!-- Tombol Clear -->
                    <form action="{{ route('clear.session') }}" method="POST"
                        style="position: absolute; top: 1rem; right: 1rem;">
                        @csrf
                        <button type="submit" class="clear-button">Reset Deteksi</button>
                    </form>

                    <p><strong>📝 Ringkasan:</strong> {{ $result->summary ?? '-' }}</p>

                    <p>
                        <strong>✅ Hasil Deteksi:</strong>
                        <span class="verdict-result">{{ $result->verdict ?? '-' }}</span>
                    </p>

                    @if (!empty($result->related_articles))
                        <p><strong>🔗 Artikel Pembanding:</strong></p>
                        <ul class="related-links">
                            @foreach ($result->related_articles as $link)
                                <li><a href="{{ $link }}" target="_blank">{{ $link }}</a></li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            @endif

            <div class="hometags-main">
                <p class="popTg">Input Mode:</p>
                @auth
                    <button class="hometags" data-mode="text">Teks Manual</button>
                    <button class="hometags" data-mode="link">Link Berita</button>
                    <button class="hometags" data-mode="image">File Berita</button>
                @else
                    <button class="hometags requires-auth" data-mode="text">Teks Manual</button>
                    <button class="hometags requires-auth" data-mode="link">Link Berita</button>
                    <button class="hometags requires-auth" data-mode="image">File Berita</button>
                @endauth
            </div>
        </div>
    </section>
    <!-- ====================================== Section Two ===================================== -->
    <section class="section-two position-relative mt-5">
        <img class="round-gradient1" src="assets/images/home-page/round-gradient1.png" alt="round-gradient1" />
        <div class="container">
            <h2 class="sec-heding">Fitur <span>Liepocalypse</span></h2>
            <p class="sub-heding">
                Liepocalypse menyediakan fitur-fitur utama berbasis kecerdasan buatan yang dirancang untuk membantu pengguna
                dalam mendeteksi dan memverifikasi berita hoaks secara efisien. Fitur-fitur ini dikembangkan berdasarkan
                kebutuhan masyarakat akan literasi digital yang lebih baik dan akses informasi yang terpercaya.
            </p>
            <div class="row home-features-row">
                <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6">
                    <div class="features-cir-main">
                        <div class="features-cir">
                            <img src="assets/images/svg/features1.svg" alt="features1" />
                        </div>
                        <span class="img-bg-circle"></span>
                    </div>
                    <h3 class="gendseratio">Analisis Berita</h3>
                    <p class="eugiat">
                        Aplikasi dapat menganalisis teks, URL, dan file berita untuk mendeteksi kemungkinan hoaks
                        menggunakan AI
                        dan NLP (Natural Language Processing).
                    </p>
                </div>
                <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6">
                    <div class="features-cir-main">
                        <div class="features-cir">
                            <img src="assets/images/svg/features2.svg" alt="features2" />
                        </div>
                        <span class="img-bg-circle"></span>
                    </div>
                    <h3 class="gendseratio">Skor Kepercayaan</h3>
                    <p class="eugiat">
                        Memberikan nilai probabilitas (confidence score) apakah berita tersebut kemungkinan hoaks atau
                        tidak.
                    </p>
                </div>
                <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6">
                    <div class="features-cir-main">
                        <div class="features-cir">
                            <img src="assets/images/svg/features3.svg" alt="features3" />
                        </div>
                        <span class="img-bg-circle"></span>
                    </div>
                    <h3 class="gendseratio">Riwayat Pengecekan</h3>
                    <p class="eugiat">
                        Menyimpan catatan histori pengecekan yang dilakukan pengguna untuk referensi di masa depan.
                    </p>
                </div>

            </div>
        </div>
    </section>
@endsection
@section('template_scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            let currentMode = null;

            function setInputMode(mode, button) {
                currentMode = mode;

                const defaultInput = document.getElementById('defaultInput');
                const textInput = document.getElementById('textInput');
                const linkInput = document.getElementById('linkInput');
                const imageInput = document.getElementById('imageInput');
                const inputError = document.getElementById('inputError');

                if (!defaultInput || !textInput || !linkInput || !imageInput) {
                    console.error("Salah satu elemen input tidak ditemukan.");
                    return;
                }

                // Sembunyikan semua input
                defaultInput.style.display = 'none';
                textInput.style.display = 'none';
                linkInput.style.display = 'none';
                imageInput.style.display = 'none';

                // Tampilkan sesuai mode
                if (mode === 'text') {
                    textInput.style.display = 'block';
                } else if (mode === 'link') {
                    linkInput.style.display = 'block';
                } else if (mode === 'image') {
                    imageInput.style.display = 'block';
                }

                if (inputError) inputError.style.display = 'none';

                // Highlight tombol aktif
                document.querySelectorAll('.hometags').forEach(btn => btn.classList.remove('active'));
                if (button) button.classList.add('active');
            }

            // Pasang event listener hanya untuk user yang login
            @auth
            document.querySelectorAll('.hometags').forEach(button => {
                button.addEventListener('click', function() {
                    const mode = this.textContent.trim().toLowerCase().includes('teks') ? 'text' :
                        this.textContent.trim().toLowerCase().includes('link') ? 'link' : 'image';
                    setInputMode(mode, this);
                });
            });
        @endauth

        // Script khusus guest
        @guest document.querySelectorAll('.requires-auth').forEach(el => {
            el.addEventListener('click', function(e) {
                e.preventDefault();
                const modal = new bootstrap.Modal(document.getElementById('exampleModal'));
                modal.show();
            });
        });
        @endguest
        });

        document.getElementById('factCheckForm')?.addEventListener('submit', function() {
            document.getElementById('loadingIndicator').style.display = 'block';
        });
    </script>
@endsection
