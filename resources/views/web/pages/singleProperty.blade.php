@extends('web.layouts.main')
@section('content')
    <div class="hero page-inner overlay" style="background-image: url('../public/assets/web/images/hero_bg_3.jpg')">
        <div class="container">
            <div class="row justify-content-center align-items-center">
                <div class="col-lg-9 text-center mt-5">
                    <h1 class="heading" data-aos="fade-up">
                        {{ $project->name }}
                    </h1>
                    <nav aria-label="breadcrumb" data-aos="fade-up" data-aos-delay="200">
                        <ol class="breadcrumb text-center justify-content-center">
                            <li class="breadcrumb-item">
                                <a href="index.html">Home</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="properties.html">Properties</a>
                            </li>
                            <li class="breadcrumb-item active text-white-50" aria-current="page">
                                {{ $project->name }}
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="section">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-lg-6">
                    <div class="img-property-slide-wrap mr-3">



                        <div class="img-property-slide">
                            @foreach ($project->propertyImages as $image)
                                <img src="{{ URL::To('public/' . $image->images) }}" alt="Image" class="img-fluid">
                            @endforeach
                        </div>


                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="text-left">
                        <h2 class="heading text-primary text-left"> {{ $project->name }}</h2>
                        <p class="meta"> {{ $project->street_address }}</p>
                        <p class="text-black-50">
                            {!! $project->description !!}
                        </p>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <section class="highlights">
        <div class="container">
            <div class="row justify-content-center">
                <div class="heading" data-aos="fade-up" data-aos-delay="600">
                    <h2>Highlights</h2>

                </div>
            </div>
            <div class="row justify-content-center align-items-center pt-3">
                @foreach ($project->propertyHighlits as $highlit)
                    <div class="col-lg-4 col-md-6 col-sm-6 mb-4" data-aos="fade-right" data-aos-delay="600">
                        <div class="card">
                            <div class="card-body text-center">
                                <img decoding="async" src="{{ URL::To('public/' . $highlit->icon) }}" alt="img-5"
                                    class="img-fluid mb-4">
                                <p>
                                    {{$highlit->title}}
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <section class="section">
        <div class="container">
            <div class="row">
                <div class="heading" data-aos="fade-up" data-aos-delay="600">
                    <h2>Project Gallery</h2>
                </div>
                <div class="filter-gallery">
                    <div class="button-container nav-pills">
                        <button class="filter-button nav-link active" data-filter="image">Image</button>
                        <button class="filter-button nav-link" data-filter="video">Video</button>
                    </div>
                    <div class="image-container" id="gallery-container">
                        @foreach ($project->propertyImages as $image)
                            <div class="gallery-item" data-category="image">
                                <img src="{{ URL::To('public/' . $image->images) }}" alt="Image">
                            </div>
                        @endforeach
                        @if($project->video_link)
                            <div class="gallery-item" data-category="video">
                                <iframe src="{{ $project->video_link }}"
                                    title="YouTube video player"
                                    frameborder="0"
                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                    referrerpolicy="strict-origin-when-cross-origin"
                                    allowfullscreen></iframe>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="unit_plan_wrapp section mt-3">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 align-items-center text-center">
                    <h2>Unit Plans</h2>
                </div>
            </div>
            <div class="row justify-content-between align-items-center pt-3">
                <ul class="nav nav-pills justify-content-center align-items-center mb-5" id="pills-tab" role="tablist">
                    @foreach($project->propertyUnit as $index => $plan)
                        <li class="nav-item" role="presentation">
                            <button class="nav-link{{ $index === 0 ? ' active' : '' }}" id="pills-{{ $plan->unit_type }}-tab" data-bs-toggle="pill"
                                data-bs-target="#pills-{{ $plan->unit_type }}" type="button" role="tab" aria-controls="pills-{{ $plan->unit_type }}"
                                aria-selected="{{ $index === 0 ? 'true' : 'false' }}">{{ $plan->unit_type }}</button>
                        </li>
                    @endforeach
                </ul>
                <div class="tab-content" id="pills-tabContent">
                    @foreach($project->propertyUnit as $index => $plan)
                        <div class="tab-pane fade{{ $index === 0 ? ' show active' : '' }}" id="pills-{{ $plan->unit_type }}" role="tabpanel"
                            aria-labelledby="pills-{{ $plan->unit_type }}-tab">
                            <h6 class="text-center">{{ $plan->size_sq_foot }}</h6>
                            <div class="unit_plan_img mt-4">
                                <img src="{{ URL::to('public/' . $plan->unit_plan_image) }}" class="img-fluid" alt="{{ $plan->unit_type }}">

                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    
    <section class="map mb-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-12">
                    <iframe
                        src="{!! $project->map_link !!}"
                        style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
                <div class="col-lg-6 col-12">
                    <form action="{{ URL::To('contact-query') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-6 mb-3">
                                <input type="text" name="name" class="form-control" placeholder="Your Name" required>
                            </div>
                            <div class="col-6 mb-3">
                                <input type="email" name="email" class="form-control" placeholder="Your Email" required>
                            </div>
                            <div class="col-12 mb-3">
                                <input type="text" name="subject" class="form-control" placeholder="Subject" required>
                            </div>
                            <div class="col-12 mb-3">
                                <textarea name="message" cols="30" rows="7" class="form-control" placeholder="Message" required></textarea>
                            </div>
                            <div class="col-12">
                                <input type="submit" value="Send Message" class="btn btn-primary">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <script>
        document.querySelectorAll('.filter-button').forEach(button => {
            button.addEventListener('click', () => {
                const filter = button.dataset.filter;
    
                // Remove 'active' class from all buttons
                document.querySelectorAll('.filter-button').forEach(btn => {
                    btn.classList.remove('active');
                });
    
                // Add 'active' class to the clicked button
                button.classList.add('active');
    
                // Show/hide gallery items based on filter
                document.querySelectorAll('.gallery-item').forEach(item => {
                    if (filter === 'all' || item.dataset.category === filter) {
                        item.style.display = 'block';
                    } else {
                        item.style.display = 'none';
                    }
                });
            });
        });
    
        // Optionally, trigger the initial filter
        document.querySelector('.filter-button.active').click();
    </script>
@endsection
