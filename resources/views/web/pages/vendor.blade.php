@extends('web.layouts.main')
@section('content')
    <div class="hero page-inner overlay" style="background-image: url('public/assets/web/images/other-page-top.jpg')">
        <div class="container">
            <div class="row justify-content-center align-items-center">
                <div class="col-lg-9 text-center mt-5">
                    <h1 class="heading" data-aos="fade-up">VENDOR REGISTRATION</h1>
                    <nav aria-label="breadcrumb" data-aos="fade-up" data-aos-delay="200">
                        <ol class="breadcrumb text-center justify-content-center">
                            <li class="breadcrumb-item">
                                <a href="index.html">Home</a>
                            </li>
                            <li class="breadcrumb-item active text-white-50" aria-current="page">
                                Vendor
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
                        <h2> Vendor Registration</h2>
                        <p>
                            Become a valued part of our vendor network.
                            <br>
                        </p>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="ng-scope">
                        <form action="{{ route('vendor-query.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Name of Firm" name="firm_name" required>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Category Item" name="category_item" required>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Complete Product Details" name="product_details" required>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Year of Establishment of Firm" name="year_of_establishment" required>
                            </div>
                            <div class="form-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="customFile" name="file" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Firm Status" name="firm_status" required>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Nature of Business" name="business_nature" required>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Address of Registration Office" name="registration_office_address" required>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Factory Address" name="factory_address" required>
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control" placeholder="Email" name="email" required>
                            </div>
                            <div class="form-group">
                                <input type="number" class="form-control" placeholder="Mobile Number" name="mobile_number" required>
                            </div>
                            <button type="submit" class="btn w-100">Submit</button>
                        </form>
                        
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
