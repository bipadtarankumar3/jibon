@extends('admin.layouts.main')

@section('content')

<div class="right_part">
    <h3 class="pageTitlw">Users Management</h3>

    

    <div class="money_table">
       <div class="mb-3 text-end">
        <a class="common_btn" href="{{URL::to('admin/users')}}" >Back</a>
      </div>
        
      <form class="common_form">
        <div class="row gy-3">
          
            <div class="col-md-4">

                <div class="text-center">

                    <div id="my_camera" style="height: 250;" class="text-center">

                        <img src="{{URL::TO('public/assets/images/person.png')}}" alt="..." class="img img-fluid" width="250">

                    </div>

                    <div class="form-group d-flex justify-content-center">

                        <button type="button" class="btn btn-danger btn-sm mr-2" id="open_cam">Open
                            Camera</button>

                        <button type="button" class="btn btn-secondary btn-sm ml-2" onclick="save_photo()">Capture</button>

                    </div>

                    <div id="profileImage">

                        <input type="hidden" name="profileimg" id="avater">

                    </div>

                    <div class="form-group mt-2">

                        <input type="file" class="form-control" name="avater_file" accept="image/*">

                    </div>

                </div>

            </div>
          
          <div class="col-8">
            <label>Username</label>
             <input class="form-control" type="text" name="">
             <div class="form-group mt-2">
                <label>First Name</label>
             <input class="form-control" type="text" name="">
             </div>
             <div class="form-group mt-2">
                <label>Last Name</label>
             <input class="form-control" type="text" name="">
             </div>
             <div class="form-group mt-2">
                <label>User Role</label>
              <select class="form-select" name="user_type">
                <option>admin</option>
                <option>members</option>
              </select>
             </div>
             <div class="form-group mt-2">
                <label>Email Address</label>
                <input class="form-control" type="email" name="email">
             </div>
          </div>
          
          <div class="col-12"> 
            <label>Address</label>
            <textarea class="form-control" name="address"></textarea>
          </div>
          <div class="col-6"> 
            <label>Password</label>
             <input class="form-control" type="password" name="password">
          </div>
          <div class="col-6"> 
            <label>Confirm Password</label>
             <input class="form-control" type="password" name="confirm_password">
          </div>
          <div class="col-12 text-end"> 
            <input type="submit" value="Create" class="btn btn-primary">
          </div>
        </div>
      </form>

      </div> 

      </div>


{{-- 
      <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="marketLabel">Create User</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
             
            </div>
          </div>
        </div>
      </div> --}}


@endsection