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

    <!-- Our Services Section Start -->
    <div class="our-services page-service">
        <div class="container">
            <div class="row">
                @foreach($services as $service)
                <div class="col-lg-4 col-md-6">
                    <!-- Service Item Start -->
                    <div class="service-item wow fadeInUp" data-wow-delay="0.25s">
                        <div class="service-content">
                            <div class="service-content-title">
                                <h2>{{$service->name}}</h2>
                                <a href="{{route('service', ['slug' => $service->slug])}}"><img src="{{asset('assets/images/arrow.svg')}}" alt=""></a>
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

    <!-- Overview Comapny Section Start -->
    <livewire:components.statistic />
    <!-- Overview Comapny Section End -->

    <!-- Exclusive Partners Section Start -->
    <livewire:components.partner />
    <!-- Exclusive Partners Section End -->

    <!-- Why Choose Us Section Start -->
    <livewire:components.why-choose-us />
    <!-- Why Choose Us Section End -->

    <!-- clients testimonials Section Start -->
    <livewire:components.review />
    <!-- clients testimonials Section End -->
</div>
