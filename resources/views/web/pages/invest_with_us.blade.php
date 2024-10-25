@extends('web.layouts.main')
@section('content')
    <div class="hero page-inner overlay" style="background-image:url('public/assets/web/images/other-page-top.jpg')">
        <div class="container">
            <div class="row justify-content-center align-items-center">
                <div class="col-lg-9 text-center mt-5">
                    <h1 class="heading" data-aos="fade-up">Invest With Us </h1>

                    <nav aria-label="breadcrumb" data-aos="fade-up" data-aos-delay="200">
                        <ol class="breadcrumb text-center justify-content-center">
                            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                            <li class="breadcrumb-item active text-white-50" aria-current="page">
                                Invest With Us
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <section class="section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="content-size-div">
                        <h2> Let's Grow Together. </h2>
                        <p>
                            Invest With Us
                            <br>
                            <br>
                            Get in touch:
                            <br>
                            <br>
                            +91912345678
                            <br>
                            Demo@gmail.com
                        </p>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="ng-scope">
                        <form action="{{ route('invest-with-us.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Name" name="name" required>
                            </div>
                            <div class="form-group">
                                <input type="number" class="form-control" placeholder="Mobile Number" name="mobile_number" required>
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control" placeholder="Email" name="email" required>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Address" name="address" required>
                            </div>
                            <div class="form-group">
                                <input type="date" class="form-control" name="date" required>
                            </div>
                            <button type="submit" class="btn w-100">Submit</button>
                        </form>
                        
                    
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
