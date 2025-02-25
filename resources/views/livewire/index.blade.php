<div>
    <!-- Hero Section Start -->
    <div class="hero">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-8">
                    <!-- Hero Content Start -->
                    <div class="hero-content">
                        <!-- Section Title Start -->
                        <div class="section-title">
                            <h3 class="wow fadeInUp">{{$home['first_block']['h3']}}</h3>
                            <h1 class="text-anime-style-3">{!! $home['first_block']['h1'] !!}<h1>
                        </div>
                        <!-- Section Title End -->

                        <!-- Hero Body Start -->
                        <div class="hero-body">
                            <p class="wow fadeInUp" data-wow-delay="0.5s">{{$home['first_block']['description']}}</p>
                        </div>
                        <!-- Hero Body End -->

                        <!-- Hero Footer Start -->
                        <div class="hero-footer">
                            <a href="#" class="btn-default wow fadeInUp" data-wow-delay="0.75s">Бесплатная
                                консультация</a>
                        </div>
                        <!-- Hero Footer End -->
                    </div>
                    <!-- Hero Left Content End -->
                </div>

                <div class="col-lg-4">
                    <!-- Hero Video Image Start -->
                    <div class="hero-video-image">
                        <div class="hero-image">
                            <figure class="image-anime reveal">
                                <img src="{{asset('storage/' . $home['first_block']['image'])}}" alt="">
                            </figure>
                        </div>

                        <div class="hero-play-button">
                            <a href="{{$home['first_block']['link_youtube']}}" class="popup-video"><i
                                    class="fa-solid fa-play"></i></a>
                        </div>
                    </div>
                    <!-- Hero Video Image End -->
                </div>
            </div>
        </div>
    </div>
    <!-- Hero Section End -->

    <!-- About Section Start -->
    <div class="about-us">
        <div class="container">
            <div class="row section-row align-items-center">
                <div class="col-lg-8">
                    <!-- Section Title Start -->
                    <div class="section-title">
                        <h3 class="wow fadeInUp">{{$home['two_block']['h3']}}</h3>
                        <h2 class="text-anime-style-3">{{$home['two_block']['h2']}}</h2>
                    </div>
                    <!-- Section Title End -->
                </div>
            </div>

            <div class="row align-items-center">
                <div class="col-lg-6">
                    <!-- About Us Image Start -->
                    <div class="about-image">
                        <div class="about-img">
                            <figure class="image-anime reveal">
                                <img src="{{asset('storage/' . $home['two_block']['image'])}}" alt="">
                            </figure>
                        </div>
                        <div class="about-consultation">
                            <figure>
                                <img src="{{asset('assets/images/about-circle.png')}}" alt="">
                            </figure>
                        </div>
                    </div>
                    <!-- About Us Image End -->
                </div>

                <div class="col-lg-6">
                    <!-- About Us Content Start -->
                    <div class="about-content">
                        <p class="wow fadeInUp" data-wow-delay="0.25s">{{$home['two_block']['description']}}</p>


                        <ul class="wow fadeInUp" data-wow-delay="1s">
                            @foreach($home['two_block']['services'] as $service)
                                <li>{{$service['title']}}</li>
                            @endforeach
                        </ul>

                        <a href="#" class="btn-default wow fadeInUp" data-wow-delay="1.25s">Бесплатная консультация</a>
                    </div>
                    <!-- About Us Content End -->
                </div>
            </div>
        </div>
    </div>
    {{--    <!-- About Section End -->--}}

    {{--    <!-- Our Services Section Start -->--}}
    <div class="our-services">
        <div class="container">
            <div class="row section-row align-items-center">
                <div class="col-lg-7 col-md-7">
                    <!-- Section Title Start -->
                    <div class="section-title">
                        <h3 class="wow fadeInUp">{{$home['three_block']['h3']}}</h3>
                        <h2 class="text-anime-style-3">{{$home['three_block']['h2']}}</h2>
                    </div>
                    <!-- Section Title End -->
                </div>

                <div class="col-lg-5 col-md-5">
                    <!-- Section Btn Start -->
                    <div class="section-btn">
                        <a href="{{route('services')}}" class="btn-default wow fadeInUp" data-wow-delay="0.25s">Посмотреть
                            все</a>
                    </div>
                    <!-- Section Btn End -->
                </div>
            </div>

            <div class="row">
                @foreach($services as $service)
                    <div class="col-lg-4 col-md-6">
                        <!-- Service Item Start -->
                        <div class="service-item wow fadeInUp" data-wow-delay="0.25s">
                            <div class="service-content">
                                <div class="service-content-title">
                                    <h2>{{$service->name}}</h2>
                                    <a href="{{route('service', ['slug' => $service->slug])}}"><img
                                            src="{{asset('assets/images/arrow.svg')}}" alt=""></a>
                                </div>
                                <p>{!! \Illuminate\Support\Str::limit($service->description, 80, '...')  !!}</p>
                            </div>
                            <div class="service-image">
                                <figure class="image-anime">
                                    <img src="{{asset('storage/' . $service->image)}}" alt="">
                                </figure>
                            </div>
                        </div>
                        <!-- Service Item End -->
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Our Services Section End -->

    <!-- Our Work Section Start -->
    <div class="our-work">
        <div class="container">
            <div class="row section-row align-items-center">
                <div class="col-lg-8 col-md-9">
                    <!-- Section Title Start -->
                    <div class="section-title">
                        <h3 class="wow fadeInUp">{{$home['four_block']['h3']}}</h3>
                        <h2 class="text-anime-style-3">{{$home['four_block']['h2']}}</h2>
                    </div>
                    <!-- Section Title End -->
                </div>

                <div class="col-lg-4 col-md-3">
                    <!-- Section Btn Start -->
                    <div class="section-btn wow fadeInUp" data-wow-delay="0.25s">
                        <a href="{{route('portfolio')}}" class="btn-default">Посмотреть все</a>
                    </div>
                    <!-- Section Btn End -->
                </div>
            </div>

            <div class="row">
                @foreach($portfolios as $portfolio)
                    <div class="col-md-6">
                        <a href="{{route('portfolio.show', ['slug' => $portfolio->slug])}}">

                            <!-- Works Item Start -->
                            <div class="works-item wow fadeInUp" data-wow-delay="0.25s">
                                <div class="works-image">
                                    <figure class="image-anime">
                                        <img src="{{asset('storage/' . $portfolio->image)}}" alt="">
                                    </figure>
                                </div>
                                <div class="works-content">
                                    <h2>{{$portfolio->title}}</h2>
                                    {{--                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>--}}
                                </div>
                            </div>
                            <!-- Works Item End -->
                        </a>
                    </div>
                    {{--                    </a>--}}
                @endforeach
            </div>
        </div>
    </div>
    <!-- Our Work Section End -->

    <!-- Why Choose Us Section Start -->
    <livewire:components.why-choose-us/>
    <!-- Why Choose Us Section End -->

    <!-- Exclusive Partners Section Start -->
    <livewire:components.partner/>
    <!-- Exclusive Partners Section End -->

    <!-- Clients Testimonials Section Start -->
    <livewire:components.review/>
    <!-- Clients Testimonials Section End -->

</div>
