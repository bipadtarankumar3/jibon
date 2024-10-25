@extends('web.layouts.main')
@section('content')
    <div class="hero page-inner overlay" style="background-image: url('public/assets/web/images/other-page-top.jpg')">
        <div class="container">
            <div class="row justify-content-center align-items-center">
                <div class="col-lg-9 text-center mt-5">
                    <h1 class="heading" data-aos="fade-up">About</h1>
                    <nav aria-label="breadcrumb" data-aos="fade-up" data-aos-delay="200">
                        <ol class="breadcrumb text-center justify-content-center">
                            <li class="breadcrumb-item">
                                <a href="index.html">Home</a>
                            </li>
                            <li class="breadcrumb-item active text-white-50" aria-current="page">
                                About
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- <div class="section">
    <div class="container">
    <div class="row text-left mb-5">
      <div class="col-12">
        <h2 class="font-weight-bold heading text-primary mb-4">About Us</h2>
      </div>
    </div>
    </div>
    </div> -->
    <div class="section">
        <div class="container">
            <div class="row mb-5">
                <div class="col-lg-6 mb-5 mb-lg-0 order-lg-2">
                    <div class="img-about dots">
                        <img src="{{ URL::to('public/assets/web/images/about.jpeg') }}" alt="Image" class="img-fluid"
                            data-aos="fade-right" data-aos-delay="300">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="d-flex feature-h">
                        <div class="feature-text" data-aos="fade-up" data-aos-delay="300">
                            <h1> Vision & Mission</h1>
                            <p class="text-black-50">
                                {!! $about->description !!}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section class="counterup-sec mt-5">
        <div class="container">
            <div class="heading" style="margin-top: 10px;">
                <h2 style="color: #000000;">Footprints</h2>
            </div>
            <div class="row section-counter mt-5">
                @foreach ($footprints as $footprint)
                    {{-- @dd($footprint) --}}
                    <div class="col-6 col-sm-6 col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="300">
                        <div class="counter-wrap mb-5 mb-lg-0">
                            <span class="number">
                                <span class="countup text-black">{{ $footprint->count }}+</span>
                            </span>
                            <span class="caption text-black"> {{ $footprint->title }}</span>
                        </div>
                    </div>
                @endforeach


            </div>
        </div>
    </section>
    <div class="section sec-testimonials">
        <div class="container">
            <div class="heading">
                <h2> Our Happy Customers</h2>
            </div>
            <div class="testimonial-slider-wrap">
                <div class="testimonial-slider">
                    @foreach ($testimonials as $testimonial)
                        
                
                    <div class="item">
                        <div class="testimonial">
                            <img src="{{ URL::to('public/'.$testimonial->image) }}" alt="Image"
                                class="img-fluid rounded-circle w-25 mb-4">
                            <div class="rate">
                                <span class="icon-star text-warning"></span>
                                <span class="icon-star text-warning"></span>
                                <span class="icon-star text-warning"></span>
                                <span class="icon-star text-warning"></span>
                                <span class="icon-star text-warning"></span>
                            </div>
                            <h3 class="h5 text-primary mb-4">{{$testimonial->name}}</h3>
                            <blockquote>
                                <p>
                                    &ldquo; {{$testimonial->review}}&rdquo;
                                </p>
                            </blockquote>
                            <p class="text-black-50">{{$testimonial->designation}}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="col-md-6 text-md-end">
                <div id="testimonial-nav">
                    <span class="prev" data-controls="prev">Prev</span>
                    <span class="next" data-controls="next">Next</span>
                </div>
            </div>
        </div>
    </div>
@endsection
