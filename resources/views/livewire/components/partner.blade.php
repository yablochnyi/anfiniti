<div>
    <div class="exclusive-partners">
        <div class="container">
            <div class="row section-row align-items-center">
                <div class="col-lg-12">
                    <!-- Section Title Start -->
                    <div class="section-title">
                        <h3 class="wow fadeInUp">{{$data->partner_h3}}</h3>
                        <h2 class="text-anime-style-3">{{$data->partner_h2}}</h2>
                    </div>
                    <!-- Section Title End -->
                </div>
            </div>

            <div class="row">
                @foreach($partners as $partner)
                    <div class="col-lg-3 col-6">
                        <!-- Partners Logo Start -->
                        <div class="partners-logo wow fadeInUp" data-wow-delay="0.2s">
                            <img src="{{asset('storage/' . $partner->logo)}}" alt="">
                        </div>
                        <!-- Partners Logo End -->
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
