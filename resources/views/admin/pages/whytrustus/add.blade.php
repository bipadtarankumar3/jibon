@extends('admin.layouts.main')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="py-3 mb-4">
            <span class="text-muted fw-light">Home /</span><span> Add Highlits</span>
        </h4>
        <div class="app-ecommerce">
            <!-- Add Product -->
           
            <div class="row">
                <form action="{{URL::To('admin/why-trust/add-action')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <!-- First column-->
                    <div class="col-12 col-lg-12">
                        <!-- Product Information -->
                        <div class="card mb-4">
                            <div class="card-header">
                                <h5 class="card-tile mb-0">why trust information</h5>
                            </div>
                            <div class="card-body">

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="name">Title</label>
                                            <input type="text" class="form-control" placeholder="Enter Title"
                                                name="title">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="name">Count</label>
                                            <input type="text" class="form-control" placeholder="Enter Count"
                                                name="count">
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
 
@endsection
