@extends('web.layouts.main')
@section('content')
<main class="main">
    <section class="banner_sec">
        <img src="{{URL::To('public/assets/images/services_bnr.jpg')}}" alt="">
        <div class="outer_bnr">
        <div class="container">
            <div class="inner_bnr">
                <h1>Contact</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="#">Home</a></li>
                      <li class="breadcrumb-item active" aria-current="page">Contact</li>
                    </ol>
                  </nav>
            </div>
        </div>
        </div>
    </section>

    <section class="contact-area section-padding-100-0">
        <div class="container">
            <div class="row">

                <div class="col-12 col-lg-4">
                    <div class="single-contact-area mb-100">
                        <a href="#" class="d-block mb-50"><img src="{{URL::To('public/assets/images/logo.png')}}" alt=""></a>
                    <p>Morbi ut dapibus dui. Sed ut iaculis elit, quis varius mauris. Integer ut ultricies orci, 
                       lobortis egestas sem. Tut dapibus dui. Sed ut iaculis elit, quis varius mauris. Integer ut 
                    ultricies orci, lobortis.</p> 
                    </div>
                </div>

                <div class="col-12 col-lg-4">
                    <div class="single-contact-area mb-100">
                        <div class="contact-advisor">
                            <h5>Contact an advisor</h5>

                             
                        </div>
                    </div>
                </div>

                <div class="col-12 col-lg-4">
                    <div class="single-contact-area mb-100">
                        <div class="contact--area contact-page">

                            <div class="contact-content">
                                <h5>Get in touch</h5>
 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        
    </section>
 
    <section class="paralax_sec">
        <img class="img-parallax" data-speed=".5" src="{{URL::To('public/assets/images/paralax_img.jpg')}}" alt="">
    </section>

    <section class="newsletter-area bg-img">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-sm-10 col-lg-8">
                    <div class="nl-content text-center">
                      
                    </div>
                </div>
            </div>
        </div>

    </main>
@endsection
