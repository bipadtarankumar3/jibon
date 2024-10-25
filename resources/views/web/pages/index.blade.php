@extends('web.layouts.main')
@section('content')
<main class="main">
    <section class="features-area">
        <div class="container">
            <div class="row">

                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="single-features-area mb-100">
                        <div class="section-heading">
                            <div class="line"></div>
                            <p>Take look at our</p>
                            <h2>Our Goals</h2>
                        </div>
                        <h6>স্বপ্ন আপনার,<br>আপনার স্বপ্ন পূরণের সঙ্গী আমরা।</h6>
                    </div>
                </div>

                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="single-features-area mb-100">
                        <img src="{{URL::TO('public/assets/images/2.jpg')}}" alt="">
                        <h5>We take care of you</h5>
                    </div>
                </div>

                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="single-features-area mb-100 wow fadeInUp">
                        <img src="{{URL::TO('public/assets/images/3.jpg')}}" alt="">
                        <h5>Minimum Documentation</h5>
                    </div>
                </div>

                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="single-features-area mb-100 wow fadeInUp">
                        <img src="images/4.jpg" alt="">
                        <h5>Fast &amp; easy loans</h5>
                    </div>
                </div>
                
            </div>
        </div>
    </section>


    <section class="cta-area">
        <div class="row m-0">
            <div class="col-lg-6">
                <img src="{{URL::TO('public/assets/images/logo.png')}}" alt="">
            </div>
            <div class="col-lg-6">
                <div class="cta-content">
                    <div class="section-heading white">
                        <div class="line"></div>
                        <h2>Helping small businesses like yours</h2>
                    </div>
                    <h6>আপনার অর্থের উপর নিয়ন্ত্রণ অর্জন করতে হবে অথবা এর অভাব আপনাকে চিরকাল নিয়ন্ত্রণ করবে।</h6>
                </div>
            </div>
        </div>
      
       
    </section>


    <section class="cta-2-area">
        <div class="container">
            <div class="row">
                <div class="col-12">

                    <div class="cta-content d-flex flex-wrap align-items-center justify-content-between">
                        <div class="cta-text">
                            <h4>আপনার কি ঋণের প্রয়োজন আছে? আমাদের সাথে যোগাযোগ করুন।</h4>
                        </div>
                        <div class="cta-btn">
                            <a href="tel:8370809067"> 
                                <img src="{{URL::TO('public/assets/images/call.svg')}}" alt=""> +91 8370809067</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="services-area section-padding-100-0">
        <div class="container">
            <div class="row">
                <div class="col-12">

                    <div class="section-heading text-center mb-100">
                        <div class="line"></div>
                        <p>Take look at our</p>
                        <h2>Our services</h2>
                    </div>
                </div>
            </div>
            <div class="row">

                <div class="col-12 col-md-6 col-lg-4">
                    <div class="single-service-area d-flex mb-100">
                        <div class="icon">
                            <img src="{{URL::TO('public/assets/images/loan.svg')}}" alt="">
                        </div>
                        <div class="text" style="padding-top: 18px;">
                            <h5>All the loans</h5>
                            
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-6 col-lg-4">
                    <div class="single-service-area d-flex mb-100" >
                        <div class="icon">
                           <img src="{{URL::TO('public/assets/images/loan2.svg')}}" alt="">
                        </div>
                        <div class="text" style="padding-top: 18px;">
                            <h5>Easy and fast answer</h5>
                            <!-- <p>Morbi ut dapibus dui. Sed ut iaculis elit, quis varius mauris. Integer ut ultricies orci,
                                lobortis egestas sem.</p> -->
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-6 col-lg-4">
                    <div class="single-service-area d-flex mb-100">
                        <div class="icon">
                            <img src="{{URL::TO('public/assets/images/locan3.svg')}}" alt="">
                        </div>
                        <div class="text" style="padding-top: 18px;">
                            <h5>Minimum Documentation</h5>
                            <!-- <p>Morbi ut dapibus dui. Sed ut iaculis elit, quis varius mauris. Integer ut ultricies orci,
                                lobortis egestas sem.</p> -->
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-6 col-lg-4">
                    <div class="single-service-area d-flex mb-100">
                        <div class="icon">
                            <img src="{{URL::TO('public/assets/images/locan4.svg')}}" alt="">
                        </div>
                        <div class="text" style="padding-top: 18px;">
                            <h5>Secure financial services</h5>
                            <!-- <p>Morbi ut dapibus dui. Sed ut iaculis elit, quis varius mauris. Integer ut ultricies orci,
                                lobortis egestas sem.</p> -->
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-6 col-lg-4">
                    <div class="single-service-area d-flex mb-100">
                        <div class="icon">
                            <img src="{{URL::TO('public/assets/images/loan4.svg')}}" alt="">
                        </div>
                        <div class="text" style="padding-top: 18px;">
                            <h5>Good investments</h5>
                            <!-- <p>Morbi ut dapibus dui. Sed ut iaculis elit, quis varius mauris. Integer ut ultricies orci,
                                lobortis egestas sem.</p> -->
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-6 col-lg-4">
                    <div class="single-service-area d-flex mb-100">
                        <div class="icon">
                            <img src="{{URL::TO('public/assets/images/loan6.svg')}}" alt="">
                        </div>
                        <div class="text" style="padding-top: 18px;">
                            <h5>A Trusted Loan Patnar</h5>
                            <!-- <p>Morbi ut dapibus dui. Sed ut iaculis elit, quis varius mauris. Integer ut ultricies orci,
                                lobortis egestas sem.</p> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="miscellaneous-area bg-gray section-padding-100-0">
        <div class="container">
            <div class="row align-items-end justify-content-center">

                <div class="col-12 col-md-6 col-lg-4">
                    <div class="add-area mb-100">
                        <a href="#url"><img style="height: auto;" src="{{URL::TO('public/assets/images/add.png')}}" alt=""></a>
                    </div>
                </div>

                <div class="col-12 col-md-6 col-lg-4">
                    <div class="contact--area mb-100" >

                        <div class="section-heading mb-50">
                            <div class="line"></div>
                            <h2>Get in touch</h2>
                        </div>

                        <div class="contact-content">

                            <div class="single-contact-content d-flex align-items-center">
                                <div class="icon">
                                    <img style="height: auto;" src="{{URL::TO('public/assets/images/location.png')}}" alt="">
                                </div>
                                <div class="text">
                                    <p>BANGALBARI,HEMTABAD,WEST BENGAL,733134</p>
                                </div>
                            </div>

                            <div class="single-contact-content d-flex align-items-center">
                                <div class="icon">
                                    <img style="height: auto;" src="{{URL::TO('public/assets/images/call.png')}}" alt="">
                                </div>
                                <div class="text">
                                    <p><a href="tel:+91 8370809067"> +91 8370809067</a></p>
                                    <span>mon-sat , 11.am - 08.pm</span>
                                </div>
                            </div>

                            <div class="single-contact-content d-flex align-items-center">
                                <div class="icon">
                                    <img style="height: auto;" src="{{URL::TO('public/assets/images/message2.png')}}" alt="">
                                </div>
                                <div class="text">
                                  <a href="mailto:sahajjibon31@gmail.com">sahajjibon31@gmail.com</a> 
                                   <!-- <p> </p> -->
                                    <span>we reply in 24 hrs</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="paralax_sec">
        <img class="img-parallax" data-speed=".5" src="{{URL::TO('public/assets/images/paralax_img.jpg')}}" alt="">
    </section>

     
    </main>
@endsection
