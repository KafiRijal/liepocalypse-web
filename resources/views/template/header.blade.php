    <!-- ====================================== Header ===================================== -->
    <div class="overlay" onclick="toggleMenu()"></div>
    <header id="top-navbar" class="top-navbar">
        <div class="container">
            <nav>
                <a href="{{ url('/') }}" class="logo">
                    <img src="assets/images/svg/logo.svg" alt="logo" />
                </a>
                <div class="menu-icon" onclick="toggleMenu()">
                    <img src="assets/images/svg/menu.svg" alt="menu" />
                </div>
                <div class="nav-links-mn">
                    <ul class="nav-links">
                        <li class="d-flex justify-content-center">
                            <a href="{{ url('/') }}" class="side-menu-logo">
                                <img src="assets/images/svg/logo.svg" alt="logo" />
                            </a>
                        </li>
                        <li><a class="a-link" href="{{ url('/') }}">Deteksi Hoaks</a></li>
                        <li><a class="a-link" href="{{ url('riwayat') }}">Riwayat</a></li>
                        <li><a class="a-link" href="{{ url('tentang') }}">Tentang Kami</a></li>
                        <li><a class="a-link" href="{{ url('langganan') }}">Langganan</a></li>
                        <li><a class="a-link" href="{{ url('kontak') }}">Kontak Kami</a></li>
                    </ul>
                    <div class="header-buttons-main">
                        <a href="{{ route('login') }}" class="button2" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            <span>Login</span>
                        </a>
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
                                <img src="assets/images/home-page/form-img1.jpg" alt="form-img1" />
                            </div>
                            <div class="formBx">
                                <form>
                                    <h2>Sign In</h2>
                                    <input type="text" name="username" placeholder="Username" autocomplete="off" />
                                    <input type="password" name="password" placeholder="Password" autocomplete="off" />
                                    <a href="#" class="button subscribeBtn">Login
                                        <span class="hoverEffect">
                                            <span></span>
                                        </span>
                                    </a>
                                    <p class="signup">
                                        Don't have an account ?
                                        <a href="javascript:void(0);" onclick="toggleForm();">Sign Up</a>
                                    </p>
                                </form>
                            </div>
                        </div>
                        <div class="user signupBx">
                            <div class="formBx">
                                <form>
                                    <h2>Create an account</h2>
                                    <input type="text" name="username" placeholder="Username" autocomplete="off" />
                                    <input type="email" name="email" placeholder="Email Address"
                                        autocomplete="off" />
                                    <input type="password" name="cpass" placeholder="Create Password"
                                        autocomplete="off" />
                                    <input type="password" name="conPass" placeholder="Confirm Password"
                                        autocomplete="off" />
                                    <a href="#" class="button subscribeBtn">Sign Up
                                        <span class="hoverEffect">
                                            <span></span>
                                        </span>
                                    </a>
                                    <p class="signup">
                                        Already have an account ?
                                        <a href="javascript:void(0);" onclick="toggleForm();">Sign in</a>
                                    </p>
                                </form>
                            </div>
                            <div class="imgBx">
                                <img src="assets/images/home-page/form-img2.jpg" alt=" form-img2" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
