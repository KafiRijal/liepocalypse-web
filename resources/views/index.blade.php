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

            @if (!empty($result))
                <div class="result-section mt-4 p-3 border rounded bg-light">
                    <h4>Hasil Deteksi Hoaks</h4>
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
                </div>
            @endif

            <div class="hometags-main">
                <p class="popTg">Input Mode:</p>
                @auth
                    <button class="hometags" data-mode="text">Teks Manual</button>
                    <button class="hometags" data-mode="link">Link Berita</button>
                    <button class="hometags" data-mode="image">Gambar Berita</button>
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
                Interdum nec tortor duis sodales amet fermentum. Faucibus ipsum
                feugiat lectus hendrerit cum eget. Quisque diam massa at quis
                vestibulum.
            </p>
            <div class="row home-features-row">
                <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6">
                    <div class="features-cir-main">
                        <div class="features-cir">
                            <img src="assets/images/svg/features1.svg" alt="features1" />
                        </div>
                        <span class="img-bg-circle"></span>
                    </div>
                    <h3 class="gendseratio">AI-Powered Analysis</h3>
                    <p class="eugiat">
                        Feugiat non in potenti velit proin semper. In tellus sit erat
                        turpis suspendisse tincidunt venenatis quam risus.
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
                        Nec pulvinar morbi eget justo amet elementum volutpat est arcu.
                        Libero viverra pellentesque faucibus dignissim.
                    </p>
                </div>
                <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6">
                    <div class="features-cir-main">
                        <div class="features-cir">
                            <img src="assets/images/svg/features5.svg" alt="features5" />
                        </div>
                        <span class="img-bg-circle"></span>
                    </div>
                    <h3 class="gendseratio">Privasi Terjamin</h3>
                    <p class="eugiat">
                        Nec pulvinar morbi eget justo amet elementum volutpat est arcu.
                        Libero viverra pellentesque faucibus dignissim.
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
            const defaultInput = document.getElementById('defaultInput');
            const textInput = document.getElementById('textInput');
            const linkInput = document.getElementById('linkInput');
            const imageInput = document.getElementById('imageInput');
            const inputError = document.getElementById('inputError');

            if (!defaultInput || !textInput || !linkInput || !imageInput) {
                console.error("Elemen input belum ditemukan di DOM.");
                return;
            }

            function setInputMode(mode, button) {
                defaultInput.style.display = 'none';
                textInput.style.display = 'none';
                linkInput.style.display = 'none';
                imageInput.style.display = 'none';

                if (mode === 'text') {
                    textInput.style.display = 'block';
                } else if (mode === 'link') {
                    linkInput.style.display = 'block';
                } else if (mode === 'image') {
                    imageInput.style.display = 'block';
                }

                if (inputError) inputError.style.display = 'none';

                document.querySelectorAll('.hometags').forEach(btn => btn.classList.remove('active'));
                if (button) button.classList.add('active');
            }

            document.querySelectorAll('.hometags').forEach(button => {
                button.addEventListener('click', function() {
                    const mode = this.dataset.mode;
                    setInputMode(mode, this);
                });
            });

            // Script khusus guest
            @guest
            document.querySelectorAll('.requires-auth').forEach(el => {
                el.addEventListener('click', function(e) {
                    e.preventDefault();
                    const modal = new bootstrap.Modal(document.getElementById('exampleModal'));
                    modal.show();
                });
            });
        @endguest
        });
    </script>
@endsection
