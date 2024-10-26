@extends('admin.layouts.main')


@section('content')

<div class="right_part">
    <h3 class="pageTitlw">{{ isset($user) ? 'Edit User' : 'Add User' }}</h3>

    <div class="money_table">
        <div class="mb-3 text-end">
            <a class="common_btn" href="{{ URL::to('admin/users') }}">Back</a>
        </div>

        <!-- Form for creating or editing a user -->
        <form class="common_form" method="POST" action="{{ isset($user) ? route('admin.users.update', $user->id) : route('admin.users.store') }}" enctype="multipart/form-data">
            @csrf
            

            <div class="row gy-3">

                <div class="col-md-4">
                    <div class="text-center">
                        <div id="my_camera" style="height: 250;" class="text-center">
                            @if (isset($user->avater))
                            <img src="{{ URL::to('public/'. $user->avater) }}" alt="..." class="img img-fluid" width="250">
                            @else
                            <img src="{{ URL::TO('public/assets/images/person.png') }}" alt="..." class="img img-fluid" width="250">
                            @endif
                           
                        </div>
                        <div class="form-group d-flex justify-content-center">
                            <button type="button" class="btn btn-danger btn-sm mr-2" id="open_cam">Open Camera</button>
                            <button type="button" class="btn btn-secondary btn-sm ml-2" onclick="save_photo()">Capture</button>
                        </div>
                        <div id="profileImage">
                            <input type="hidden" name="avater" id="avater">
                        </div>
                        <div class="form-group mt-2">
                            <input type="file" class="form-control" name="avater_file" accept="image/*">
                            @if (isset($user->avater_file))
                            <img src="{{ URL::to('public/'. $user->avater_file) }}" alt="..." class="img img-fluid" width="250">
                            @endif
                        </div>
                    </div>
                </div>

                <div class="col-8">
                    <label>Username</label>
                    <input class="form-control" type="text" name="username" value="{{ old('username', $user->username ?? '') }}" required>
                    <div class="form-group mt-2">
                        <label>First Name</label>
                        <input class="form-control" type="text" name="first_name" value="{{ old('first_name', $user->first_name ?? '') }}" required>
                    </div>
                    <div class="form-group mt-2">
                        <label>Last Name</label>
                        <input class="form-control" type="text" name="last_name" value="{{ old('last_name', $user->last_name ?? '') }}" required>
                    </div>
                    <div class="form-group mt-2">
                        <label>User Role</label>
                        <select class="form-select" name="user_type" required>
                            <option value="admin" {{ (isset($user) && $user->user_type == 'admin') ? 'selected' : '' }}>Admin</option>
                            <option value="member" {{ (isset($user) && $user->user_type == 'member') ? 'selected' : '' }}>Member</option>
                        </select>
                    </div>
                    <div class="form-group mt-2">
                        <label>Email Address</label>
                        <input class="form-control" type="email" name="email" value="{{ old('email', $user->email ?? '') }}" required>
                    </div>
                </div>

                <div class="col-12">
                    <label>Address</label>
                    <textarea class="form-control" name="address" required>{{ old('address', $user->address ?? '') }}</textarea>
                </div>
                <div class="col-6">
                    <label>Password (leave blank to keep current)</label>
                    <input class="form-control" type="password" name="password">
                </div>
                <div class="col-6">
                    <label>Confirm Password</label>
                    <input class="form-control" type="password" name="confirm_password">
                </div>
                <div class="col-12 text-end">
                    <input type="submit" value="{{ isset($user) ? 'Update' : 'Create' }}" class="btn btn-primary">
                </div>
            </div>
        </form>

    </div>
</div>

@endsection
