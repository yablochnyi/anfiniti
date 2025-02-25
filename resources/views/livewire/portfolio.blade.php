<div>
    <!-- Page Header Start -->
    <div class="page-header">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!-- Page Header Box Start -->
                    <div class="page-header-box">
                        <h1 class="text-anime-style-3">{{$data->title}}</h1>
                        <nav class="wow fadeInUp" data-wow-delay="0.25s">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/">Главная</a></li>
                                <li class="breadcrumb-item"><a href="{{route('portfolio')}}">Портфолио</a></li>
                                <li class="breadcrumb-item active" aria-current="page">{{$data->title}}</li>
                            </ol>
                        </nav>
                    </div>
                    <!-- Page Header Box End -->
                </div>
            </div>
        </div>
    </div>
    <!-- Page Header End -->

    <!-- Project Single Page Start -->
    <div class="page-project-single">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!-- Project Feature Image Start -->
                    <div class="project-feature-image">
                        <figure class="image-anime reveal">
                            <img src="{{asset('storage/' . $data->image)}}" alt="">
                        </figure>
                    </div>
                    <!-- Project Feature Image End -->
                </div>

                <div class="col-lg-4">
                    <!-- Project Sidebar Start -->
                    <div class="project-sidebar wow fadeInUp" data-wow-delay="0.25s">
                        <!-- About Project Box Start -->
                        <div class="about-project-box wow fadeInUp">
                            <!-- Project Info Box Start -->
                            <div class="project-info-box">
                                <div class="project-icon">
                                    <img src="{{asset('assets/images/icon-date.svg')}}" alt="">
                                </div>
{{--                                <p>Date</p>--}}
{{--                                @dd($data['description']['date'])--}}
                                <h3>{{ \Carbon\Carbon::parse($data['description']['date'])->translatedFormat('d F Y') }}
                                </h3>
                            </div>
                            <!-- Project Info Box End -->

                            <!-- Project Info Box Start -->
                            <div class="project-info-box">
                                <div class="project-icon">
                                    <img src="{{asset('assets/images/icon-client.svg')}}" alt="">
                                </div>

{{--                                <p>client</p>--}}
                                <h3>{{$data['description']['client']}}</h3>
                            </div>
                            <!-- Project Info Box End -->

{{--                            <!-- Project Info Box Start -->--}}
{{--                            <div class="project-info-box">--}}
{{--                                <div class="project-icon">--}}
{{--                                    <img src="images/icon-website.svg" alt="">--}}
{{--                                </div>--}}

{{--                                <p>website</p>--}}
{{--                                <h3>www.domainname.com</h3>--}}
{{--                            </div>--}}
{{--                            <!-- Project Info Box End -->--}}

                            <!-- Project Info Box Start -->
                            <div class="project-info-box">
                                <div class="project-icon">
                                    <img src="{{asset('assets/images/icon-location-1.svg')}}" alt="">
                                </div>

{{--                                <p>location</p>--}}
                                <h3>{{$data['description']['location']}}</h3>
                            </div>
                            <!-- Project Info Box End -->
                        </div>
                        <!-- About Project Box End -->
                    </div>
                    <!-- Project Sidebar End -->
                </div>

                <div class="col-lg-8">
                    <!-- Project Content Start -->
                    <div class="project-content">
                        <!-- Project Entry Start -->
                        <div class="project-entry">

                            <p class="wow fadeInUp" data-wow-delay="0.5s">{!! $data['description']['description'] !!}</p>




{{--                            <ul class="wow fadeInUp" data-wow-delay="1.5s">--}}
{{--                                <li>Brief summary of the project's purpose and goals.</li>--}}
{{--                                <li>Defect tracking and resolution process</li>--}}
{{--                                <li>Approach or methodology chosen for the development process</li>--}}
{{--                                <li>Testing and quality the software meets standards.</li>--}}
{{--                            </ul>--}}
                        </div>
                        <!-- Project Entry End -->
                    </div>
                    <!-- Project Content End -->
                </div>
            </div>
        </div>
    </div>
    <!-- Project Single Page End -->

    <div class="project-details-gallery">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!-- Project Gallery Start -->
                    <div class="project-gallery">
                        <div class="project-gallery-items wow fadeInUp" data-wow-delay="0.25s">
                            <!-- Project Gallery Item Start -->
                            @foreach($data['description']['images'] as $value)

                            <div class="project-gallery-item">
                                <a href="{{asset('storage/' . $value)}}">
                                    <figure class="image-anime">
                                        <img src="{{asset('storage/' . $value)}}" alt="">
                                    </figure>
                                </a>
                            </div>
                            @endforeach
                            <!-- Project Gallery Item End -->
                        </div>
                    </div>
                    <!-- Project Gallery End -->
                </div>
            </div>
        </div>
    </div>
</div>
