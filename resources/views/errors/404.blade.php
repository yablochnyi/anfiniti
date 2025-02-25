@extends('components.layouts.app') {{-- Укажите нужный layout, если используете его --}}


@section('slot')
    <!-- Page Header Start -->
    <div class="page-header">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!-- Page Header Box Start -->
                    <div class="page-header-box">
                        <h1 class="text-anime-style-3">Страница не найдена</h1>
                        <nav class="wow fadeInUp" data-wow-delay="0.25s">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/">Главная</a></li>
                                <li class="breadcrumb-item active" aria-current="page">404 error</li>
                            </ol>
                        </nav>
                    </div>
                    <!-- Page Header Box End -->
                </div>
            </div>
        </div>
    </div>
    <!-- Page Header End -->

    <!-- error section start -->
    <div class="error-page">
        <div class="container">
            <div class="row">
                <div class="error-page-image wow fadeInUp" data-wow-delay="0.25s">
                    <img src="{{asset('assets/images/404-error-img.png')}}" alt="">
                </div>
                <div class="error-page-content">
                    <div class="error-page-content-heading">
                        <h2 class="text-anime-style-3">Страница не найдена!</h2>
{{--                        <p class="wow fadeInUp" data-wow-delay="0.5s">We're sorry, the page you requested could not be found.</p>--}}
                    </div>
                    <a class="btn-default wow fadeInUp" data-wow-delay="0.75s" href="/">Вернутся на главную</a>
                </div>
            </div>
        </div>
    </div>
    <!-- error section end -->
@endsection
