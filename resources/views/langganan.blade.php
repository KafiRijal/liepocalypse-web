@extends('template/main')

@section('content')
    <!-- ====================================== Section Eight ===================================== -->
    <section class="section-eight position-relative">
        <img class="blue-gardient8sa" src="{{ asset('assets/images/home-page/blue-gardient8.png') }}" alt="blue-gardient8">
        <img class="blue-gardient9sa" src="{{ asset('assets/images/home-page/blue-gardient9.png') }}" alt="blue-gardient9">
        <div class="container">
            <h1 class="sec-heding">Ayo<span> Berlangganan</span> Sekarang</h1>
            <p class="sub-heding">Dapatkan akses premium untuk mendeteksi kebenaran berita secara instan dan akurat dengan
                teknologi AI. Pilih paket terbaik untuk kebutuhanmu!</p>
            <nav class="tabs-btn">
                <a href="javascript:void(0);" data-tab="one" class="monthly active">Bulanan</a>
                <a href="javascript:void(0);" data-tab="two" class="yearly">Tahunan</a>
                <div class="clear"></div>
            </nav>
            <div class="tabContainer">
                <div id="one" class="Tabcondent active">
                    <div class="row team-page-row">

                        <!-- Paket Gratis -->
                        <div class="col-xxl-4 col-xl-4 col-lg-6 col-md-6">
                            <div class="plan-body">
                                <div class="plan-header">
                                    <span class="plain-greiesd-bg" id="price1"></span>
                                    <h2 class="plan-text">Liepocalypse Basic</h2>
                                    <h3 class="plan-price">$0 <sub>/Bulan</sub></h3>
                                    <h3 class="basicLevelPro">Cocok untuk pengguna baru</h3>
                                </div>
                                <ul>
                                    <li>Deteksi hingga 100 berita/bulan</li>
                                    <li>Analisis dasar dari AI</li>
                                    <li>Bantuan via email</li>
                                    <li>Laporan ringkasan tanpa penjelasan detail</li>
                                </ul>
                                <div class="pricing-btn">
                                    <a href="#" class="button"> Coba Gratis
                                        <span class="hoverEffect"><span></span></span>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <!-- Paket Premium -->
                        <div class="col-xxl-4 col-xl-4 col-lg-6 col-md-6">
                            <div class="plan-body">
                                <div class="plan-header">
                                    <span class="plain-greiesd-bg" id="price2"></span>
                                    <h2 class="plan-text">Liepocalypse Plus</h2>
                                    <h3 class="plan-price">$29 <sub>/Bulan</sub></h3>
                                    <h3 class="basicLevelPro">Fitur lengkap untuk pengguna aktif</h3>
                                </div>
                                <ul>
                                    <li>Deteksi tanpa batas</li>
                                    <li>Laporan AI dengan penjelasan tingkat kepercayaan</li>
                                    <li>Dukungan via email & live chat</li>
                                    <li>Riwayat analisis tersimpan otomatis</li>
                                </ul>
                                <div class="pricing-btn">
                                    <a href="#" class="button"> Langganan Sekarang
                                        <span class="hoverEffect"><span></span></span>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <!-- Paket Enterprise -->
                        <div class="col-xxl-4 col-xl-4 col-lg-6 col-md-6">
                            <div class="plan-body">
                                <div class="plan-header">
                                    <span class="plain-greiesd-bg" id="price3"></span>
                                    <h2 class="plan-text">Liepocalypse Pro</h2>
                                    <h3 class="plan-price">$49 <sub>/Bulan</sub></h3>
                                    <h3 class="basicLevelPro">Solusi profesional untuk organisasi</h3>
                                </div>
                                <ul>
                                    <li>Deteksi tanpa batas untuk tim</li>
                                    <li>Integrasi API dan branding khusus</li>
                                    <li>Dasbor multi pengguna</li>
                                    <li>Dukungan prioritas 24/7</li>
                                </ul>
                                <div class="pricing-btn">
                                    <a href="#" class="button"> Hubungi Kami
                                        <span class="hoverEffect"><span></span></span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="two" class="Tabcondent">
                    <div class="row team-page-row">

                        <!-- Paket Gold Tahunan -->
                        <div class="col-xxl-4 col-xl-4 col-lg-6 col-md-6">
                            <div class="plan-body">
                                <div class="plan-header">
                                    <span class="plain-greiesd-bg" id="price4"></span>
                                    <h2 class="plan-text">Liepocalypse Saver</h2>
                                    <h3 class="plan-price">$78 <sub>/Tahun</sub></h3>
                                    <h3 class="basicLevelPro">Paket hemat untuk individu</h3>
                                </div>
                                <ul>
                                    <li>100 berita terdeteksi per bulan</li>
                                    <li>Fitur analisis dasar</li>
                                    <li>Dukungan email</li>
                                    <li>Laporan tanpa penjelasan AI</li>
                                </ul>
                                <div class="pricing-btn">
                                    <a href="#" class="button"> Langganan
                                        <span class="hoverEffect"><span></span></span>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <!-- Paket Premium Tahunan -->
                        <div class="col-xxl-4 col-xl-4 col-lg-6 col-md-6">
                            <div class="plan-body">
                                <div class="plan-header">
                                    <span class="plain-greiesd-bg" id="price5"></span>
                                    <h2 class="plan-text">Liepocalypse Premium</h2>
                                    <h3 class="plan-price">$89 <sub>/Tahun</sub></h3>
                                    <h3 class="basicLevelPro">Paket lengkap dengan penghematan</h3>
                                </div>
                                <ul>
                                    <li>Deteksi berita tanpa batas</li>
                                    <li>Laporan AI + tingkat kepercayaan</li>
                                    <li>Dukungan penuh (email & chat)</li>
                                    <li>Export PDF hasil analisis</li>
                                </ul>
                                <div class="pricing-btn">
                                    <a href="#" class="button"> Mulai Sekarang
                                        <span class="hoverEffect"><span></span></span>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <!-- Paket Enterprise Tahunan -->
                        <div class="col-xxl-4 col-xl-4 col-lg-6 col-md-6">
                            <div class="plan-body">
                                <div class="plan-header">
                                    <span class="plain-greiesd-bg" id="price6"></span>
                                    <h2 class="plan-text">Liepocalypse Enterprise</h2>
                                    <h3 class="plan-price">$169 <sub>/Tahun</sub></h3>
                                    <h3 class="basicLevelPro">Skala besar untuk media & instansi</h3>
                                </div>
                                <ul>
                                    <li>Deteksi tidak terbatas untuk tim</li>
                                    <li>Integrasi API dan fitur khusus</li>
                                    <li>Manajemen anggota & riwayat</li>
                                    <li>Prioritas bantuan 24 jam</li>
                                </ul>
                                <div class="pricing-btn">
                                    <a href="#" class="button"> Hubungi Tim Kami
                                        <span class="hoverEffect"><span></span></span>
                                    </a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
