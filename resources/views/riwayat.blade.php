@extends('template/main')

@section('content')
    <!-- ====================================== Section One ===================================== -->
    <section class="section-one position-relative mb-5" id="home">
        <img class="blue-gardient8sa" src="assets/images/home-page/blue-gardient8.png" alt="blue-gardient8">
        <img class="blue-gardient9sa" src="assets/images/home-page/blue-gardient9.png" alt="blue-gardient9">
        <div class="container">
            <h1 class="bestAI">Riwayat Berita</h1>
            <p class="olut">
                Liepocalypse menggunakan AI untuk mendeteksi hoaks dan memverifikasi informasi dari berbagai sumber.
            </p>
            <div class="riwayat-layout mt-5">
                <aside class="sidebar">
                    <h2>Riwayat</h2>
                    <input type="text" placeholder="Cari berita..." id="searchInput">
                    <ul id="historyList"></ul>
                </aside>
                <main class="detail-panel">
                    <div id="riwayatDetail">
                        <p>Pilih riwayat di sebelah kiri untuk melihat detail.</p>
                    </div>
                </main>
            </div>
        </div>
    </section>
@endsection

@section('template_scripts')
    <script>
        const historyData = [{
                id: 1,
                title: "Berita Tentang Kebakaran Palsu",
                inputType: "link",
                inputValue: "https://berita-hoax.com",
                score: 35
            },
            {
                id: 2,
                title: "Berita Tentang Vaksin Aman",
                inputType: "text",
                inputValue: "Vaksin terbukti aman berdasarkan uji klinis...",
                score: 92
            },
            {
                id: 3,
                title: "Gambar Berita Hoax",
                inputType: "image",
                inputValue: "https://via.placeholder.com/300x200.png?text=Gambar+Hoax",
                score: 27
            }
        ];

        const list = document.getElementById("historyList");
        const detail = document.getElementById("riwayatDetail");
        const searchInput = document.getElementById("searchInput");

        function renderList(filter = "") {
            list.innerHTML = "";
            historyData
                .filter(item => item.title.toLowerCase().includes(filter.toLowerCase()))
                .forEach(item => {
                    const li = document.createElement("li");
                    li.textContent = item.title;
                    li.onclick = () => showDetail(item);
                    list.appendChild(li);
                });
        }

        function showDetail(item) {
            detail.innerHTML = `
        <h2>${item.title}</h2>
        <p><strong>Input:</strong> ${
          item.inputType === "image"
            ? `<img src="${item.inputValue}" alt="gambar" style="max-width:300px; margin-top:10px; border-radius:10px; border:2px solid #334155;">`
            : item.inputValue
        }</p>
        <p><strong>Skor Kepercayaan:</strong> ${item.score}%</p>
        <div class="trust-bar"><div style="width:${item.score}%" class="trust-fill"></div></div>
        `;
        }

        searchInput.addEventListener("input", (e) => {
            renderList(e.target.value);
        });

        renderList();
    </script>
@endsection
