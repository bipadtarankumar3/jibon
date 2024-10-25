@extends('admin.layouts.main')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="py-3 mb-4">
            <span class="text-muted fw-light">Home /</span><span> Add About</span>
        </h4>
        <div class="app-ecommerce">
            <!-- Add Product -->

            <div class="row">
                <form action="{{ URL::To('admin/about/add-action') }}" method="POST" enctype="multipart/form-data">
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
                                            <label for="name">Title</label>
                                            <input type="text" class="form-control" placeholder="Enter about Title"
                                                name="title">
                                        </div>
                                    </div>


                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="name">Image</label>
                                            <input type="file" class="form-control" placeholder="Enter about Icon"
                                                name="image">
                                        </div>
                                    </div>


                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="name"> Description</label>
                                            <textarea name="description" class="description" id="description">{{ old('description') }}</textarea>
                                        </div>
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="d-flex align-content-center flex-wrap gap-3">
                        <button type="submit" class="btn btn-primary">Add </button>
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
