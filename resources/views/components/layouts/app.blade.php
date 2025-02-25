<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <!-- Page Title -->
    {!! SEOMeta::generate() !!}
    {!! OpenGraph::generate() !!}
    <!-- Favicon Icon -->
    <link rel="shortcut icon" type="image/x-icon" href="images/favicon.png">
    <!-- Google Fonts Css-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;700&display=swap" rel="stylesheet">
    <!-- Bootstrap Css -->
    <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet" media="screen">
    <!-- SlickNav Css -->
    <link href="{{asset('assets/css/slicknav.min.css')}}" rel="stylesheet">
    <!-- Swiper Css -->
    <link rel="stylesheet" href="{{asset('assets/css/swiper-bundle.min.css')}}">
    <!-- Font Awesome Icon Css-->
    <link href="{{asset('assets/css/all.css')}}" rel="stylesheet" media="screen">
    <!-- Animated Css -->
    <link href="{{asset('assets/css/animate.css')}}" rel="stylesheet">
    <!-- Magnific Popup Core Css File -->
    <link rel="stylesheet" href="{{asset('assets/css/magnific-popup.css')}}">
    <!-- Main Custom Css -->
    <link href="{{asset('assets/css/custom.css')}}" rel="stylesheet" media="screen">
{{--    @vite(['resources/js/app.js'])--}}

</head>
<body class="tt-magic-cursor">

<!-- Preloader Start -->
<div class="preloader">
    <div class="loading-container">
        <div class="loading"></div>
        <div id="loading-icon"><img src="{{asset('assets/images/loader.svg')}}" alt=""></div>
    </div>
</div>
<!-- Preloader End -->

<!-- Magic Cursor Start -->
<div id="magic-cursor">
    <div id="ball"></div>
</div>
<!-- Magic Cursor End -->

