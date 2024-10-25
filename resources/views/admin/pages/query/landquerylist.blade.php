@extends('admin.layouts.main')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h6 class="py-3 mb-4"><span class="text-muted fw-light">Admin/</span>
            {{ Request::segment(2) . '/' . Request::segment(3) }}

        </h6>


        <div class="mb-2">
            <div class="row">
                <div class="col-md-10">
                    <h5 class="mb-0">{{ $title }}</h5>
                </div>
           
            </div>


        </div>
        <div class="card">
            {{-- <h5 class="card-header">{{ $title }}</h5> --}}
            <div class="table-responsive text-nowrap">
                <table class="table" id="zero_config">
                    <thead>
                        <tr class="text-nowrap">
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Mobile</th>
                            <th>Urser Type</th>
                            <th>Google Map Loction</th>
                            <th>Land Type</th>
                            <th>Land Zone</th>
                            <th>Fsi</th>
                            <th>Land Size</th>
                            <th>Custome Field 1</th>
                            <th>Custome Field 2</th>
                            <th>More Information</th>
                            <th>Is non Agriculture?</th>

                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($landqueries as $key => $querie)
                            <tr>
                                <th scope="row">{{ $key + 1 }}</th>
                                <td>{{ $querie->name }}</td>
                                <td>{{ $querie->email }}</td>
                                <td>{{ $querie->mobile_number }}</td>
                                <td>{{ $querie->user_type }}</td>
                                <td>{{ $querie->google_map_location }}</td>
                                <td>{{ $querie->land_type }}</td>
                                <td>{{ $querie->land_zone }}</td>
                                <td>{{ $querie->fsi }}</td>
                                <td>{{ $querie->land_size }}</td>
                                <td>{{ $querie->custom_file1 }}</td>
                                <td>{{ $querie->custom_file2 }}</td>
                                <td>{{ $querie->more_information }}</td>
                                <td>{{ $querie->is_non_agriculture }}</td>
                              
                               

                            </tr>
                        @endforeach


                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
