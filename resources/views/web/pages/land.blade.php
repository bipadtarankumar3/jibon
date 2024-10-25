@extends('web.layouts.main')
@section('content')
    <div class="hero page-inner overlay" style="background-image:url('public/assets/web/images/other-page-top.jpg')">
        <div class="container">
            <div class="row justify-content-center align-items-center">
                <div class="col-lg-9 text-center mt-5">
                    <h1 class="heading" data-aos="fade-up">Land</h1>
                    <nav aria-label="breadcrumb" data-aos="fade-up" data-aos-delay="200">
                        <ol class="breadcrumb text-center justify-content-center">
                            <li class="breadcrumb-item">
                                <a href="index.html">Home</a>
                            </li>
                            <li class="breadcrumb-item active text-white-50" aria-current="page">
                                Land
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
                        <p>
                            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Voluptatum ad corrupti officia quia
                            exercitationem odio.
                            <br>
                            <br>
                            Lorem ipsum dolor sit, amet consectetur adipisicing elit.
                            <br>
                            Ex in nam, distinctio ipsa provident.
                            <br>
                            <br>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit.
                        </p>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="ng-scope">
                        <form action="{{ URL::To('land-query') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <input type="text" class="form-control" id="name" aria-describedby="emailHelp"
                                    placeholder="Name" name="name" required>
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control" id="email" aria-describedby="emailHelp"
                                    placeholder="Email" name="email" required>
                            </div>
                            <div class="form-group">
                                <input type="number" class="form-control" id="mobile_number" aria-describedby="emailHelp"
                                    placeholder="Mobile Number" name="mobile_number" required>
                            </div>
                            <div class="form-group">
                                <label for="user_type" class="sr-only">You are?</label>
                                <div class="d-flex">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="user_type" id="owner"
                                            value="Owner" required>
                                        <label class="form-check-label" for="owner">
                                            Owner
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="user_type" id="broker"
                                            value="Broker" required>
                                        <label class="form-check-label" for="broker">
                                            Broker
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="google_map_location"
                                    placeholder="Google map Location Link" name="google_map_location" required>
                            </div>
                            <div class="form-group">
                                <label for="land_type" class="mb-2"> Propose Land Type</label>
                                <div class="checkbox_button">
                                    <div class="form-check" style="padding-left: 0px;">
                                        <input type="checkbox" class="btn-check" id="outrightSale" name="land_type[]"
                                            value="Outright Sale" required>
                                        <label class="btn-outline-primary" for="outrightSale">Outright Sale</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" class="btn-check" id="jointDevelopment" name="land_type[]"
                                            value="Joint Development" required>
                                        <label class="btn-outline-primary" for="jointDevelopment">Joint Development</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" class="btn-check" id="longLease" name="land_type[]"
                                            value="Long Lease" required>
                                        <label class="btn-outline-primary" for="longLease">Long Lease</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="land_zone" placeholder="Land Zone"
                                    name="land_zone" required>
                            </div>
                            <div class="form-group">
                                <input type="number" class="form-control" id="fsi" placeholder="FSI" name="fsi" required>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="land_size" placeholder="Land Size In Yard"
                                    name="land_size" required>
                            </div>
                            <div class="form-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="customFile1" name="customFile1"
                                        required>
                                    <label class="custom-file-label" for="customFile1">Choose file</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="customFile2" name="customFile2"
                                        required>
                                    <label class="custom-file-label" for="customFile2">Choose file</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" id="more_information" rows="5" placeholder="More Information"
                                    name="more_information" required></textarea>
                            </div>
                            <div class="form-check mb-4">
                                <input type="checkbox" class="form-check-input" id="is_non_agriculture"
                                    name="is_non_agriculture" required>
                                <label class="form-check-label" for="is_non_agriculture">Is Land Non Agriculture?</label>
                            </div>
                            <button type="submit" class="btn w-100">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
