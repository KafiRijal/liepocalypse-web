@extends('template/main')

@section('content')
    <!-- ====================================== Section One ===================================== -->
    <section class="section-one position-relative mb-5" id="home">
        <img class="blue-gardient8sa" src="assets/images/home-page/blue-gardient8.png" alt="blue-gardient8">
        <img class="blue-gardient9sa" src="assets/images/home-page/blue-gardient9.png" alt="blue-gardient9">
        <div class="container">
            <!-- Judul Halaman -->
            <h2 class="page-title">Riwayat Pemeriksaan Berita</h2>

            <!-- Container daftar riwayat -->
            <div class="history-list">
                <!-- Tiap item riwayat -->
                <div class="history-item">
                    <h3 class="history-title">[Judul Berita]</h3>
                    <p class="history-date">[Tanggal dicek]</p>
                    <p class="history-result">Hasil: <span class="status hoax">HOAX</span> atau <span
                            class="status valid">VALID</span></p>
                    <a href="#" class="history-link">Lihat Detail</a>
                </div>
                <div class="history-item">
                    <h3 class="history-title">[Judul Berita]</h3>
                    <p class="history-date">[Tanggal dicek]</p>
                    <p class="history-result">Hasil: <span class="status hoax">HOAX</span> atau <span
                            class="status valid">VALID</span></p>
                    <a href="#" class="history-link">Lihat Detail</a>
                </div>
                <div class="history-item">
                    <h3 class="history-title">[Judul Berita]</h3>
                    <p class="history-date">[Tanggal dicek]</p>
                    <p class="history-result">Hasil: <span class="status hoax">HOAX</span> atau <span
                            class="status valid">VALID</span></p>
                    <a href="#" class="history-link">Lihat Detail</a>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('template_scripts')
@endsection
