@extends('admin.layouts.main')
@section('content')

<div class="right_part">
    <h3 class="pageTitlw">Borrowers</h3>
    <form class="common_form">
    <div id="example-basic">
      <h3>Borrowers Information</h3>
      <section class="pb-4 pt-5">
        <div class="row gy-3">
          <div class="col-lg-4">
            <div class="upload_img">
              <div class="text-center">

                <div id="my_camera" style="height: 250;" class="text-center">

                    <img src="{{URL::TO('public/assets/images/person.png')}}" alt="..." class="img img-fluid" width="250">

                </div>

                <div class="form-group d-flex justify-content-center">

                    <button type="button" class="btn btn-danger btn-sm mr-2" onclick="open_cam()" id="open_cam_cust">Open
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
          <div class="attachement">
            <label>Attachement: <span class="plus"><svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e8eaed"><path d="M440-280h80v-160h160v-80H520v-160h-80v160H280v80h160v160Zm40 200q-83 0-156-31.5T197-197q-54-54-85.5-127T80-480q0-83 31.5-156T197-763q54-54 127-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 83-31.5 156T763-197q-54 54-127 85.5T480-80Zm0-80q134 0 227-93t93-227q0-134-93-227t-227-93q-134 0-227 93t-93 227q0 134 93 227t227 93Zm0-320Z"/></svg></span></label>
            <input type="file" class="form-control">
          </div>
        </div>
        <div class="col-lg-8">
          <h4 class="form_title">Tell us who this borrower are.</h4>
          <div class="row gy-3">
            <div class="col-4">
              <label>First Name :</label>
              <input type="text" class="form-control">
            </div>
            <div class="col-4"> 
              <label>Middle Name(optional) :</label>
              <input type="text" class="form-control">
            </div>
            <div class="col-4"> 
              <label>Last Name :</label>
              <input type="text" class="form-control">
            </div>
            <div class="col-12"> 
              <label>Father/Husbend Name :</label>
              <input type="text" class="form-control">
            </div>
            <div class="col-4"> 
              <label>Gender :</label>
              <select class="form-select">
                <option>Male</option>
                <option>Female</option>
              </select>
            </div>
            <div class="col-4"> 
              <label>Birth Date :</label>
              <input type="date" class="form-control">
            </div>
            <div class="col-4"> 
              <label>Contact Number :</label>
              <input type="number" class="form-control">
            </div>
            <div class="col-12"> 
              <label>Aadhaar No. :</label>
              <input type="number" class="form-control">
            </div>
            <div class="col-12"> 
              <label>Pan Card No. :</label>
              <input type="text" class="form-control">
            </div>
            <div class="col-12"> 
              <label>Voter Card No. :</label>
              <input type="text" class="form-control">
            </div>

            <div class="col-6"> 
              <label>Occupation(optional) :</label>
              <input type="text" class="form-control">
            </div>
            <div class="col-6"> 
              <label>Occupation Address(optional) :</label>
              <input type="text" class="form-control">
            </div>

            <div class="col-12"> 
              <label>Occupation Landmark(optional) :</label>
              <input type="text" class="form-control">
            </div>

            <div class="col-12"> 
              <label>Remarks(optional) :</label>
             <textarea class="form-control"></textarea>
            </div>

          </div>
        </div>
        </div>
      </section>
      <h3>Borrowers Address</h3>
      <section class="pb-4 pt-5">
        <h4 class="form_title">Tell us where the borrower live.</h4>
        <div class="row gy-3">
          <div class="col-6">
            <label>City/Village :</label>
            <input type="text" class="form-control">
          </div>
          <div class="col-6"> 
            <label>Market :</label>
            <select class="form-select">
              <option>Bangalbari</option>
              <option>Guthin</option>
            </select>
          </div>
          <div class="col-6"> 
            <label>Post Office:</label>
            <input type="text" class="form-control">
          </div>
          <div class="col-6"> 
            <label>Police Station:</label>
            <input type="text" class="form-control">
          </div>
          <div class="col-6"> 
            <label>Zipcode :</label>
            <input type="text" class="form-control">
          </div>
          <div class="col-6"> 
            <label>Country :</label>
            <input type="text" class="form-control">
          </div>
        

        </div>
      </section>
      <h3>Loan Details</h3>
      <section class="pb-4 pt-5">
        <h4 class="form_title">Tell us how much loan need is the borrower.</h4>
        <div class="row gy-3">
          <div class="col-12">
            <label>Loan Types</label>
            <input type="text" class="form-control">
          </div>
          <div class="col-12"> 
            <label>Principal Amount</label>
            <input type="number" class="form-control">
          </div>
          <div class="col-6"> 
            <label>Loan Terms</label>
            <input type="text" class="form-control">
          </div>
          <div class="col-6"> 
            <label>Select</label>
           <select class="form-select">
            <option>day/s</option>
           </select>
          </div>
          <div class="col-6"> 
            <label>Interest(%)</label>
            <input type="text" class="form-control">
          </div>
          <div class="col-6"> 
            <label>Amortization</label>
            <input type="text" class="form-control">
          </div>
          <div class="col-6"> 
            <label>Total Amount Loan</label>
            <input type="text" class="form-control">
          </div>
          <div class="col-6"> 
            <label>Notes(Optional)</label>
            <input type="text" class="form-control">
          </div>

        </div>
      </section>
  </div>
</form>

      </div>
@endsection


@section('js')

<script>
      function open_cam () {
        Webcam.attach('#my_camera');
    }
</script>

@endsection