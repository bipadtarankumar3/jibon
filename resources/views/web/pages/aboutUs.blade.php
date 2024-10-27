@extends('web.layouts.main')
@section('content')
<main class="main">
    <section class="banner_sec">
        <img src="{{URL::To('public/assets/images/about_bnr.jpg')}}" alt="">
        <div class="outer_bnr">
        <div class="container">
            <div class="inner_bnr">
                <h1>About us</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="{{URL::to('/')}}">Home</a></li>
                      <li class="breadcrumb-item active" aria-current="page">About Us</li>
                    </ol>
                  </nav>
            </div>
        </div>
        </div>
    </section>
    <section class="about-area section-padding-100-0">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12 col-md-6">
                    <div class="about-content mb-100">

                        <div class="section-heading">
                            <div class="line"></div>
                            <p>Take look at our</p>
                            <h2>About our company</h2>
                        </div>
                        <h6 class="mb-4">Your Path to Financial Freedom Begins Here</h6>
                        <p class="mb-0">Embark on your journey to financial freedom with our flexible loan options tailored to your needs. Let us pave the way towards your dreams, one step at a time. Visit our website today and take the first step towards a brighter tomorrow!</p>
                        <!-- <a href="#" class="btn credit-btn mt-50">Discover</a> -->
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="about-thumbnail">
                        <img style="height: auto;" src="{{URL::To('public/assets/images/14.jpg')}}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="cta-area">
        
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
                            <a href="tel:+91 8370809067" style="color:white">
                                <img src="{{URL::To('public/assets/images/call.svg')}}" alt=""> +91 8370809067</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

 
    <section class="team-area common_gap">
        <div class="container">
            <div class="row">
                <div class="col-12">

                    <div class="section-heading text-center">
                        <div class="line"></div>
                        <p>Take look at our</p>
                        <h2>Our team</h2>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">

                <div class="col-12 col-sm-6 col-lg-4">
                    <div class="single-team-member-area">
                        <div class="team-thumb">
                            <img src="{{URL::To('public/assets/images/Nurlu-Hasan.jpeg')}}" alt="">

                            <div class="view-more">
                                <a target="_blank" href="https://www.facebook.com/nurul.hasan.3551380?mibextid=LQQJ4d">+</a>
                            </div>
                        </div>
                        <div class="team-info">
                            <h5>Nurul Hasan</h5>
                            <h6>MD</h6>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-sm-6 col-lg-4">
                    <div class="single-team-member-area">
                        <div class="team-thumb">
                            <img src="{{URL::To('public/assets/images/asue.jpeg')}}" alt="">

                            <div class="view-more">
                                <a target="_blank" href="https://www.facebook.com/people/AS-UE/pfbid0jm2ovnszysd5KjCHGEaQAYTru9eVCUAxY2SdvFx1nvqci32Ey9EvKns8oHFKZAQ1l/?mibextid=LQQJ4d">+</a>
                            </div>
                        </div>
                        <div class="team-info">
                            <h5>Asue</h5>
                            <h6>MD</h6>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-sm-6 col-lg-4">
                    <div class="single-team-member-area">
                        <div class="team-thumb">
                            <img src="{{URL::To('public/assets/images/SAUKOT.jpeg')}}" alt="">

                            <div class="view-more">
                                <a target="_blank" href="https://www.facebook.com/sokat.ali.906?mibextid=ZbWKwL">+</a>
                            </div>
                        </div>
                        <div class="team-info">
                            <h5>Srk Soukot</h5>
                            <h6>MD</h6>
                        </div>
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
