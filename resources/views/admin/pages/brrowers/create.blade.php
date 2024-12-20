@extends('admin.layouts.main')
@section('content')
    
<style>

.actions.clearfix ul li:last-child {
    display: none;
}

</style>

    <div class="right_part">
        <h3 class="pageTitlw">Borrowers</h3>
        <form class="common_form" action="{{ route('admin.brrowers.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div id="example-basic">
                <h3>Borrowers Information</h3>
                <section class="pb-4 pt-5">
                    <div class="row gy-3">

                        <div class="col-lg-4">
                            <div class="upload_img">
                                <div class="text-center">

                                    <div id="my_camera" style="height: 250;" class="text-center">

                                        <img src="{{ URL::TO('public/assets/images/person.png') }}" alt="..."
                                            class="img img-fluid" width="250">

                                    </div>

                                    <div class="form-group d-flex justify-content-center">

                                        <button type="button" class="btn btn-danger btn-sm mr-2" onclick="open_cam()"
                                            id="open_cam_cust">Open Camera</button>

                                        <button type="button" class="btn btn-secondary btn-sm ml-2"
                                            onclick="save_photo()">Capture</button>

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
                                            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960"
                                                width="24px" fill="green">
                                                <path
                                                    d="M440-280h80v-160h160v-80H520v-160h-80v160H280v80h160v160Zm40 200q-83 0-156-31.5T197-197q-54-54-85.5-127T80-480q0-83 31.5-156T197-763q54-54 127-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 83-31.5 156T763-197q-54 54-127 85.5T480-80Zm0-80q134 0 227-93t93-227q0-134-93-227t-227-93q-134 0-227 93t-93 227q0 134 93 227t227 93Zm0-320Z" />
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
                                    <input type="text" class="form-control" name="first_name" required>
                                </div>
                                <div class="col-4">
                                    <label>Middle Name (optional) :</label>
                                    <input type="text" class="form-control" name="middle_name">
                                </div>
                                <div class="col-4">
                                    <label>Last Name :</label>
                                    <input type="text" class="form-control" name="last_name" required>
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
                                    <option value="{{ $m->id }}">{{ $m->market_name }}</option>
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
                            <input type="text" class="form-control" value="India" name="country" readonly>
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
                                    <option value="{{ $loan_type->id }}" selected @readonly(true)>
                                        {{ $loan_type->type_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-12">
                            <label>Principal Amount</label>
                            <input type="number" class="form-control" id="principal_amount" name="principal_amount"
                                oninput="calculateLoan()">
                        </div>
                        <div class="col-6">
                            <label>Loan Terms</label>
                            <input type="text" class="form-control" id="loan_terms" name="loan_terms" readonly>
                        </div>
                        <div class="col-6">
                            <label>Select</label>
                            <input type="text" id="loan_duration_unit" class="form-control" name="loan_duration_unit"
                                readonly>
                        </div>
                        <div class="col-6">
                            <label>Interest (%)</label>
                            <input type="text" id="interest_rate" class="form-control" name="interest_rate" readonly>
                        </div>
                        <div class="col-6">
                            <label>Amortization</label>
                            <input type="text" id="amortization" class="form-control" name="amortization" readonly>
                        </div>
                        <div class="col-6">
                            <label>Total Amount Loan</label>
                            <input type="text" id="total_loan_amount" class="form-control" name="total_loan_amount"
                                readonly>
                        </div>
                        <div class="col-6">
                            <label>Note</label>
                            <input type="text" id="note" class="form-control" name="note">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class=" mt-4" style="text-align: end;
    position: absolute;
    right: 0px;">
                                <button type="submit" class="btn btn-outline-info" style="background: #327ec4;
                                    padding: 10px 20px;
                                    border-radius: 40px;
                                    font-size: 16px;
                                    text-transform: capitalize;
                                    border:1px solid #327ec4;
                                    color: #fff;
                                    min-width: 140px;
                                    text-align: center;">
                                    Finish
                                </button>
                
                            </div>
                        </div>
                    </div>
                    
                </section>

            </div>
            
        </form>
    </div>
@endsection



@section('js')
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Trigger the function with the single loan_type value
            @if (isset($loan_types[0]))
                getLoanType({{ $loan_types[0]->id }});
            @endif
        });

        function getLoanType(loanTypeId) {
            console.log(loanTypeId);
            $.ajax({
                url: "{{ route('admin.loantypedetails') }}",
                type: "GET",
                data: {
                    loanTypeId: loanTypeId
                },
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


            // Set calculated values in the form
            document.getElementById('total_loan_amount').value = totalAmount.toFixed(2);
            document.getElementById('amortization').value = totalAmount.toFixed(2);
        }
    </script>
    <script>
        function open_cam() {
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
                    <svg style="background: red;" xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#e8eaed">
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
