<!-- ====================================== Header ===================================== -->
<div class="overlay" onclick="toggleMenu()"></div>
<header id="top-navbar" class="top-navbar">
    <div class="container">
        <nav>
            <a href="{{ url('/') }}" class="logo">
                <img src="{{ asset('assets/images/svg/logo.svg') }}" alt="logo" />
            </a>
            <div class="menu-icon" onclick="toggleMenu()">
                <img src="{{ asset('assets/images/svg/menu.svg') }}" alt="menu" />
            </div>
            <div class="nav-links-mn">
                <ul class="nav-links">
                    <li class="d-flex justify-content-center">
                        <a href="{{ url('/') }}" class="side-menu-logo">
                            <img src="{{ asset('assets/images/svg/logo.svg') }}" alt="logo" />
                        </a>
                    </li>
                    <li><a class="a-link" href="{{ url('/') }}">Deteksi Hoaks</a></li>
                    <li><a class="a-link" href="{{ url('riwayat') }}">Riwayat</a></li>
                    <li><a class="a-link" href="{{ url('tentang') }}">Tentang Kami</a></li>
                    <li><a class="a-link" href="{{ url('langganan') }}">Langganan</a></li>
                    <li><a class="a-link" href="{{ url('kontak') }}">Kontak Kami</a></li>
                </ul>

                <div class="header-buttons-main d-flex gap-2">
                    <a href="{{ route('login') }}" class="button2">
                        <span>Login</span>
                    </a>
                </div>
            </div>
        </nav>
    </div>
</header>
