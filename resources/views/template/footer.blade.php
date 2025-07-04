    <!-- ====================================== Section Footer ===================================== -->
    <footer class="position-relative footer-main">
        <img class="footer-logo" src="{{ asset('assets/images/home-page/logo.png') }}" alt="footer-logo" />
        <div class="container">
            <div class="row">
                <div class="col-xxl-8 col-xl-8 col-lg-8 footer-col-fir">
                    <svg class="djks" xmlns="http://www.w3.org/2000/svg" width="2" height="100"
                        viewBox="0 0 2 100" fill="none">
                        <path d="M1 0L0.999996 100" stroke="url(#paint0_linear_137_269)" stroke-width="2" />
                        <defs>
                            <linearGradient id="paint0_linear_137_269" x1="1.5" y1="2.18557e-08" x2="1.5"
                                y2="100" gradientUnits="userSpaceOnUse">
                                <stop stop-color="#1A1A1A" offset="0" />
                                <stop offset="0.5" stop-color="#00FFB1" />
                                <stop offset="1" stop-color="#1A1A1A" />
                            </linearGradient>
                        </defs>
                    </svg>
                    <h2 class="sec-heding advice">
                        <span>Liepocalypse</span>
                    </h2>
                    <p class="dui seci dsos">
                        Platform pendeteksi hoaks berbasis AI untuk membantu kamu memilah fakta dari kabar palsu.
                        Jangan percaya sebelum periksa, mari ciptakan ruang informasi yang lebih sehat dan terpercaya.
                    </p>
                    <div class="ref-demo">
                        @auth
                            <a href="{{ url('tentang') }}" class="button">
                                Tentang Kami
                                <span class="hoverEffect">
                                    <span></span>
                                </span>
                            </a>
                        @else
                            <a href="#" class="button" data-bs-toggle="modal" data-bs-target="#exampleModal">Tentang
                                Kami
                                <span class="hoverEffect">
                                    <span></span>
                                </span></a>
                        @endauth
                    </div>
                </div>
                <div class="col-xxl-4 col-xl-4 col-lg-4 footer-col-sec">
                    <img class="footer-gefdo" src="{{ asset('assets/images/home-page/blue-gardient2.png') }}"
                        alt="blue-gardient2" />
                    <div class="box-footer">
                        <p class="resour">Menu</p>
                        <ul class="foot-links">
                            <li><a href="{{ url('/') }}">Beranda</a></li>

                            @auth
                                <li><a href="{{ url('riwayat') }}">Riwayat</a></li>
                                <li><a href="{{ url('tentang') }}">Tentang Kami</a></li>
                                <li><a href="{{ url('langganan') }}">Langganan</a></li>
                                <li><a href="{{ url('kontak') }}">Kontak Kami</a></li>
                            @else
                                <li><a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal">Riwayat</a></li>
                                <li><a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal">Tentang Kami</a>
                                </li>
                                <li><a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal">Langganan</a>
                                </li>
                                <li><a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal">Kontak Kami</a>
                                </li>
                            @endauth
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="coprights-main">
            <svg class="das" xmlns="http://www.w3.org/2000/svg" width="100" height="2" viewBox="0 0 100 2"
                fill="none">
                <path d="M100 1L8.49366e-07 0.999996" stroke="url(#paint0_linear_137_271)" stroke-width="2" />
                <defs>
                    <linearGradient id="paint0_linear_137_271" x1="100" y1="1.5" x2="-2.18557e-08"
                        y2="1.5" gradientUnits="userSpaceOnUse">
                        <stop stop-color="#1A1A1A" offset="0" />
                        <stop offset="0.5" stop-color="#5C33FF" />
                        <stop offset="1" stop-color="#1A1A1A" />
                    </linearGradient>
                </defs>
            </svg>
            <div class="container">
                <div class="rights-reserved">
                    <h2>
                        © 2025 - All rights reserved by
                        <a href="https://1.envato.market/website-portfolio" target="_blank">
                            Liepocalypse</a>
                    </h2>
                    <div class="footer-media">
                        <a href="https://www.instagram.com"><img src="{{ asset('assets/images/svg/insta.svg') }}"
                                alt="insta" />Instagram</a>
                    </div>
                </div>
            </div>
        </div>
    </footer>
