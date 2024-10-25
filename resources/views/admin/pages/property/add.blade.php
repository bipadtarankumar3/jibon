@extends('admin.layouts.main')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="py-3 mb-4">
            <span class="text-muted fw-light">Home /</span><span> Add Project</span>
        </h4>
        <div class="app-ecommerce">
            <!-- Add Product -->
            <div class="d-flex flex-wrap justify-content-between align-items-center mb-3">
                <div class="d-flex flex-column justify-content-center">
                    <h4 class="mb-1 mt-3">Add a new Project</h4>
                </div>
            </div>
            <div class="row">
                <form action="{{URL::To('admin/properties/add-action')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <!-- First column-->
                    <div class="col-12 col-lg-12">
                        <!-- Product Information -->
                        <div class="card mb-4">
                            <div class="card-header">
                                <h5 class="card-tile mb-0">Property information</h5>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="name">Property Name</label>
                                            <input type="text" class="form-control" placeholder="Enter Property Name"
                                                name="name">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="name">Select State</label>
                                            <select name="state" id="state" class="form-control"
                                                onchange="getCity(this.value)">
                                                <option value="none">Select State</option>
                                                @foreach ($states as $state)
                                                    <option value="{{ $state->id }}">{{ $state->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="name">Select City</label>
                                            <select name="city" id="city" class="form-control">
                                                <option value="none">Select City</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="name">Property Pincode</label>
                                            <input type="text" class="form-control" placeholder="Enter Property pincode"
                                                name="pincode">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="name">Property Street Address</label>
                                            <input type="text" class="form-control" placeholder="Enter Street Address"
                                                name="street_address">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="name">Property Thumbail Image</label>
                                            <input type="file" class="form-control" placeholder="Enter Street Address"
                                                name="thumbail_image">
                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="name">Property Description</label>
                                            <textarea name="description" class="description" id="description">{{ old('description') }}</textarea>
                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="name">Select Images</label>
                                            <input type="file" name="images[]" class="form-control" multiple>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="name">Select Property Status</label>
                                            <select name="status" class="form-control" id="">
                                                <option value="none">select</option>
                                                <option value="Sold Out">Sold Out</option>
                                                <option value="Newly Lunched">Newly Lunched</option>
                                                <option value="Under Construction">Under Construction</option>
                                                <option value="Ready To Move">Ready To Move</option>
                                              
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="name">Select Property Type</label>
                                            <select name="property_type" class="form-control" id="">
                                                <option value="none">select</option>
                                                <option value="Ready To Move">Ready To Move</option>
                                                <option value="On Going">On Going</option>
                                              
                                              
                                            </select>
                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="name">Map Link</label>
                                            <input type="text" name="map_link" class="form-control" >
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="name">Video Link</label>
                                            <input type="text" name="video_link" class="form-control" >
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

        function getCity(stateId) {
            if (stateId === 'none') {
                document.getElementById('city').innerHTML = '<option value="none">Select City</option>';
                return;
            }
            fetch("{{ URL::to('admin/properties/get-cities') }}", {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}' // Assuming you're using CSRF protection
                    },
                    body: JSON.stringify({
                        stateId: stateId
                    })
                })
                .then(response => response.json())
                .then(data => {
                    let options = '<option value="none">Select City</option>';
                    data.forEach(city => {
                        options += `<option value="${city.id}">${city.city}</option>`;
                    });
                    document.getElementById('city').innerHTML = options;
                })
                .catch(error => {
                    console.error('Error:', error);
                });
        }
    </script>
@endsection
