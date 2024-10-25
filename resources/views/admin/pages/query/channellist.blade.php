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
                            <th>Address</th>
                            <th>Date</th>
                            <th>Company Name</th>
                            

                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($channels as $key => $channel)
                            <tr>
                                <th scope="row">{{ $key + 1 }}</th>
                                <td>{{ $channel->name }}</td>
                                <td>{{ $channel->email }}</td>
                                <td>{{ $channel->mobile_number }}</td>
                                <td>{{ $channel->address }}</td>
                                <td>{{ $channel->date }}</td>
                                <td>{{ $channel->company_name }}</td>
                               
                              
                               

                            </tr>
                        @endforeach


                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
