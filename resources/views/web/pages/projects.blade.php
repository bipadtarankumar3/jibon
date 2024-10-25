@extends('web.layouts.main')

@section('content')
<div class="hero page-inner overlay" style="background-image: url('public/assets/web/images/other-page-top.jpg')" >
    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col-lg-9 text-center mt-5">
                <h1 class="heading" data-aos="fade-up">Projects</h1>
                <nav aria-label="breadcrumb" data-aos="fade-up" data-aos-delay="200">
                    <ol class="breadcrumb text-center justify-content-center">
                        <li class="breadcrumb-item">
                            <a href="{{ route('home') }}">Home</a>
                        </li>
                        <li class="breadcrumb-item active text-white-50" aria-current="page">
                            Projects
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<section class="section search-div">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="text-center project-search">
                    <form action="{{ URL::To('projects') }}" method="get">
                        <div class="form-group">
                            <select name="property_type" id="property_type" required>
                                <option value="">Select Property Type</option>
                                <option value="Ready To Move" {{ request('property_type') == 'Ready To Move' ? 'selected' : '' }}>Ready To Move</option>
                                <option value="On Going" {{ request('property_type') == 'On Going' ? 'selected' : '' }}>On Going</option>
                            </select>
                            <button type="submit" class="btn btn-primary"> <i class="fa-solid fa-magnifying-glass"></i> </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="section-properties pt-0">
    <div class="container">
        <div class="heading" data-aos="fade-up" data-aos-delay="600">
            <h2> Projects </h2>
        </div>
        <div class="row">
            @foreach($properties as $property)
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4" data-aos="fade-right" data-aos-delay="600">
                <div class="property-item mb-30">
                    <a href="{{ URL::To('property-single', $property->id) }}" class="img">
                        <img src="{{ URL::To('public/' . $property->thumbail_image) }}" alt="Image" class="img-fluid property-img" />
                    </a>
                    <div class="property-content">
                        <div>
                            <span class="city d-block mb-2">{{ $property->name }}</span>
                            <span class="d-block mb-2 text-black-50">{{ $property->street_address }}</span>
                        </div>
                        <a href="{{ URL::To('property-single', $property->id) }}" class="btn btn-primary py-2 px-3">See details</a>
                    </div>
                </div>
                <!-- .item -->
            </div>
            @endforeach
        </div>
        <div class="row align-items-center py-5">
            <div class="col-lg-3 d-none d-lg-block">Pagination ({{ $properties->currentPage() }} of {{ $properties->lastPage() }})</div>
            <div class="col-lg-6 text-center">
                <div class="custom-pagination">
                    {{ $properties->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
