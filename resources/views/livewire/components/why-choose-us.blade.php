<div>
    <div class="why-choose-us">
        <div class="container">
            <div class="row section-row align-items-center">
                <div class="col-lg-8 col-md-12">
                    <!-- Section Title Start -->
                    <div class="section-title">
                        <h3 class="wow fadeInUp">{{$data['data']['h3']}}</h3>
                        <h2 class="text-anime-style-3">{{$data['data']['h2']}}</h2>
                    </div>
                    <!-- Section Title End -->
                </div>
            </div>

            <div class="row">
                @foreach($data['data']['services'] as $value)
                    <div class="col-lg-4 col-md-6">
                        <!-- Why Choose Item Start -->
                        <div class="why-choose-us-item wow fadeInUp" data-wow-delay="0.25s">
                            <div class="icon-box">
                                <img src="{{asset('storage/' . $value['image'])}}" alt="">
                            </div>
                            <h3>{{$value['title']}}</h3>
                            <p>{{$value['description']}}</p>
                        </div>
                        <!-- Why Choose Item End -->
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
