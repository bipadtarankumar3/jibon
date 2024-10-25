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
                            <th>Firm</th>
                            <th>Category</th>
                            <th>Product</th>
                            <th>Firm Established</th>
                            <th>Image</th>
                            <th>Status</th>
                            <th>Business</th>
                            <th>Address</th>
                            <th>Factory Address</th>
                            <th>Email</th>
                            <th>Mobile</th>
                            

                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($vendorQuery as $key => $querie)
                            <tr>
                                <th scope="row">{{ $key + 1 }}</th>
                                <td>{{ $querie->firm_name }}</td>
                                <td>{{ $querie->category_item }}</td>
                                <td>{{ $querie->product_details }}</td>
                                <td>{{ $querie->year_of_establishment }}</td>
                                <td><img src="{{URL::To('public/'.$querie->file_path)}}" height="80px" width="80px" alt=""</td>
                                <td>{{ $querie->firm_status }}</td>
                                <td>{{ $querie->business_nature }}</td>
                                <td>{{ $querie->registration_office_address }}</td>
                                <td>{{ $querie->factory_address }}</td>
                                <td>{{ $querie->email }}</td>
                                <td>{{ $querie->mobile_number }}</td>
                               
                               

                            </tr>
                        @endforeach


                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
