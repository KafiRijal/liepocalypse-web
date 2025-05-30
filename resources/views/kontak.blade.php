@extends('template/main')

@section('content')
    <!-- ====================================== Section Blog ===================================== -->
    <section class="section-blog position-relative">
        <img class="blue-gardient8sa" src="assets/images/home-page/blue-gardient8.png" alt="blue-gardient8">
        <img class="blue-gardient9sa" src="assets/images/home-page/blue-gardient9.png" alt="blue-gardient9">
        <div class="container">
            <h1 class="sec-heding"> Kontak Kami <span>Liepocalypse</span></h1>
            <p class="sub-heding">Nunc facilisis pulvinar sit ut vitae aliquet quisque. Malesuada pellentesque diam
                praesent vitae ullamcorper et a volutpat congue eget massa neque diam sed sit.
            </p>
            <div class="row home-features-row">
                <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6">
                    <div class="features-cir-main">
                        <div class="features-cir">
                            <img src="assets/images/svg/features1.svg" alt="features1">
                        </div>
                        <span class="img-bg-circle"></span>
                    </div>
                    <h2 class="gendseratio">Call Us</h2>
                    <p class="eugiat">Open a chat or give us a call at</p>
                    <a class="numb-con" href="tel:012466422710">+01 (246) 642-2710</a>
                </div>
                <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6">
                    <div class="features-cir-main">
                        <div class="features-cir">
                            <img src="assets/images/svg/features2.svg" alt="features2">
                        </div>
                        <span class="img-bg-circle"></span>
                    </div>
                    <h2 class="gendseratio">Email Us</h2>
                    <p class="eugiat">Open a chat or Live chat service</p>
                    <a class="numb-con" href="mailto:help@ciriai.com">help@ciriai.com</a>
                </div>
                <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6">
                    <div class="features-cir-main">
                        <div class="features-cir">
                            <img src="assets/images/svg/features3.svg" alt="features3">
                        </div>
                        <span class="img-bg-circle"></span>
                    </div>
                    <h2 class="gendseratio">Our Address</h2>
                    <p class="eugiat">218 Parkview Cir. Syracuse,<br> California 208434</p>
                </div>
            </div>
            <div class="row form-row pb-0 position-relative">
                <img class="askjm-sa" src="assets/images/home-page/blue-gardient7.png" alt="blue-gardient7">
                <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-9">
                    <form class="from-main">
                        <h2 class="sec-heding quest">Get In<span> Touch </span></h2>
                        <p class="dui seci lkkfs">Our team would love to hear from you. Write your message to us!</p>
                        <input class="conta-input-main" type="text" placeholder="Enter your full name" name="fullName"
                            autocomplete="off">
                        <input class="conta-input-main" type="text" placeholder="Enter your email address" name="email"
                            autocomplete="off">
                        <textarea name="message" placeholder="Write your message"></textarea>
                        <div class="submit-btn">
                            <a href="#" class="button"> Submit Now
                                <span class="hoverEffect">
                                    <span></span>
                                </span>
                            </a>
                        </div>
                    </form>
                </div>
                <div class="col-xxl-6 col-xl-6 col-lg-6">
                    <img class="shoot-fanta" src="assets/images/home-page/shoot-fanta.jpg" alt="shoot-fanta">
                </div>
            </div>
        </div>
    </section>
@endsection
