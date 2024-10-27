@extends('web.layouts.main')
@section('content')


<main class="main">
    <section class="banner_sec">
        <img src="{{URL::To('public/assets/images/services_bnr.jpg')}}" alt="">
        <div class="outer_bnr">
        <div class="container">
            <div class="inner_bnr">
                <h1>Services</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="#">Home</a></li>
                      <li class="breadcrumb-item active" aria-current="page">Services</li>
                    </ol>
                  </nav>
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
                            <img src="{{URL::To('public/assets/images/loan.svg')}}" alt="">
                        </div>
                        <div class="text" style="padding-top: 18px;">
                            <h5>All the loans</h5>
                            
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-6 col-lg-4">
                    <div class="single-service-area d-flex mb-100">
                        <div class="icon">
                           <img src="{{URL::To('public/assets/images/loan2.svg')}}" alt="">
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
                            <img src="{{URL::To('public/assets/images/locan3.svg')}}" alt="">
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
                            <img src="{{URL::To('public/assets/images/locan4.svg')}}" alt="">
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
                            <img src="{{URL::To('public/assets/images/loan4.svg')}}" alt="">
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
                            <img src="{{URL::To('public/assets/images/loan6.svg')}}" alt="">
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

    <section class="cta-area">
        <div class="outr_cta">
            <div class="row m-0">
                <div class="col-lg-6 p-0">
                    <div class="cta-content">
                    <div class="section-heading white">
                        <div class="line"></div>
                        <!-- <p>Bold desing and beyound</p> -->
                        <h2>Some Milestones</h2>
                    </div>
                    <h6 class="mb-0">Celebrating 1000+ in Loans Disbursed - Thank You for Trusting Us on Your Financial Journey!</h6>
               
                </div>
             </div>
                <div class="col-lg-6 p-0"> 
                    <div class="outr_cta">
                    <img src="{{URL::To('public/assets/images/19.jpg')}}" alt="">
                    </div>
             </div>
            </div>
        </div>

        <div class="outr_cta">
            <div class="row m-0">
                <div class="col-lg-6 p-0">
                    <div class="cta-content">
                    <div class="section-heading white">
                        <div class="line"></div>
                        <!-- <p>Bold desing and beyound</p> -->
                        <h2>Some Milestones</h2>
                    </div>
                    <h6 class="mb-0">Celebrating 1000+ in Loans Disbursed - Thank You for Trusting Us on Your Financial Journey!</h6>
               
                </div>
             </div>
                <div class="col-lg-6 p-0"> 
                    <div class="outr_cta">
                    <img src="{{URL::To('public/assets/images/19.jpg')}}" alt="">
                    </div>
             </div>
            </div>
        </div>
    </section>

    <section class="credit-faq-area common_gap">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-6">
                    <div class="add-area">
                        <a href="#"><img src="{{URL::To('public/assets/images/add.png')}}" alt=""></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
 
    <section class="paralax_sec">
        <img class="img-parallax" data-speed=".5" src="{{URL::To('public/assets/images/paralax_img.jpg')}}" alt="">
    </section>

     
    </main>
@endsection