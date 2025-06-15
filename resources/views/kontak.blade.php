@extends('template/main')

@section('content')
    <!-- ====================================== Section Kontak ===================================== -->
    <section class="section-blog position-relative mb-5">
        <img class="blue-gardient8sa" src="assets/images/home-page/blue-gardient8.png" alt="blue-gardient8">
        <img class="blue-gardient9sa" src="assets/images/home-page/blue-gardient9.png" alt="blue-gardient9">
        <div class="container">
            <h1 class="sec-heding">Hubungi <span>Liepocalypse</span></h1>
            <p class="sub-heding">Punya pertanyaan atau butuh bantuan? Tim kami siap membantu Anda dalam menggunakan sistem
                deteksi hoaks berbasis AI ini.</p>

            <div class="row home-features-row">
                <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6">
                    <div class="features-cir-main">
                        <div class="features-cir">
                            <img src="assets/images/svg/features1.svg" alt="telepon">
                        </div>
                        <span class="img-bg-circle"></span>
                    </div>
                    <h2 class="gendseratio">Telepon</h2>
                    <p class="eugiat">Hubungi kami melalui telepon di:</p>
                    <a class="numb-con" href="tel:+6281234567890">+62 812-3456-7890</a>
                </div>

                <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6">
                    <div class="features-cir-main">
                        <div class="features-cir">
                            <img src="assets/images/svg/features2.svg" alt="email">
                        </div>
                        <span class="img-bg-circle"></span>
                    </div>
                    <h2 class="gendseratio">Email</h2>
                    <p class="eugiat">Kirim pertanyaan atau saran Anda ke:</p>
                    <a class="numb-con" href="mailto:support@liepocalypse.com">support@liepocalypse.com</a>
                </div>

                <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6">
                    <div class="features-cir-main">
                        <div class="features-cir">
                            <img src="assets/images/svg/features3.svg" alt="alamat">
                        </div>
                        <span class="img-bg-circle"></span>
                    </div>
                    <h2 class="gendseratio">Alamat</h2>
                    <p class="eugiat">Jl. Kebenaran No. 10, Jakarta Selatan,<br> Indonesia 12345</p>
                </div>
            </div>

            <div class="row form-row pb-0 position-relative">
                <img class="askjm-sa" src="assets/images/home-page/blue-gardient7.png" alt="blue-gardient7">
                <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-9">
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    <form class="from-main" action="{{ route('contact.send') }}" method="POST">
                        @csrf
                        <h2 class="sec-heding quest">Kirim <span>Pesan</span></h2>
                        <p class="dui seci lkkfs">Kami siap menerima masukan, pertanyaan, atau kolaborasi dari Anda. Tulis
                            pesan di bawah ini!</p>

                        <input class="conta-input-main" type="text" name="fullName" placeholder="Nama lengkap Anda"
                            required>
                        <input class="conta-input-main" type="email" name="email" placeholder="Alamat email Anda"
                            required>
                        <textarea name="message" placeholder="Tulis pesan Anda..." required></textarea>

                        <div class="submit-btn">
                            <button type="submit" class="button">Kirim Sekarang
                                <span class="hoverEffect">
                                    <span></span>
                                </span>
                            </button>
                        </div>
                    </form>
                </div>

                <div class="col-xxl-6 col-xl-6 col-lg-6">
                    <img class="shoot-fanta" src="{{ asset('assets/images/svg/kontak.svg') }}" alt="kontak-liepocalypse">
                </div>
            </div>
        </div>
    </section>
@endsection
