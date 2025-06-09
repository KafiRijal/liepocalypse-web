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
                        <div id="inputError" style="color: red; font-size: 0.9rem; margin-top: 5px; display: none;"></div>
                    </div>
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
                Liepocalypse menyediakan fitur-fitur utama berbasis kecerdasan buatan yang dirancang untuk membantu pengguna dalam mendeteksi dan memverifikasi berita hoaks secara efisien. Fitur-fitur ini dikembangkan berdasarkan kebutuhan masyarakat akan literasi digital yang lebih baik dan akses informasi yang terpercaya.
            </p>
            <div class="row home-features-row">
                <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6">
                    <div class="features-cir-main">
                        <div class="features-cir">
                            <img src="assets/images/svg/features1.svg" alt="features1" />
                        </div>
                        <span class="img-bg-circle"></span>
                    </div>
                    <h3 class="gendseratio">Analisis Teks atau Link Berita</h3>
                    <p class="eugiat">
                        Aplikasi dapat menganalisis teks atau URL berita untuk mendeteksi kemungkinan hoaks menggunakan AI dan NLP (Natural Language Processing).
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
                        Memberikan nilai probabilitas (confidence score) apakah berita tersebut kemungkinan hoaks atau tidak.
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
        let currentInputMode = null;

        document.getElementById("factCheckForm").addEventListener("submit", function(e) {
            e.preventDefault();

            const formData = new FormData(this);

            const errorBox = document.getElementById("inputError");
            if (!isInputValid(formData)) {
                errorBox.textContent = "Silakan pilih input mode dan masukkan data dengan benar.";
                errorBox.style.display = "block";
                return;
            } else {
                errorBox.style.display = "none";
            }

            detectFakeNews();
        });

        if (mode === "text") {
            inputArea.innerHTML = `
        <textarea name="textInput" rows="5" placeholder="Tulis teks berita di sini..." required></textarea>
        <div id="inputError" style="color: red; font-size: 0.9rem; margin-top: 5px; display: none;"></div>
    `;
        } else if (mode === "link") {
            inputArea.innerHTML = `
        <input type="url" name="linkInput" placeholder="Masukkan link berita..." required />
        <div id="inputError" style="color: red; font-size: 0.9rem; margin-top: 5px; display: none;"></div>
    `;
        } else if (mode === "image") {
            inputArea.innerHTML = `
        <div class="custom-file-input-wrapper">
            <label for="fileUpload" class="custom-file-label">Pilih Gambar Berita</label>
            <input type="file" id="fileUpload" name="imageInput" accept="image/*" onchange="updateFileName(this)" />
            <span id="file-name">Belum ada file</span>
        </div>
        <div id="inputError" style="color: red; font-size: 0.9rem; margin-top: 5px; display: none;"></div>
    `;
        }

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

            document.querySelectorAll('.hometags').forEach(btn => btn.classList.remove('active'));
            button.classList.add('active');
        }
    </script>
@endsection
