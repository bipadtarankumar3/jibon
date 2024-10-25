@extends('admin.layouts.main')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="py-3 mb-4">
            <span class="text-muted fw-light">Home /</span><span> Update Price</span>
        </h4>
        <div class="app-ecommerce">
            <!-- Add Product -->
           
            <div class="row">
                <form action="{{URL::To('admin/price/edit-action',$price->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <!-- First column-->
                    <div class="col-12 col-lg-12">
                        <!-- Product Information -->
                        <div class="card mb-4">
                            <div class="card-header">
                                <h5 class="card-tile mb-0">Price information</h5>
                            </div>
                            <div class="card-body">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="name">Select Property</label>
                                        <select name="property_id" id="state" class="form-control">
                                            <option value="none">Select Property</option>
                                            @foreach ($properties as $propertie)
                                            <option value="{{ $propertie->id }}" @if($propertie->id ==$price->property_id ) selected @endif>{{ $propertie->name }}</option>
                                        @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="name">Property Unit</label>
                                            <input type="text" class="form-control" value="{{$price->unit_type}}" placeholder="Enter Property Unit"
                                                name="unit_type">
                                        </div>
                                    </div>
                                   
                                    
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="name">Property Size</label>
                                            <input type="text" class="form-control" value="{{$price->size}}" placeholder="Enter Property Size"
                                                name="size">
                                        </div>
                                    </div>
                                   
                                    
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="name">Property Price</label>
                                            <input type="text" class="form-control" value="{{$price->price}}" placeholder="Enter Property Size"
                                                name="price">
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
