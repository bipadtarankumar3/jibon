@extends('admin.layouts.main')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h6 class="py-3 mb-4"><span class="text-muted fw-light">Admin/</span>
            {{ Request::segment(2) . '/' . Request::segment(3) }}

        </h6>
     

        <div class="mb-2">
            <div class="row">
                <div class="col-md-10">
                    <h5 class="mb-0">{{$title}}</h5>
                </div>
                <div class="col-md-2">
                    <a href="{{URL::To('admin/contact/add')}}" class="btn btn-primary"> <i class="fa fa-plus" aria-hidden="true"></i> Add
                        New</a>
                       
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
                            <th>Map Link</th>
                            <th>Location</th>
                            <th>Open Hour</th>
                            <th>Email</th>
                            <th>Call</th>
                            <th>Action</th>

                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($contacts as $key=> $contact)
                             <tr>
                            <th scope="row">{{$key+1}}</th>
                            <td>{!!$contact->map_link!!}</td>

                            <td>{{$contact->location}}</td>
                            <td>{{$contact->open_hour}}</td>
                            <td>{{$contact->email}}</td>
                            <td>{{$contact->call}}</td>
                            <td>
                                <a href="{{URL::To('admin/contact/edit',$contact->id)}}"><i class="fa-solid fa-pen-to-square"></i></a>
                                <a href="{{URL::To('admin/contact/delete',$contact->id)}}" onclick="deleteConfirmation(event)"><i class="fa-solid fa-trash"></i></a>

                            </td>

                        </tr>
                        @endforeach
                       

                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
