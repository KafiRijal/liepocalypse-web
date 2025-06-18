    <!-- ====================================== Header ===================================== -->
    <div class="overlay" onclick="toggleMenu()"></div>
    <header id="top-navbar" class="top-navbar">
        <div class="container">
            <nav>
                <a href="{{ url('/') }}" class="brand-logo d-flex align-items-center">
                    <img src="{{ asset('assets/images/home-page/logo.png') }}" alt="logo" class="brand-icon" />
                    <span class="brand-text">Liepocalypse</span>
                </a>
                <div class="menu-icon" onclick="toggleMenu()">
                    <img src="{{ asset('assets/images/home-page/logo.png') }}" alt="menu" />
                </div>
                <div class="nav-links-mn">
                    <ul class="nav-links">
                        <li class="d-flex justify-content-center">
                            <a href="{{ url('/') }}" class="side-menu-logo">
                                <img src="{{ asset('assets/images/home-page/logo.png') }}" alt="logo" />
                            </a>
                        </li>
                        <li><a class="a-link" href="{{ url('/') }}">Deteksi Hoaks</a></li>

                        @auth
                            <li><a class="a-link" href="{{ url('riwayat') }}">Riwayat</a></li>
                            <li><a class="a-link" href="{{ url('tentang') }}">Tentang Kami</a></li>
                            <li><a class="a-link" href="{{ url('langganan') }}">Langganan</a></li>
                            <li><a class="a-link" href="{{ url('kontak') }}">Kontak Kami</a></li>
                        @else
                            <li><a href="#" class="a-link" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal">Riwayat</a></li>
                            <li><a href="#" class="a-link" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal">Tentang Kami</a></li>
                            <li><a href="#" class="a-link" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal">Langganan</a></li>
                            <li><a href="#" class="a-link" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal">Kontak Kami</a></li>
                        @endauth
                    </ul>

                    <div class="header-buttons-main">
                        @auth
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="button2">
                                    <span>Logout</span>
                                </button>
                            </form>
                        @else
                            <a href="#" class="button2" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                <span>Masuk</span>
                            </a>
                        @endauth
                    </div>
                </div>
            </nav>
        </div>
    </header>

    <!-- Login Sign In From -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-body form-modal-body">
                    <button type="button" class="btn-close form-close-btn" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                    <div class="container-demo">
                        <div class="user signinBx">
                            <div class="imgBx">
                                <img style="max-width: 100%; height: auto; margin: auto; display: block;"
                                    src="{{ asset('assets/images/svg/login.svg') }}" alt="form-img1" />
                            </div>
                            <div class="formBx">
                                <form method="POST" action="{{ route('login') }}">
                                    @csrf
                                    <h2>Sign In</h2>
                                    <div class="social-login">
                                        <button type="button" class="button subscribeBtn"
                                            onclick="window.location.href='{{ route('login.guest') }}'">
                                            Login as Guest
                                            <span class="hoverEffect">
                                                <span></span>
                                            </span>
                                        </button>

                                        <a href="{{ route('login.google') }}" class="button subscribeBtn"
                                            style="margin-top: 10px;">
                                            <img src="{{ asset('assets/images/svg/google.svg') }}" alt="Google Logo"
                                                style="height: 16px; vertical-align: middle; margin-right: 8px;">
                                            Sign in with Google
                                            <span class="hoverEffect">
                                                <span></span>
                                            </span>
                                        </a>

                                        <!-- Pemisah -->
                                        <div class="separator">
                                            <span>OR</span>
                                        </div>
                                    </div>

                                    <input type="text" name="username" placeholder="Username" required />
                                    <input type="password" name="password" placeholder="Password" required />
                                    <button type="submit" class="button subscribeBtn">Login</button>
                                    <p class="signup">
                                        Don't have an account ?
                                        <a href="javascript:void(0);" onclick="toggleForm();">Sign Up</a>
                                    </p>
                                </form>
                            </div>
                        </div>
                        <div class="user signupBx">
                            <div class="formBx">
                                <form method="POST" action="{{ route('register') }}">
                                    @csrf
                                    <h2>Create an account</h2>
                                    <input type="text" name="username" placeholder="Username" required />
                                    <input type="email" name="email" placeholder="Email Address" required />
                                    <input type="password" name="password" placeholder="Create Password" required />
                                    <input type="password" name="password_confirmation"
                                        placeholder="Confirm Password" required />
                                    <button type="submit" class="button subscribeBtn">Sign Up</button>
                                    <p class="signup">
                                        Already have an account ?
                                        <a href="javascript:void(0);" onclick="toggleForm();">Sign in</a>
                                    </p>
                                </form>
                            </div>
                            <div class="imgBx">
                                <img style="max-width: 100%; height: auto; margin: auto; display: block;"
                                    src="{{ asset('assets/images/svg/login.svg') }}" alt=" form-img2" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </nav>
        </div>
    </div>
