@extends('admin.layouts.main')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="py-3 mb-4">
            <span class="text-muted fw-light">Home /</span><span> Add Highlits</span>
        </h4>
        <div class="app-ecommerce">
            <!-- Add Product -->
           
            <div class="row">
                <form action="{{URL::To('admin/highlits/add-action')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <!-- First column-->
                    <div class="col-12 col-lg-12">
                        <!-- Product Information -->
                        <div class="card mb-4">
                            <div class="card-header">
                                <h5 class="card-tile mb-0">Highlits information</h5>
                            </div>
                            <div class="card-body">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="name">Select Property</label>
                                        <select name="property_id" id="state" class="form-control">
                                            <option value="none">Select Property</option>
                                            @foreach ($properties as $propertie)
                                                <option value="{{ $propertie->id }}">{{ $propertie->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="name">Property Highlits</label>
                                            <input type="text" class="form-control" placeholder="Enter Property Highlits"
                                                name="title">
                                        </div>
                                    </div>
                                   
                                    
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="name">Property Icon</label>
                                            <input type="file" class="form-control" placeholder="Enter Property Icon"
                                                name="icon">
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
