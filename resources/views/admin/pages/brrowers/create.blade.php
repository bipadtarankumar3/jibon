@extends('admin.layouts.main')
@section('content')

<div class="right_part">
    <h3 class="pageTitlw">Borrowers</h3>
    <form class="common_form" action="{{route('admin.brrowers.store')}}" method="post" enctype="multipart/form-data">
        @csrf
    <div id="example-basic">
      <h3>Borrowers Information</h3>
      <section class="pb-4 pt-5">
        <div class="row gy-3">
            
          <div class="col-lg-4">
            <div class="upload_img">
              <div class="text-center">

                <div id="my_camera" style="height: 250;" class="text-center">

                    <img src="{{ URL::TO('public/assets/images/person.png') }}" alt="..." class="img img-fluid" width="250">

                </div>

                <div class="form-group d-flex justify-content-center">

                    <button type="button" class="btn btn-danger btn-sm mr-2" onclick="open_cam()" id="open_cam_cust">Open Camera</button>

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
          <div class="attachment-container">
            <div class="attachment">
                <label>Attachment: <span class="plus" onclick="addAttachment()">
                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e8eaed">
                        <path d="M440-280h80v-160h160v-80H520v-160h-80v160H280v80h160v160Zm40 200q-83 0-156-31.5T197-197q-54-54-85.5-127T80-480q0-83 31.5-156T197-763q54-54 127-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 83-31.5 156T763-197q-54 54-127 85.5T480-80Zm0-80q134 0 227-93t93-227q0-134-93-227t-227-93q-134 0-227 93t-93 227q0 134 93 227t227 93Zm0-320Z"/>
                    </svg>
                </span></label>
                <input type="file" class="form-control" name="attachment_file[]">
            </div>
        </div>
        </div>
        <div class="col-lg-8">
          <h4 class="form_title">Tell us who this borrower are.</h4>
          <div class="row gy-3">
            <div class="col-4">
              <label>First Name :</label>
              <input type="text" class="form-control" name="first_name">
            </div>
            <div class="col-4"> 
              <label>Middle Name (optional) :</label>
              <input type="text" class="form-control" name="middle_name">
            </div>
            <div class="col-4"> 
              <label>Last Name :</label>
              <input type="text" class="form-control" name="last_name">
            </div>
            <div class="col-12"> 
              <label>Father/Husband Name :</label>
              <input type="text" class="form-control" name="father_husband_name">
            </div>
            <div class="col-4"> 
              <label>Gender :</label>
              <select class="form-select" name="gender">
                <option value="Male">Male</option>
                <option value="Female">Female</option>
              </select>
            </div>
            <div class="col-4"> 
              <label>Birth Date :</label>
              <input type="date" class="form-control" name="birth_date">
            </div>
            <div class="col-4"> 
              <label>Contact Number :</label>
              <input type="number" class="form-control" name="contact_number">
            </div>
            <div class="col-12"> 
              <label>Aadhaar No. :</label>
              <input type="number" class="form-control" name="aadhaar_number">
            </div>
            <div class="col-12"> 
              <label>Pan Card No. :</label>
              <input type="text" class="form-control" name="pan_card_number">
            </div>
            <div class="col-12"> 
              <label>Voter Card No. :</label>
              <input type="text" class="form-control" name="voter_card_number">
            </div>

            <div class="col-6"> 
              <label>Occupation (optional) :</label>
              <input type="text" class="form-control" name="occupation">
            </div>
            <div class="col-6"> 
              <label>Occupation Address (optional) :</label>
              <input type="text" class="form-control" name="occupation_address">
            </div>

            <div class="col-12"> 
              <label>Occupation Landmark (optional) :</label>
              <input type="text" class="form-control" name="occupation_landmark">
            </div>

            <div class="col-12"> 
              <label>Remarks (optional) :</label>
              <textarea class="form-control" name="remarks"></textarea>
            </div>

          </div>
        </div>
        </div>
      </section>
      <h3>Borrowers Address</h3>
      <section class="pb-4 pt-5">
        <h4 class="form_title">Tell us where the borrower lives.</h4>
        <div class="row gy-3">
          <div class="col-6">
            <label>City/Village :</label>
            <input type="text" class="form-control" name="city_village">
          </div>
          <div class="col-6"> 
            <label>Market :</label>
            <select class="form-select" name="market">
                @foreach ($market as $m)
                <option value="{{$m->id}}">{{$m->market_name}}</option>
                @endforeach
              
              
            </select>
          </div>
          <div class="col-6"> 
            <label>Post Office:</label>
            <input type="text" class="form-control" name="post_office">
          </div>
          <div class="col-6"> 
            <label>Police Station:</label>
            <input type="text" class="form-control" name="police_station">
          </div>
          <div class="col-6"> 
            <label>Zipcode :</label>
            <input type="text" class="form-control" name="zipcode">
          </div>
          <div class="col-6"> 
            <label>Country :</label>
            <input type="text" class="form-control" name="country">
          </div>
        </div>
      </section>
      <h3>Loan Details</h3>
      <section class="pb-4 pt-5">
        <h4 class="form_title">Tell us how much loan the borrower needs.</h4>
        <div class="row gy-3">
          <div class="col-12">
            <label>Loan Types</label>
            
            <select class="form-select" name="loan_type">
                @foreach ($loan_types as $loan_type)
                <option value="{{$loan_type->id}}">{{$loan_type->type_name}}</option>
                @endforeach
              
              
            </select>
          </div>
          <div class="col-12"> 
            <label>Principal Amount</label>
            <input type="number" class="form-control" name="principal_amount">
          </div>
          <div class="col-6"> 
            <label>Loan Terms</label>
            <input type="text" class="form-control" name="loan_terms">
          </div>
          <div class="col-6"> 
            <label>Select</label>
           <select class="form-select" name="loan_duration_unit">
            <option value="days">day/s</option>
           </select>
          </div>
          <div class="col-6"> 
            <label>Interest (%)</label>
            <input type="text" class="form-control" name="interest_rate">
          </div>
          <div class="col-6"> 
            <label>Amortization</label>
            <input type="text" class="form-control" name="amortization">
          </div>
          <div class="col-6"> 
            <label>Total Amount Loan</label>
            <input type="text" class="form-control" name="total_loan_amount">
          </div>
          <div class="col-6"> 
            <label>Due Date</label>
            <input type="date" class="form-control" name="due_date">
          </div>
        </div>
      </section>
      {{-- <h3>Bank Details</h3>
      <section class="pb-4 pt-5">
        <h4 class="form_title">Tell us where the borrower has an account.</h4>
        <div class="row gy-3">
          <div class="col-12"> 
            <label>Account Name</label>
            <input type="text" class="form-control" name="account_name">
          </div>
          <div class="col-12"> 
            <label>Bank Name</label>
            <input type="text" class="form-control" name="bank_name">
          </div>
          <div class="col-12"> 
            <label>Account No.</label>
            <input type="number" class="form-control" name="account_number">
          </div>
          <div class="col-12"> 
            <label>IFSC Code</label>
            <input type="text" class="form-control" name="ifsc_code">
          </div>
        </div>
      </section> --}}
    </div>
    <div class="d-flex justify-content-between">
      <button type="submit" class="btn btn-success">Save</button>
      <button type="button" class="btn btn-secondary" onclick="closeForm()">Close</button>
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
<script>
    function addAttachment() {
        // Create a new attachment div
        const attachmentDiv = document.createElement('div');
        attachmentDiv.classList.add('attachment');

        // Create label and input for the new attachment
        attachmentDiv.innerHTML = `
            <label>Attachment: 
                <span class="delete" onclick="removeAttachment(this)"> 
                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#e8eaed">
                        <path d="M19 6h-2V4c0-1.1-.9-2-2-2H9C7.9 2 7 2.9 7 4v2H5c-1.1 0-2 .9-2 2v2c0 1.1.9 2 2 2h1v8c0 1.1.9 2 2 2h8c1.1 0 2-.9 2-2v-8h1c1.1 0 2-.9 2-2v-2c0-1.1-.9-2-2-2zm-5 14H10v-8h4v8zm3-10H6V8h12v2z"/>
                    </svg>
                </span>
            </label>
            <input type="file" name="attachment_file[]" class="form-control">
        `;

        // Append the new attachment div to the container
        document.querySelector('.attachment-container').appendChild(attachmentDiv);
    }

    function removeAttachment(element) {
        // Remove the specific attachment div
        element.closest('.attachment').remove();
    }
</script>
@endsection