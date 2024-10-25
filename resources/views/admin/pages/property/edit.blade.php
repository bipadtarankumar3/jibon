@extends('admin.layouts.main')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="py-3 mb-4">
            <span class="text-muted fw-light">Home /</span><span> Update Project</span>
        </h4>
        <div class="app-ecommerce">
            <!-- Add Product -->
            <div class="d-flex flex-wrap justify-content-between align-items-center mb-3">
                <div class="d-flex flex-column justify-content-center">
                    <h4 class="mb-1 mt-3">Update Project</h4>
                </div>
            </div>
            <div class="row">
                <form action="{{ URL::To('admin/properties/edit-action', $propertie->id) }}" method="POST"
                    enctype="multipart/form-data">
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
                                            <input type="text" class="form-control" value="{{ $propertie->name }}"
                                                placeholder="Enter Property Name" name="name">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="name">Select State</label>
                                            <select name="state" id="state" class="form-control"
                                                onchange="getCity(this.value)">
                                                <option value="none">Select State</option>
                                                @foreach ($states as $state)
                                                    <option value="{{ $state->id }}"
                                                        @if ($state->id == $propertie->state) selected @endif>
                                                        {{ $state->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="name">Select City</label>
                                            <select name="city" id="city" class="form-control">
                                                <option value="none">Select City</option>
                                                <option value="{{ $propertie->city }}" selected>
                                                    {{ $propertie->cityName->city }}</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="name">Property Pincode</label>
                                            <input type="text" class="form-control" value="{{ $propertie->pincode }}"
                                                placeholder="Enter Property pincode" name="pincode">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="name">Property Street Address</label>
                                            <input type="text" class="form-control"
                                                value="{{ $propertie->street_address }}" placeholder="Enter Street Address"
                                                name="street_address">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="name">Property Thumbail Image</label>
                                            <input type="file" class="form-control" placeholder="Enter Street Address"
                                                name="thumbail_image">

                                            <img src="{{ URL::To('public/' . $propertie->thumbail_image) }}" alt=""
                                                height="50px" width="50px">
                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="name">Property Description</label>
                                            <textarea name="description" class="description" id="description">{!! $propertie->description !!}</textarea>
                                        </div>
                                    </div>

                                </div>
                                <div class="row">

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="name">Select Property Status</label>
                                            <select name="status" class="form-control" id="">
                                                <option value="none">select</option>
                                                <option value="Newly Lunched"
                                                    @if ($propertie->status == 'Newly Lunched') selected @endif>Newly Lunched</option>
                                                <option value="Under Construction"
                                                    @if ($propertie->status == 'Under Construction') selected @endif>Under Construction
                                                </option>
                                                <option value="Ready To Move"
                                                    @if ($propertie->status == 'Ready To Move') selected @endif>Ready To Move</option>

                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="name">Select Property Type</label>
                                            <select name="property_type" class="form-control" id="">
                                                <option value="none">select</option>
                                                <option value="Ready To Move"
                                                    @if ($propertie->property_type == 'Ready To Move') selected @endif>Ready To Move</option>
                                                <option value="On Going"
                                                    @if ($propertie->property_type == 'On Going') selected @endif>On Going</option>
                                              

                                            </select>
                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="name">Map Link</label>
                                            <input type="text" name="map_link" value="{{$propertie->map_link}}" class="form-control" >
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="name">Video Link</label>
                                            <input type="text" name="video_link" value="{{$propertie->video_link}}" class="form-control" >
                                        </div>
                                    </div>


                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="name">Select Images</label>
                                            <input type="file" name="images[]" class="form-control" multiple>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">

                                    <div class="col-md-3">
                                        @foreach ($PropertyImages as $PropertyImage)
                                            <a href=""><img src="{{ URL::To('public/' . $PropertyImage->images) }}"
                                                    alt="" height="50px" width="50px"> delete </a>
                                        @endforeach
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
