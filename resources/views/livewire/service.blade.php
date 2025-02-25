<div>
    <!-- Page Header Start -->
    <div class="page-header">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!-- Page Header Box Start -->
                    <div class="page-header-box">
                        <h1 class="text-anime-style-3">{{$data->name}}</h1>
                        <nav class="wow fadeInUp" data-wow-delay="0.25s">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/">Главная</a></li>
                                <li class="breadcrumb-item"><a href="{{route('services')}}">Услуги</a></li>
                                <li class="breadcrumb-item active" aria-current="page">{{$data->name}}</li>
                            </ol>
                        </nav>
                    </div>
                    <!-- Page Header Box End -->
                </div>
            </div>
        </div>
    </div>
    <!-- Page Header End -->

    <!-- Single Service Page Start -->
    <div class="page-service-single">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <!-- Service Content Start -->
                    <div class="service-single-content">
                        <!-- Service Featured Image Start -->
                        <div class="service-featured-image">
                            <figure class="image-anime reveal">
                                <img src="{{asset('storage/' . $data->image)}}" alt="">
                            </figure>
                        </div>
                        <!-- Service Featured Image End -->

                        <!-- Service Entry Content Start -->
                        <div class="service-entry">
                            <p class="wow fadeInUp" data-wow-delay="0.25s">{!! $data->description !!}</p>
                        </div>
                        <!-- Service Entry Content End -->
                    </div>
                    <!-- Service Content End -->
                </div>

                <div class="col-lg-4">
                    <div class="service-sidebar">
                        <!-- Service List Box Start -->
                        <div class="services-list-box wow fadeInUp" data-wow-delay="0.5s">
                            <h3>{{$data['experience_small']['title']}}</h3>
                            <ul>
                                @foreach($data['experience_small']['repeater'] as $value)
                                    <li>{{$value['title']}}</li>
                                @endforeach
                            </ul>
                            <a href="#" class="btn-default">Связаться</a>
                        </div>
                        <!-- Service List Box End -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Single Service Page End -->

    <!-- Why Choose us Section Start -->
    <livewire:components.why-choose-us/>
    <!-- Why Choose Us Section End -->
    <!-- Your Choice Section Start -->
    <div class="your-choice">
        <div class="container">
            <div class="row section-row align-items-center">
                <div class="col-lg-7 col-md-12">
                    <!-- Section Title Start -->
                    <div class="section-title">
                        <h3 class="wow fadeInUp">{{$data['experience_full']['h3']}}</h3>
                        <h2 class="text-anime-style-3">{{$data['experience_full']['h2']}}</h2>
                    </div>
                    <!-- Section Title End -->
                </div>
            </div>

            <div class="row">
                @foreach($data['experience_full']['data'] as $value)
                    <div class="col-lg-4">
                        <div class="your-choice-item wow fadeInUp" data-wow-delay="0.25s">
                            <div class="your-choice-title">
                                <h2>{{$value['title']}}</h2>
                                <img src="{{asset('storage/' . $value['icon'])}}" alt="">
                            </div>
                            <ul>
                                @foreach($value['description'] as $title)
                                    <li>{{$title['title']}}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Your Choice Section End -->

    <!-- Our Services Section Start -->
    <div class="our-services">
        <div class="container">
            <div class="row section-row align-items-center">
                <div class="col-lg-7 col-md-7">
                    <!-- Section Title Start -->
                    <div class="section-title">
                        <h3 class="wow fadeInUp">Похожие услуги</h3>
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
                @foreach($randomServices as $service)
                    <div class="col-lg-4 col-md-6">
                        <!-- Service Item Start -->
                        <div class="service-item wow fadeInUp" data-wow-delay="0.25s">
                            <div class="service-content">
                                <div class="service-content-title">
                                    <h2>{{$service->name}}</h2>
                                    <a href="{{route('service', ['slug' => $service->slug])}}"><img
                                            src="{{asset('assets/images/arrow.svg')}}" alt=""></a>
                                </div>
                                <p>{{ \Illuminate\Support\Str::limit($service->description, 80, '...') }}</p>
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

    <!-- FAQs Page Start -->
    <div class="service-faqs">
        <div class="container">
            <div class="row section-row align-items-center">
                <div class="col-lg-12">
                    <!-- Section Title Start -->
                    <div class="section-title">
                        <h3 class="wow fadeInUp">FAQ's</h3>
                    </div>
                    <!-- Section Title End -->
                </div>
            </div>

            <div class="row">
                <div class="col-lg-8">
                    <div class="faq-accordion" id="accordion">
                        <!-- FAQ Item start -->
                        @foreach($faqs as $index => $faq)
                            <div class="accordion-item wow fadeInUp" data-wow-delay="0.25s">
                                <h2 class="accordion-header" id="heading{{$loop->iteration}}">
                                    <button class="accordion-button {{ $loop->first ? '' : 'collapsed' }}" type="button"
                                            data-bs-toggle="collapse"
                                            data-bs-target="#collapse{{$loop->iteration}}"
                                            aria-expanded="{{ $loop->first ? 'true' : 'false' }}"
                                            aria-controls="collapse{{$loop->iteration}}">
                                        {{$faq->question}}
                                    </button>
                                </h2>
                                <div id="collapse{{$loop->iteration}}"
                                     class="accordion-collapse collapse {{ $loop->first ? 'show' : '' }}"
                                     aria-labelledby="heading{{$loop->iteration}}"
                                     data-bs-parent="#accordion">
                                    <div class="accordion-body">
                                        <p>{{$faq->answer}}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                        <!-- FAQ Item End -->

                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="ask-question wow fadeInUp" data-wow-delay="0.5s">
                        <div class="ask-question-content">
                            <h3>Свяжитесь с нами</h3>
                            <p>У вас остались вопросы?</p>
                        </div>
                        <div class="ask-contact-list">
                            @foreach($phoneWithEmail['data']['phone'] as $phone)
                                <div class="icon-box">
                                    <a href="tel:{{ $phone['phone'] }}"><img src="{{ asset('assets/images/icon-phone.svg') }}" alt=""></a>
                                </div>
                                <a href="tel:{{ $phone['phone'] }}"><span>Телефон:</span> {{ $phone['phone'] }}</a>
                            @endforeach
                        </div>

                        <div class="ask-contact-list">
                            @foreach($phoneWithEmail['data']['email'] as $email)
                                <div class="icon-box">
                                    <a href="mailto:{{ $email['email'] }}"><img src="{{ asset('assets/images/icon-mail.svg') }}" alt=""></a>
                                </div>
                                <a href="mailto:{{ $email['email'] }}"><span>Email:</span> {{ $email['email'] }}</a>
                            @endforeach
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- FAQs Page Ends -->
</div>
