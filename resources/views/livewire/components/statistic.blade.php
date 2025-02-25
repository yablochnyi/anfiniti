<div>
    <div class="overview-company">
        <div class="container">
            <div class="row section-row align-items-center">
                <div class="col-lg-12">
                    <!-- Section Title Start -->
                    <div class="section-title">
                        <h3 class="wow fadeInUp">{{$setting->statistic_h3}}</h3>
                        <h2 class="text-anime-style-3">{{$setting->statistic_h2}}</h2>
                    </div>
                    <!-- Section Title End -->
                </div>
            </div>

            <div class="row">
                @foreach($data as $statistic)
                    @if($statistic->type == 'Статический текст')
                        <div class="col-lg-3 col-md-6">
                            <!-- Counter Box Start -->
                            <div class="counter-box">
                                <h3><span>{{$statistic->title}}</span></h3>
                                <p>{{$statistic->description}}</p>
                            </div>
                            <!-- Counter Box End -->
                        </div>
                    @endif
                    @if($statistic->type == '+')
                        <div class="col-lg-3 col-md-6">
                            <!-- Counter Box Start -->
                            <div class="counter-box">
                                <h3><span class="counter">{{$statistic->title}}</span><em>+</em></h3>
                                <p>{{$statistic->description}}</p>
                            </div>
                            <!-- Counter Box End -->
                        </div>
                    @endif
                    @if($statistic->type == 'Лет')
                        <div class="col-lg-3 col-md-6">
                            <!-- Counter Box Start -->
                            <div class="counter-box">
                                <h3><span class="counter">{{$statistic->title}}</span><em>+</em> лет</h3>
                                <p>{{$statistic->description}}</p>
                            </div>
                            <!-- Counter Box End -->
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
</div>
