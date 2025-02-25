<div>
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

    <!-- Contact Information Section Start -->
    <div class="contact-information">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <!-- Contact Item Start -->
                    <div class="contact-item wow fadeInUp" data-wow-delay="0.25s">
                        <div class="contact-content">
                            <div class="contact-content-title">
                                <h2>Адрес</h2>
                                <a href="#"><img src="{{asset('assets/images/icon-location.svg')}}" alt=""></a>
                            </div>
                            <p>{{$data['data']['address']}}</p>
                        </div>
                        <div class="contact-image">
                            <figure class="image-anime">
                                <img src="{{asset('storage/' . $data['data']['address_image'])}}" alt="">
                            </figure>
                        </div>
                    </div>
                    <!-- Contact Item End -->
                </div>
                <div class="col-md-4">
                    <!-- Contact Item Start -->
                    <div class="contact-item wow fadeInUp" data-wow-delay="0.5s">
                        <div class="contact-content">
                            <div class="contact-content-title">
                                <h2>Позвоните нам</h2>
                                <a href="#"><img src="{{asset('assets/images/icon-phone.svg')}}" alt=""></a>
                            </div>
                            @foreach($data['data']['phone'] as $phone)
                                <p>{{$phone['phone']}}</p>
                            @endforeach
                        </div>
                        <div class="contact-image">
                            <figure class="image-anime">
                                <img src="{{asset('storage/' . $data['data']['phone_image'])}}" alt="">
                            </figure>
                        </div>
                    </div>
                    <!-- Contact Item End -->
                </div>

                <div class="col-md-4">
                    <!-- Contact Item Start -->
                    <div class="contact-item wow fadeInUp" data-wow-delay="0.75s">
                        <div class="contact-content">
                            <div class="contact-content-title">
                                <h2>Email</h2>
                                <a href="#"><img src="{{asset('assets/images/icon-mail.svg')}}" alt=""></a>
                            </div>
                            @foreach($data['data']['email'] as $email)
                                <p>{{$email['email']}}</p>
                            @endforeach
                        </div>
                        <div class="contact-image">
                            <figure class="image-anime">
                                <img src="{{asset('storage/' . $data['data']['email_image'])}}" alt="">
                            </figure>
                        </div>
                    </div>
                    <!-- Contact Item End -->
                </div>
            </div>
        </div>
    </div>
    <!-- Contact Information Section End -->

    <!-- Contact Us Section Start -->
    <div class="contact-us">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <!-- Contact Details Section Start -->
                    <div class="contact-details">
                        <!-- Section Title Start -->
                        <div class="section-title">
                            <h3 class="wow fadeInUp">{{$data['data']['contact_h3']}}</h3>
                            <h2 class="text-anime-style-3">{{$data['data']['contact_h2']}}</h2>
                        </div>
                        <!-- Section Title End -->

                        <!-- Contact Details Body Start -->
                        <div class="contact-detail-body">
                            <p class="wow fadeInUp" data-wow-delay="0.25s">{{$data['data']['description_h2']}}</p>
                            <h3 class="wow fadeInUp" data-wow-delay="0.5s">Следите за нами:</h3>
                            <ul class="wow fadeInUp" data-wow-delay="0.75s">
                                {{--                                <li><a href="#"><i class="fa-brands fa-facebook-f"></i></a></li>--}}
                                @foreach($data['data']['social'] as $social)
                                    <li><a href="{{$social['link']}}"><i class="fa-brands fa-instagram"></i></a></li>
                                @endforeach
                                {{--                                <li><a href="#"><i class="fa-brands fa-linkedin-in"></i></a></li>--}}
                                {{--                                <li><a href="#"><i class="fa-brands fa-twitter"></i></a></li>--}}
                            </ul>
                        </div>
                        <!-- Contact Details Body End -->
                    </div>
                    <!-- Contact Details Section End -->
                </div>

                <div class="col-lg-6">
                    <div class="contact-form-box wow fadeInUp" data-wow-delay="0.5s">
                        <!-- Contact Form Start -->
                        <div class="contact-form">
                            <form id="contactForm" action="#" method="POST" data-toggle="validator">
                                <div class="row">
                                    <div class="form-group col-md-6 mb-4">
                                        <input type="text" name="fname" class="form-control" id="fname"
                                               placeholder="first name" required>
                                        <div class="help-block with-errors"></div>
                                    </div>

                                    <div class="form-group col-md-6 mb-4">
                                        <input type="text" name="lname" class="form-control" id="lname"
                                               placeholder="last name" required>
                                        <div class="help-block with-errors"></div>
                                    </div>

                                    <div class="form-group col-md-6 mb-4">
                                        <input type="text" name="phone" class="form-control" id="phone"
                                               placeholder="Phone" required>
                                        <div class="help-block with-errors"></div>
                                    </div>

                                    <div class="form-group col-md-6 mb-4">
                                        <input type="email" name="email" class="form-control" id="email"
                                               placeholder="email" required>
                                        <div class="help-block with-errors"></div>
                                    </div>

                                    <div class="form-group col-md-12 mb-4">
                                        <input type="text" name="subject" class="form-control" id="subject"
                                               placeholder="subjects" required>
                                        <div class="help-block with-errors"></div>
                                    </div>

                                    <div class="form-group col-md-12 mb-4">
                                        <textarea name="msg" class="form-control" id="msg" rows="7"
                                                  placeholder="message" required></textarea>
                                        <div class="help-block with-errors"></div>
                                    </div>

                                    <div class="col-md-12">
                                        <button type="submit" class="btn-default">send a message</button>
                                        <div id="msgSubmit" class="h3 text-left hidden"></div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- Contact Form End -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact Us Section End -->
    <!-- Google Map Section Start -->
    <div class="google-map wow fadeInUp" data-wow-delay="0.25s">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    {!! $data['data']['map_link'] !!}
                </div>
            </div>
        </div>
    </div>
    <!-- Google Map Section End -->
</div>
