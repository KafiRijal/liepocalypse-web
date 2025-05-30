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
            <form id="factCheckForm">
                <div class="inputGenerate">
                    <div id="inputArea" class="input-field">
                        <!-- Akan diisi dinamis lewat JS -->
                    </div>

                    <!-- Tombol submit -->
                    <button type="submit" class="button generate-btn">Cek Fakta
                        <span class="hoverEffect"><span></span></span>
                    </button>
                </div>
            </form>
            <div class="trust-score-box" id="trustScoreBox" style="display: none;">
                <p class="trust-title">Skor Kepercayaan Berita:</p>
                <div class="score-value" id="trustScoreValue">85%</div>
                <div class="trust-bar">
                    <div id="trustBarFill" class="trust-fill" style="width: 85%;"></div>
                </div>
            </div>
            <div class="hometags-main">
                <p class="popTg">Input Mode:</p>
                <button class="hometags" onclick="setInputMode('text', this)">Teks Manual</button>
                <button class="hometags" onclick="setInputMode('link', this)">Link Berita</button>
                <button class="hometags" onclick="setInputMode('image', this)">Gambar Berita</button>
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
                    <h3 class="gendseratio">Database Kredibel</h3>
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
                    <h3 class="gendseratio">Pendeteksian Hoaks Multimodal</h3>
                    <p class="eugiat">
                        Consectetur tellus scelerisque sagittis est sit. Elit sit urna
                        volutpat eu non lorem eu. Tellus senectus tristique Risus.
                    </p>
                </div>
                <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6">
                    <div class="features-cir-main">
                        <div class="features-cir">
                            <img src="assets/images/svg/features4.svg" alt="features4" />
                        </div>
                        <span class="img-bg-circle"></span>
                    </div>
                    <h3 class="gendseratio">User-Friendly Interface</h3>
                    <p class="eugiat">
                        Feugiat non in potenti velit proin semper. In tellus sit erat
                        turpis suspendisse tincidunt venenatis quam risus.
                    </p>
                </div>
                <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6">
                    <div class="features-cir-main">
                        <div class="features-cir">
                            <img src="assets/images/svg/features6.svg" alt="features6" />
                        </div>
                        <span class="img-bg-circle"></span>
                    </div>
                    <h3 class="gendseratio">Flexible Pricing</h3>
                    <p class="eugiat">
                        Consectetur tellus scelerisque sagittis est sit. Elit sit urna
                        volutpat eu non lorem eu. Tellus senectus tristique Risus.
                    </p>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('template_scripts')
    <script>
        let currentInputMode = null;

        document.getElementById("factCheckForm").addEventListener("submit", function(e) {
            e.preventDefault();

            const formData = new FormData(this);

            if (!isInputValid(formData)) {
                alert("Silakan pilih input mode terlebih dahulu.");
                return;
            }

            detectFakeNews();
        });

        function isInputValid(formData) {
            if (currentInputMode === "text") {
                return formData.get("textInput")?.trim().length > 0;
            } else if (currentInputMode === "link") {
                return formData.get("linkInput")?.trim().length > 0;
            } else if (currentInputMode === "image") {
                return formData.get("imageInput")?.name?.length > 0;
            }
            return false;
        }

        function detectFakeNews() {
            const score = Math.floor(Math.random() * 101); // Skor acak 0-100%
            document.getElementById('trustScoreValue').textContent = score + '%';
            document.getElementById('trustBarFill').style.width = score + '%';
            document.getElementById('trustScoreBox').style.display = 'block';
        }

        function setInputMode(mode, el) {
            currentInputMode = mode; // simpan input mode yang dipilih

            document.querySelectorAll('.hometags').forEach(btn => btn.classList.remove('active'));
            el.classList.add('active');

            const inputArea = document.getElementById("inputArea");

            if (mode === "text") {
                inputArea.innerHTML =
                    `<textarea name="textInput" rows="5" placeholder="Tulis teks berita di sini..." required></textarea>`;
            } else if (mode === "link") {
                inputArea.innerHTML =
                    `<input type="url" name="linkInput" placeholder="Masukkan link berita..." required />`;
            } else if (mode === "image") {
                inputArea.innerHTML = `
            <div class="custom-file-input-wrapper">
                <label for="fileUpload" class="custom-file-label">Pilih Gambar Berita</label>
                <input type="file" id="fileUpload" name="imageInput" accept="image/*" onchange="updateFileName(this)" />
                <span id="file-name">Belum ada file</span>
            </div>
        `;
            }
        }

        function updateFileName(input) {
            const fileName = input.files.length > 0 ? input.files[0].name : "Belum ada file";
            document.getElementById("file-name").textContent = fileName;

            // Ganti tombol aktif
            document.querySelectorAll('.hometags').forEach(btn => btn.classList.remove('active'));
            button.classList.add('active');
        }
    </script>
@endsection
