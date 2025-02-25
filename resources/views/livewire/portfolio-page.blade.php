<div>
    <!-- Page Header Start -->
    <div class="page-header">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!-- Page Header Box Start -->
                    <div class="page-header-box">
                        <h1 class="text-anime-style-3">{{$data['seo']['title_page']}}</h1>
                        <nav class="wow fadeInUp" data-wow-delay="0.25s">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/">Главная</a></li>
                                <li class="breadcrumb-item active"
                                    aria-current="page">{{$data['seo']['title_page']}}</li>
                            </ol>
                        </nav>
                    </div>
                    <!-- Page Header Box End -->
                </div>
            </div>
        </div>
    </div>
    <!-- Page Header End -->

    <!-- Projects Page Start -->
    <div class="our-projects">
        <div class="container">
            <div class="row">

                <div class="col-lg-12">
                    <!-- Project Item Box start -->
                    <div class="row project-item-boxes">
                        @foreach($portfolios as $portfolio)
                            <div class="col-md-6 project-item-box website graphics">
                                <a href="{{route('portfolio.show', ['slug' => $portfolio->slug])}}">
                                <!-- Works Item Start -->
                                <div class="works-item">
                                    <div class="works-image">
                                        <figure class="image-anime">
                                            <img src="{{asset('storage/' . $portfolio->image)}}" alt="">
                                        </figure>
                                    </div>
                                    <div class="works-content">
                                        <h2>{{$portfolio->title}}</h2>
                                    </div>
                                </div>
                                <!-- Works Item End -->
                                </a>
                            </div>

                        @endforeach
                    </div>
                    <!-- Project Item Box End -->
                </div>
            </div>
        </div>
    </div>
    <!-- Projects Page End -->
</div>
