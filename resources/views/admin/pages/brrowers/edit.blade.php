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
                    @if($brrowers->user->avater_file)
                    <img src="{{'public/'.$brrowers->user->avater_file'}}" height="100" width="100" alt="">
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
              <input type="text" class="form-control" name="first_name" value="{{$brrowers->user->first_name}}">
            </div>
            <div class="col-4"> 
              <label>Middle Name (optional) :</label>
              <input type="text" class="form-control" name="middle_name" value="{{$brrowers->user->middle_name}}">
            </div>
            <div class="col-4"> 
              <label>Last Name :</label>
              <input type="text" class="form-control" name="last_name" value="{{$brrowers->user->last_name}}">
            </div>
            <div class="col-12"> 
              <label>Father/Husband Name :</label>
              <input type="text" class="form-control" name="father_husband_name" value="{{$brrowers->user->father_husband_name}}">
            </div>
            <div class="col-4"> 
              <label>Gender :</label>
              <select class="form-select" name="gender">
                <option value="Male" @if($brrowers->user->gender == 'Male') selected @endif>Male</option>
                <option value="Female" @if($brrowers->user->gender == 'Female') selected @endif>Female</option>
              </select>
            </div>
            <div class="col-4"> 
              <label>Birth Date :</label>
              <input type="date" class="form-control" name="birth_date" value="{{$brrowers->user->birth_date}}">
            </div>
            <div class="col-4"> 
              <label>Contact Number :</label>
              <input type="number" class="form-control" name="contact_number" value="{{$brrowers->user->contact_number}}">
            </div>
            <div class="col-12"> 
              <label>Aadhaar No. :</label>
              <input type="number" class="form-control" name="aadhaar_number" value="{{$brrowers->user->aadhar_no}}">
            </div>
            <div class="col-12"> 
              <label>Pan Card No. :</label>
              <input type="text" class="form-control" name="pan_card_number" value="{{$brrowers->user->pan_no}}">
            </div>
            <div class="col-12"> 
              <label>Voter Card No. :</label>
              <input type="text" class="form-control" name="voter_card_number" value="{{$brrowers->user->voter_card_no}}">
            </div>

            <div class="col-6"> 
              <label>Occupation (optional) :</label>
              <input type="text" class="form-control" name="occupation" value="{{$brrowers->user->occupation}}">
            </div>
            <div class="col-6"> 
              <label>Occupation Address (optional) :</label>
              <input type="text" class="form-control" name="occupation_address" value="{{$brrowers->user->occupation_address}}">
            </div>

            <div class="col-12"> 
              <label>Occupation Landmark (optional) :</label>
              <input type="text" class="form-control" name="occupation_landmark" value="{{$brrowers->user->occupation_remarks}}">
            </div>

            <div class="col-12"> 
              <label>Remarks (optional) :</label>
              <textarea class="form-control" name="remarks">{!!$brrowers->user->remarks!!}</textarea>
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
            <input type="text" class="form-control" name="city_village" value="{{$brrowers->address->city}}">
          </div>
          <div class="col-6"> 
            <label>Market :</label>
            <select class="form-select" name="market">
                @foreach ($market as $m)
                <option value="{{$m->id}}" @if($brrowers->address->market == $m->id) selected @endif>{{$m->market_name}}</option>
                @endforeach
              
              
            </select>
          </div>
          <div class="col-6"> 
            <label>Post Office:</label>
            <input type="text" class="form-control" name="post_office" value="{{$brrowers->address->post_office}}">
          </div>
          <div class="col-6"> 
            <label>Police Station:</label>
            <input type="text" class="form-control" name="police_station" value="{{$brrowers->address->police_station}}">
          </div>
          <div class="col-6"> 
            <label>Zipcode :</label>
            <input type="text" class="form-control" name="zipcode" value="{{$brrowers->address->zip_code}}">
          </div>
          <div class="col-6"> 
            <label>Country :</label>
            <input type="text" class="form-control" name="country"  value="{{$brrowers->address->country}}">
          </div>
        </div>
      </section>
      <h3>Loan Details</h3>
      <section class="pb-4 pt-5">
        <h4 class="form_title">Tell us how much loan the borrower needs.</h4>
        <div class="row gy-3">
            <div class="col-12">
                <label>Loan Types</label>
                <select class="form-select" name="loan_type" onchange="getLoanType(this.value)">
                  <option value="">Select</option>
                    @foreach ($loan_types as $loan_type)
                    <option value="{{$loan_type->id}}" @if($brrowers->loan_type_id == $loan_type->id) selected @endif>{{$loan_type->type_name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-12">
                <label>Principal Amount</label>
                <input type="number" class="form-control" id="principal_amount" name="principal_amount" value="{{$brrowers->principle_amount}}" oninput="calculateLoan()">
            </div>
            <div class="col-6">
                <label>Loan Terms</label>
                <input type="text" class="form-control" id="loan_terms" name="loan_terms" value="{{$brrowers->loan_terms}}" readonly>
            </div>
            <div class="col-6">
                <label>Select</label>
                <input type="text" id="loan_duration_unit" class="form-control" name="loan_duration_unit" value="{{$brrowers->days}}" readonly>
            </div>
            <div class="col-6">
                <label>Interest (%)</label>
                <input type="text" id="interest_rate" class="form-control" name="interest_rate" value="{{$brrowers->interest}}" readonly>
            </div>
            <div class="col-6">
                <label>Amortization</label>
                <input type="text" id="amortization" class="form-control" name="amortization" value="{{$brrowers->amortization}}" readonly>
            </div>
            <div class="col-6">
                <label>Total Amount Loan</label>
                <input type="text" id="total_loan_amount" class="form-control" name="total_loan_amount" value="{{$brrowers->total_amount}}" readonly>
            </div>
            <div class="col-6">
                <label>Note</label>
                <input type="text" id="note" class="form-control" name="note" value="{{$brrowers->note}}x" >
            </div>
        </div>
    </section>
     
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
    function getLoanType(loantypeId){
        var loanTypeId = loantypeId;
        console.log(loantypeId);
        
            $.ajax({
                url: "{{ route('admin.loantypedetails') }}",  // URL to send the request to
                type: "GET",
                data:{
                    loanTypeId:loanTypeId 
                } , // HTTP method
                success: function(response) {
                    console.log(response);
                    
                    $('#interest_rate').val(response.interest);
                    $('#loan_duration_unit').val(response.day_month_type);
                    $('#loan_terms').val(response.loan_terms);
                },
                error: function(xhr, status, error) {
                    console.error('Error:', error);
                }
            });
       
    }
</script>
<script>
function calculateLoan() {
    // Get values from the form
    const principalAmount = parseFloat(document.getElementById('principal_amount').value) || 0;
    const loanTerms = parseInt(document.getElementById('loan_terms').value) || 0;
    const interestRate = parseFloat(document.getElementById('interest_rate').value) || 0;
    const loanDurationUnit = document.getElementById('loan_duration_unit').value.toLowerCase();


// Calculate the interest based on the principal amount and interest rate
const interestAmount = principalAmount * (interestRate / 100);

console.log("Interest Amount:", interestAmount);

var totalAmount = principalAmount + parseFloat(interestAmount);

    // // Calculate the interest as a decimal
    // const interestDecimal = interestRate / 100;

    // // Calculate Total Amount Loan (principal + total interest over the term)
    // const totalLoanAmount = principalAmount + (principalAmount * interestDecimal * loanTerms);

    // // Calculate Amortization based on days or months
    // let amortization = 0;
    // if (loanDurationUnit === 'month') {
    //     amortization = totalLoanAmount / loanTerms; // Monthly amortization
    // } else if (loanDurationUnit === 'day') {
    //     amortization = totalLoanAmount / (loanTerms * 30); // Daily amortization, assuming 30 days per month
    // }

    // Set calculated values in the form
    document.getElementById('total_loan_amount').value = totalAmount.toFixed(2);
    document.getElementById('amortization').value = totalAmount.toFixed(2);
}

    </script>
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