<div>
    <div class="clients-testimonials about-testimonials">
        <div class="container">
            <div class="row section-row align-items-center">
                <div class="col-lg-8 col-md-12">
                    <!-- Section Title Start -->
                    <div class="section-title">
                        <h3 class="wow fadeInUp">{{$data->review_h3}}</h3>
                        <h2 class="text-anime-style-3">{{$data->review_h2}}</h2>
                    </div>
                    <!-- Section Title End -->
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <!-- Testimonial Slider Start -->
                    <div class="testimonial-slider">
                        <div class="swiper">
                            <div class="swiper-wrapper">
                                <!-- Testimonial Slide Start -->
                                @foreach($reviews as $review)
                                    <div class="swiper-slide">
                                        <div class="testimonial-item">
                                            <div class="testimonial-rating">
                                                <img src="{{asset('assets/images/icon-star.svg')}}" alt="">
                                            </div>

                                            <div class="testimonial-content">
                                                <p>{{$review->review}}</p>
                                            </div>

                                            <div class="testimonial-body">
                                                <figure class="image-anime">
                                                    <img src="{{asset('storage/' . $review->avatar)}}" alt="">
                                                </figure>
                                                <div class="testimonial-author-title">
                                                    <h2>{{$review->name}}</h2>
                                                    <p>{{$review->company_name}}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="swiper-pagination"></div>
                        </div>
                    </div>
                    <!-- Testimonial Slider End -->
                </div>
            </div>
        </div>
    </div>
</div>
