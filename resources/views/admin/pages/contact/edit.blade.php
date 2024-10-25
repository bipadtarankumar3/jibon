@extends('admin.layouts.main')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="py-3 mb-4">
            <span class="text-muted fw-light">Home /</span><span> Add About</span>
        </h4>
        <div class="app-ecommerce">
            <!-- Add Product -->

            <div class="row">
                <form action="{{ URL::To('admin/contact/edit-action',$contact->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <!-- First column-->
                    <div class="col-12 col-lg-12">
                        <!-- Product Information -->
                        <div class="card mb-4">
                            <div class="card-header">
                                <h5 class="card-tile mb-0">{{$title}}</h5>
                            </div>
                            <div class="card-body">

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="name">Map Link</label>
                                            <input type="text" class="form-control" placeholder="Enter Map Link"
                                                name="map_link" value="{{$contact->map_link}}">
                                        </div>
                                    </div>


                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="name">Location</label>
                                            <input type="text" class="form-control" placeholder="Enter Location"
                                                name="location" value="{{$contact->location}}">
                                        </div>
                                    </div>


                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="name">Open Hour</label>
                                            <input type="text" class="form-control" placeholder="Enter Location"
                                                name="open_hour" value="{{$contact->open_hour}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="name">Email</label>
                                            <input type="text" class="form-control" placeholder="Enter Email"
                                                name="email" value="{{$contact->email}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="name">Call</label>
                                            <input type="text" class="form-control" placeholder="Enter Email"
                                                name="call" value="{{$contact->call}}">
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="d-flex align-content-center flex-wrap gap-3">
                        <button type="submit" class="btn btn-primary">Update </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('description', {
            // Add any configurations here if needed
        });
    </script>
@endsection
