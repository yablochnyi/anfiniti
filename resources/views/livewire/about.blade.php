<div>
{{--    @dd($data['data'])--}}
    <!-- Page Header Start -->
    <div class="page-header">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!-- Page Header Box Start -->
                    <div class="page-header-box">
                        <h1 class="text-anime-style-3">{{$data['data']['title']}}</h1>
                        <nav class="wow fadeInUp" data-wow-delay="0.25s">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/">Главная</a></li>
                                <li class="breadcrumb-item active" aria-current="page">{{$data['data']['title']}}</li>
                            </ol>
                        </nav>
                    </div>
                    <!-- Page Header Box End -->
                </div>
            </div>
        </div>
    </div>
    <!-- Page Header End -->

    <!-- Page About Section Start -->
    <div class="page-about">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <!-- About Us Image Start -->
                    <div class="page-about-image">
                        <div class="about-img-1">
                            <figure class="image-anime reveal">
                                <img src="{{asset('storage/' . $data['data']['image_big'])}}" alt="">
                            </figure>
                        </div>
                        <div class="about-img-2">
                            <figure class="image-anime reveal">
                                <img src="{{asset('storage/' . $data['data']['image_small'])}}" alt="">
                            </figure>
                        </div>
                        <div class="work-experience">
                            <div class="work-experience-icon">
                                <img src="{{asset('assets/images/icon-work-experience.svg')}}" alt="">
                            </div>
                            <div class="work-experience-content">
                                <h3><span class="counter">{{$data['data']['count_work']}}</span>+</h3>
                                <p>Выполненных работ</p>
                            </div>
                        </div>
                    </div>
                    <!-- About Us Image End -->
                </div>

                <div class="col-lg-6">
                    <!-- About Us Content Start -->
                    <div class="about-content">
                        <!-- Section Title Start -->
                        <div class="section-title">
                            <h3 class="wow fadeInUp">{{$data['data']['h3']}}</h3>
                            <h2 class="text-anime-style-3">{{$data['data']['h2']}}</h2>
                        </div>
                        <!-- Section Title End -->
                        <p class="wow fadeInUp" data-wow-delay="0.25s">{!! $data['data']['content'] !!}</p>
                        <ul class="wow fadeInUp" data-wow-delay="0.75s">
                            @foreach($data['data']['quality'] as $value)
                                <li>{{$value['quality']}}</li>
                            @endforeach
                        </ul>
                    </div>
                    <!-- About Us Content End -->
                </div>
            </div>
        </div>
    </div>
    <!-- Page About Section End -->

    <!-- Why Choose Us Section Start -->
    <livewire:components.why-choose-us />
    <!-- Why Choose us Section End -->

    <!-- Exclusive Partners Section Start -->
    <livewire:components.partner />
    <!-- Exclusive Partners Section End -->
    <!-- Overview Comapny Section Start -->
    <livewire:components.statistic />
    <!-- Overview Comapny Section End -->
    <!-- Our Team Section Start -->
    <div class="our-team">
        <div class="container">
            <div class="row section-row align-items-center">
                <div class="col-lg-12">
                    <!-- Section Title Start -->
                    <div class="section-title">
                        <h3 class="wow fadeInUp">{{$data['data']['team_h3']}}</h3>
                        <h2 class="text-anime-style-3">{{$data['data']['team_h2']}}</h2>
                    </div>
                    <!-- Section Title End -->
                </div>
            </div>

            <div class="row">
                @foreach($data['data']['team'] as $value)
                <div class="col-lg-3 col-md-6">
                    <!-- Team Member Item Start -->
                    <div class="team-member-item wow fadeInUp" data-wow-delay="0.25s">
                        <!-- Team Img Start -->
                        <div class="team-image">
                            <figure>
                                <img src="{{asset('storage/' . $value['avatar'])}}" alt="">
                            </figure>

{{--                            <div class="our-team-social-icon">--}}
{{--                                <ul>--}}
{{--                                    <li><a href="#" class="social-icon"><i class="fa-brands fa-instagram"></i></a></li>--}}
{{--                                    <li><a href="#" class="social-icon"><i class="fa-brands fa-linkedin-in"></i></a></li>--}}
{{--                                    <li><a href="#" class="social-icon"><i class="fa-brands fa-twitter"></i></a></li>--}}
{{--                                    <li><a href="#" class="social-icon"><i class="fa-brands fa-facebook-f"></i></a></li>--}}
{{--                                </ul>--}}
{{--                            </div>--}}
                        </div>
                        <!-- Team Img End -->

                        <!-- Team Body Start -->
                        <div class="team-body">
                            <div class="team-content">
                                <h3>{{$value['name']}}</h3>
                                <p>{{$value['position']}}</p>
                            </div>
{{--                            <div class="team-icon">--}}
{{--                                <a href="#"><img src="images/icon-share.svg" alt=""></a>--}}
{{--                            </div>--}}
                        </div>
                        <!-- Team Body End -->
                    </div>
                    <!-- Team Member Item End -->
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Our Team Section End -->

    <!-- Scrolling Ticker Section Start -->
    <div class="scrolling-ticker">
        <div class="scrolling-ticker-box">
            <div class="scrolling-content">
                <span><i class="fa-solid fa-circle"></i>Web Development</span>
                <span><i class="fa-solid fa-circle"></i>Game Development</span>
                <span><i class="fa-solid fa-circle"></i>App Development</span>
                <span><i class="fa-solid fa-circle"></i>Digital Marketing</span>
                <span><i class="fa-solid fa-circle"></i>SEO Optimization</span>
                <span><i class="fa-solid fa-circle"></i>Graphics Design</span>
                <span><i class="fa-solid fa-circle"></i>Networking Services</span>
            </div>

            <div class="scrolling-content">
                <span><i class="fa-solid fa-circle"></i>Web Development</span>
                <span><i class="fa-solid fa-circle"></i>Game Development</span>
                <span><i class="fa-solid fa-circle"></i>App Development</span>
                <span><i class="fa-solid fa-circle"></i>Digital Marketing</span>
                <span><i class="fa-solid fa-circle"></i>SEO Optimization</span>
                <span><i class="fa-solid fa-circle"></i>Graphics Design</span>
                <span><i class="fa-solid fa-circle"></i>Networking Services</span>
            </div>
        </div>
    </div>
    <!-- Scrolling Ticker Section End -->

    <!-- clients testimonials Section Start -->
    <livewire:components.review />
    <!-- clients testimonials Section End -->
</div>