<!-- Header Start -->
<header class="main-header">
    <div class="header-sticky">
        <nav class="navbar navbar-expand-lg">
            <div class="container">
                <!-- Logo Start -->
                <a class="navbar-brand" href="./">
                    <img src="{{asset('storage/' . $siteInfo['header']['logo'])}}" alt="Logo">
                </a>
                <!-- Logo End -->

                <!-- Main Menu Start -->
                <div class="collapse navbar-collapse main-menu">
                    <div class="nav-menu-wrapper">
                        <ul class="navbar-nav mr-auto" id="menu">
                            @foreach($siteInfo['header']['navigation'] as $value)
                            <li class="nav-item"><a class="nav-link" href="{{$value['link']}}">{{$value['title']}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                    <!-- Let’s Start Button Start -->
                    <div class="header-btn d-inline-flex">
                        <a href="contact-us.html" class="btn-default">Бесплатная консультация</a>
                    </div>
                    <!-- Let’s Start Button End -->
                </div>
                <!-- Main Menu End -->

                <div class="navbar-toggle"></div>
            </div>
        </nav>
        <div class="responsive-menu"></div>
    </div>
</header>
<!-- Header End -->
@yield('slot') {{-- Для страниц ошибок --}}
{{ $slot ?? '' }}
<!-- Footer Start -->
<footer class="main-footer">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <!-- Mega Footer Start -->
                <div class="mega-footer">
                    <div class="row">
                        <div class="col-lg-6 col-md-12">
                            <!-- Footer About Start -->
                            <div class="footer-about">
                                <figure>
                                    <img src="{{asset('storage/' . $siteInfo['footer']['logo'])}}" alt="">
                                </figure>
{{--                                <p>Creative Agency Based on Lorem Ipsum</p>--}}
                                <ul>
                                    <li><a href="mailto:{{ $siteInfo['footer']['email'] }}">{{ $siteInfo['footer']['email'] }}</a></li>
                                    <li><a href="tel:{{ $siteInfo['footer']['phone'] }}">{{ $siteInfo['footer']['phone'] }}</a></li>

                                </ul>
                            </div>
                            <!-- Footer About End -->
                        </div>

                        <div class="col-lg-2 col-md-4">
                            <!-- Footer Links Start -->
                            <div class="footer-links">
                                <h2>{{$siteInfo['footer']['navigation_title_1']}}</h2>
                                <ul>
                                    @foreach($siteInfo['footer']['navigation_1'] as $value)
                                        <li><a href="{{$value['link']}}">{{$value['title']}}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                            <!-- Footer Links End -->
                        </div>

                        <div class="col-lg-2 col-md-4">
                            <!-- Footer Links Start -->
                            <div class="footer-links">
                                <h2>{{$siteInfo['footer']['navigation_title_2']}}</h2>
                                <ul>
                                    @foreach($siteInfo['footer']['navigation_2'] as $value)
                                        <li><a href="{{$value['link']}}">{{$value['title']}}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                            <!-- Footer Links End -->
                        </div>

                        <div class="col-lg-2 col-md-4">
                            <!-- Footer Links Start -->
                            <div class="footer-links">
                                <h2>{{$siteInfo['footer']['navigation_title_3']}}</h2>
                                <ul>
                                    @foreach($siteInfo['footer']['navigation_3'] as $value)
                                        <li><a href="{{$value['link']}}">{{$value['title']}}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                            <!-- Footer Links End -->
                        </div>
                    </div>
                </div>
                <!-- Mega Footer End -->

                <!-- Copyright Footer Start -->
                <div class="footer-copyright">
                    <div class="row align-items-center">
                        <div class="col-lg-6">
                            <!-- Footer Copyright Content Start -->
                            <div class="footer-copyright-text">
                                <p>© 2021-{{now()->format('Y')}}. Все права защищены.</p>
                            </div>
                            <!-- Footer Copyright Content End -->
                        </div>
                        <div class="col-lg-6">
                            <!-- Footer Policy Links Start -->
{{--                            <div class="footer-policy-links">--}}
{{--                                <ul>--}}
{{--                                    <li><a href="#">privacy policy</a></li>--}}
{{--                                    <li><a href="#">terms of service</a></li>--}}
{{--                                    <li class="highlighted"><a href="#top">go to top</a></li>--}}
{{--                                </ul>--}}
{{--                            </div>--}}
                            <!-- Footer Policy Links End -->
                        </div>
                    </div>
                </div>
                <!-- Copyright Footer End -->
            </div>
        </div>
    </div>
</footer>
<!-- Footer End -->

<!-- Jquery Library File -->
<script src="{{asset('assets/js/jquery-3.7.1.min.js')}}"></script>
<!-- Bootstrap js file -->
<script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
<!-- Validator js file -->
<script src="{{asset('assets/js/validator.min.js')}}"></script>
<!-- SlickNav js file -->
<script src="{{asset('assets/js/jquery.slicknav.js')}}"></script>
<!-- Swiper js file -->
<script src="{{asset('assets/js/swiper-bundle.min.js')}}"></script>
<!-- Counter js file -->
<script src="{{asset('assets/js/jquery.waypoints.min.js')}}"></script>
<script src="{{asset('assets/js/jquery.counterup.min.js')}}"></script>
<!-- Isotop js file -->
<script src="{{asset('assets/js/isotope.min.js')}}"></script>
<!-- Magnific js file -->
<script src="{{asset('assets/js/jquery.magnific-popup.min.js')}}"></script>
<!-- SmoothScroll -->
<script src="{{asset('assets/js/SmoothScroll.js')}}"></script>
<!-- MagicCursor js file -->
<script src="{{asset('assets/js/gsap.min.js')}}"></script>
<script src="{{asset('assets/js/magiccursor.js')}}"></script>
<!-- Text Effect js file -->
<script src="{{asset('assets/js/SplitText.js')}}"></script>
<script src="{{asset('assets/js/ScrollTrigger.min.js')}}"></script>
<!-- Wow js file -->
<script src="{{asset('assets/js/wow.js')}}"></script>
<!-- Main Custom js file -->
<script src="{{asset('assets/js/function.js')}}"></script>
</body>
</html>
