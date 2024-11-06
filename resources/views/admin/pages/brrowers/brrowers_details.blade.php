@extends('admin.layouts.main')

@section('content')
    <div class="right_part">
        <h3 class="pageTitlw">Borrowers Profile</h3>


        <div class="row mb-4">
            <div class="col-lg-4">
                <div class="loan_dtls_profil mb-5">
                    <figure>
                        <img src="{{ URL::TO('public/' . $borrower->avater) }}" alt="">
                    </figure>
                    <h5>{{ $borrower->first_name }}{{ $borrower->last_name }}</h5>
                    <ul>
                        <li>Gender: {{ $borrower->gender }}</li>
                        <li>Birthdate: {{ $borrower->birth_date }}</li>
                        <li>Contact No.: <a href="tel:7908023143">{{ $borrower->contact_number }}</a></li>
                        <li>Address:
                            {{ $borrower->addressDetails->city ?? '' }} ,
                            {{ $borrower->addressDetails->market ?? '' }} ,
                            {{ $borrower->addressDetails->post_office ?? '' }} ,
                            {{ $borrower->addressDetails->police_station ?? '' }} ,
                            {{ $borrower->addressDetails->zip_code ?? '' }} ,
                            {{ $borrower->addressDetails->country ?? '' }}
                        </li>
                        <li>Profession: {{ $borrower->occupation }}</li>
                    </ul>
                </div>

                <div class="loan_dtls_profil p-0">
                    <h5 style="padding: 10px;"> Borrowers Profile</h5>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Files</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($borrower->documents as $key => $item)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td><img src="{{ URL::to('public/upload/' . $item->image_name) }}" alt="Attachment"
                                            width="90px"></td>
                                    <td><a href="{{ URL::to('public/upload/' . $item->image_name) }}" target="_blank"
                                            download="">Download</a></td>
                                </tr>
                            @endforeach
                        </tbody>

                    </table>
                </div>

            </div>
            <div class="col-lg-8">
                <div class="loan_right p-0">
                    <h5 style="padding: 10px;"> Borrowers Profile</h5>
                    <table class="table mb-0" id="zero_config">
                        <thead>
                            <tr>
                                <th>Loan ID</th>
                                <th>Loan</th>
                                <th>Started</th>
                                <th>Maturity</th>
                                <th>Total</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($loanDetails as $key => $loanDetail)
                                <tr>
                                    <td>{{ $loanDetail->loan_unique_id }}</td>
                                    <td>{{ $loanDetail->principle_amount }}</td>
                                    <td>{{ $loanDetail->approve_date }}</td>
                                    <td>{{ $loanDetail->maturity_date }}</td>
                                    <td>₹ {{ $loanDetail->total_amount }}</td>
                                    <td>{{ $loanDetail->status }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>


                </div>
                <div class="histry mb-5 mt-5">
                    <h5
                        style="font-size: 1.4rem;
        color: #000;
        margin-bottom: 20px;
        text-transform: capitalize;
        ">
                        Transaction History</h5>
                    <div class="money_table">
                        <table class="table mb-0">
                            <thead>
                                <tr>
                                    <th>Loan ID</th>
                                    <th>Date</th>
                                    <th>Amount</th>
                                </tr>
                            <tbody>

                                @foreach ($loanDetail->transactions as $transaction)
                                    <tr>
                                        <td>{{ $loanDetail->loan_unique_id }}</td>
                                        <td>{{ $transaction->created_at->format('d/m/Y') }}</td>
                                        <td>₹ {{ $transaction->trans_emi_amount }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                            </thead>
                        </table>
                    </div>
                </div>



            </div>
        </div>

        <div class="row">
            <div class="card">
                <div class="card-header">
                    <h3 clas="card-title">Form</h3>
                    <Button class="btn btn-primary" onclick="printDiv('printableContent')">Print</Button>
                </div>
                <div class="card-body">
                    <center>
                        <div id="printableContent">
                            <div
                                style="border: 1px solid black;height: 118px;width: 113px; position: absolute; margin-top: 10%;margin-left: 83%;">
                                <img style="height: 118px;width: 113px;"
                                    src="{{ URL::TO('public/' . $borrower->avater) }}">
                            </div>
                            <center>
                                <img style="height: 100px;" src="{{ URL::TO('public/assets/images/logo.png') }}"
                                    alt=""><br>
                                <h5 style="margin: 5px;">CIN NO : U70200WB2023PTC263858</h5>
                                <h5 style="margin: 5px;">LOAN APPLICATION FORM</h5>
                            </center>
                            <table>
                                <tbody>
                                    <tr>
                                        <td>Existing Customer : Yes
                                            <input type="checkbox" name="existing_customer" id="existing_customer_yes">No
                                            <input type="checkbox" name="existing_customer" id="existing_customer_no">
                                            Customer Id :
                                        </td>
                                        <td style="display: flex; gap: 0; width: auto; border: 1px solid black; overflow: hidden; padding: 0; margin-bottom: 3px;"
                                            class="name-box">
                                            @foreach ($loanDetails as $key => $loanDetail)
                                                @php
                                                    $loan_chars = str_split($loanDetail->loan_unique_id);
                                                @endphp
                                                @foreach ($loan_chars as $char)
                                                    <div style="width: 20px; display: flex; justify-content: center; align-items: center; border-right: 1px solid black; box-sizing: border-box;"
                                                        class="letter-box">{{ $char }}</div>
                                                @endforeach
                                            @endforeach
                                        </td>

                                        <td>AGE</td>
                                        @php
                                            $age = str_split(\Carbon\Carbon::parse($borrower->birth_date)->age);

                                        @endphp

                                        <td style="display: flex; gap: 0; width: auto; border: 1px solid black; overflow: hidden; padding: 0; margin-bottom: 3px;"
                                            class="name-box">
                                            @foreach ($age as $age_char)
                                                <div style="width: 20px; display: flex; justify-content: center; align-items: center; border-right: 1px solid black; box-sizing: border-box;"
                                                    class="letter-box">{{ $age_char }}</div>
                                            @endforeach


                                        </td>
                                        <td>years</td>
                                    </tr>
                                </tbody>
                            </table>
                            <table>
                                <tbody>
                                    <tr>
                                        <td>Applicant Name :</td>
                                        <td style="display: flex; gap: 0; width: auto; border: 1px solid black; overflow: hidden; padding: 0; margin-bottom: 3px;"
                                            class="name-box">
                                            @php
                                                $name_chars = str_split($borrower->first_name);
                                                $lst_name_chars = str_split($borrower->last_name);
                                            @endphp

                                            @foreach ($name_chars as $name_char)
                                                <div style="width: 20px; display: flex; justify-content: center; align-items: center; border-right: 1px solid black; box-sizing: border-box;"
                                                    class="letter-box">{{ $name_char }}</div>
                                            @endforeach

                                            <div style="width: 20px; display: flex; justify-content: center; align-items: center; border-right: 1px solid black; box-sizing: border-box;"
                                                class="letter-box"> </div>

                                            @foreach ($lst_name_chars as $lst_name_char)
                                                <div style="width: 20px; display: flex; justify-content: center; align-items: center; border-right: 1px solid black; box-sizing: border-box;"
                                                    class="letter-box">{{ $lst_name_char }}</div>
                                            @endforeach

                                        </td>

                                    </tr>
                                </tbody>
                            </table>
                            <table>
                                <tbody>
                                    <tr>
                                        <td>Father/Husband Name :</td>
                                        <td style="display: flex; gap: 0; width: auto; border: 1px solid black; overflow: hidden; padding: 0; margin-bottom: 3px;"
                                            class="name-box">
                                            @php
                                                $father_chars = str_split($borrower->father_husband_name);
                                            @endphp
                                            @foreach ($father_chars as $char)
                                                <div style="width: 20px; display: flex; justify-content: center; align-items: center; border-right: 1px solid black; box-sizing: border-box;"
                                                    class="letter-box">{{ $char }}</div>
                                            @endforeach

                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <table>
                                <tbody>
                                    <tr>
                                        <td>Address :</td>
                                        <td style="display: flex; gap: 0; width: auto; border: 1px solid black; overflow: hidden; padding: 0; margin-bottom: 3px;"
                                            class="name-box">Vill
                                            @php
                                                $vill_chars = str_split($borrower->addressDetails->city);
                                                $post_office_chars = str_split($borrower->addressDetails->post_office);
                                                $police_station_chars = str_split(
                                                    $borrower->addressDetails->police_station,
                                                );
                                                $police_station_chars = str_split(
                                                    $borrower->addressDetails->police_station,
                                                );
                                                $zip_code_chars = str_split($borrower->addressDetails->zip_code);
                                            @endphp

                                            <div style="border-left: 1px solid black; display: inline-block;"></div>
                                            @foreach ($vill_chars as $char)
                                                <div style="width: 20px; display: flex; justify-content: center; align-items: center; border-right: 1px solid black; box-sizing: border-box;"
                                                    class="letter-box">{{ $char }}</div>
                                            @endforeach
                                            P.O
                                            <div style="border-left: 1px solid black; display: inline-block;"></div>
                                            @foreach ($post_office_chars as $char)
                                                <div style="width: 20px; display: flex; justify-content: center; align-items: center; border-right: 1px solid black; box-sizing: border-box;"
                                                    class="letter-box">{{ $char }}</div>
                                            @endforeach
                                            PS
                                            <div style="border-left: 1px solid black; display: inline-block;"></div>
                                            @foreach ($police_station_chars as $char)
                                                <div style="width: 20px; display: flex; justify-content: center; align-items: center; border-right: 1px solid black; box-sizing: border-box;"
                                                    class="letter-box">{{ $char }}</div>
                                            @endforeach

                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <table>
                                <tbody>
                                    <tr>
                                        <td style="display: flex; gap: 0; width: auto; border: 1px solid black; overflow: hidden; padding: 0; margin-bottom: 3px;"
                                            class="name-box">
                                            Pin
                                            <div style="border-left: 1px solid black; display: inline-block;"></div>
                                            @foreach ($zip_code_chars as $char)
                                                <div style="width: 20px; display: flex; justify-content: center; align-items: center; border-right: 1px solid black; box-sizing: border-box;"
                                                    class="letter-box">{{ $char }}</div>
                                            @endforeach


                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <table>
                                <tbody>
                                    @php
                                        $occupation_char = str_split($borrower->occupation);

                                    @endphp
                                    <tr>
                                        <td>Occupation :</td>
                                        <td style="display: flex; gap: 0; width: auto; border: 1px solid black; overflow: hidden; padding: 0; margin-bottom: 3px;"
                                            class="name-box">
                                            @foreach ($occupation_char as $char)
                                                <div style="width: 20px; display: flex; justify-content: center; align-items: center; border-right: 1px solid black; box-sizing: border-box;"
                                                    class="letter-box">{{ $char }}</div>
                                            @endforeach

                                        </td>
                                        <td>Gender :</td>
                                        <td>
                                            M <input type="checkbox" name="gender" id="gender_male" checked="">
                                            F <input type="checkbox" name="gender" id="gender_female">
                                            O <input type="checkbox" name="gender" id="gender_other">
                                        </td>

                                    </tr>
                                </tbody>
                            </table>
                            <img src="https://anusilanservices.com/loanIII/assets/form/Loan Application Form final257.png"
                                alt="">
                            <table>
                                <tbody>
                                    <tr>
                                        @php
                                            $aadhar_char = str_split($borrower->aadhar_no);
                                        @endphp
                                        <td>Aadhaar No :</td>
                                        <td style="display: flex; gap: 0; width: auto; border: 1px solid black; overflow: hidden; padding: 0; margin-bottom: 3px;"
                                            class="name-box">
                                            @foreach ($aadhar_char as $char)
                                                <div style="width: 20px; display: flex; justify-content: center; align-items: center; border-right: 1px solid black; box-sizing: border-box;"
                                                    class="letter-box">{{ $char }}</div>
                                            @endforeach

                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <table>
                                <tbody>
                                    <tr>
                                        @php
                                            $pan_char = str_split($borrower->pan_no);
                                        @endphp
                                        <td>Pan No :</td>
                                        <td style="display: flex; gap: 0; width: auto; border: 1px solid black; overflow: hidden; padding: 0; margin-bottom: 3px;"
                                            class="name-box">
                                            @foreach ($pan_char as $char)
                                                <div style="width: 20px; display: flex; justify-content: center; align-items: center; border-right: 1px solid black; box-sizing: border-box;"
                                                    class="letter-box">{{ $char }}</div>
                                            @endforeach

                                        </td>
                                        <td>or Form 60 :</td>
                                        <td style="display: flex; gap: 0; width: auto; border: 1px solid black; overflow: hidden; padding: 0; margin-bottom: 3px;"
                                            class="name-box">
                                            <input type="checkbox" name="form" id="form">
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <img src="https://anusilanservices.com/loanIII/assets/form/Loan Application Form final419.png"
                                alt="">
                            <table>
                                <tbody>
                                    @php
                                        $mobile_char = str_split($borrower->contact_number);
                                    @endphp
                                    <tr>
                                        <td>Mobile No :</td>
                                        <td style="display: flex; gap: 0; width: auto; border: 1px solid black; overflow: hidden; padding: 0; margin-bottom: 3px;"
                                            class="name-box">
                                            @foreach ($mobile_char as $char)
                                                <div style="width: 20px; display: flex; justify-content: center; align-items: center; border-right: 1px solid black; box-sizing: border-box;"
                                                    class="letter-box">{{ $char }}</div>
                                            @endforeach

                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <img src="https://anusilanservices.com/loanIII/assets/form/Loan Application Form final504.png"
                                alt="">
                            <table>
                                <tbody>
                                    @php
                                        $market_char = str_split($singleloanDetails->market->market_name);
                                    @endphp
                                    <tr>
                                        <td>Market Name :</td>
                                        <td style="display: flex; gap: 0; width: auto; border: 1px solid black; overflow: hidden; padding: 0; margin-bottom: 3px;"
                                            class="name-box">
                                            @foreach ($market_char as $char)
                                                <div style="width: 20px; display: flex; justify-content: center; align-items: center; border-right: 1px solid black; box-sizing: border-box;"
                                                    class="letter-box">{{ $char }}</div>
                                            @endforeach

                                        </td>
                                        @php
                                            $market_code_char = str_split($singleloanDetails->market->id);
                                        @endphp
                                        <td>Market Code :</td>
                                        <td style="display: flex; gap: 0; width: auto; border: 1px solid black; overflow: hidden; padding: 0; margin-bottom: 3px;"
                                            class="name-box">
                                            @foreach ($market_code_char as $char)
                                                <div style="width: 20px; display: flex; justify-content: center; align-items: center; border-right: 1px solid black; box-sizing: border-box;"
                                                    class="letter-box">{{ $char }}</div>
                                            @endforeach
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <table>
                                <tbody>
                                    @php
                                        $loan_amount_char = str_split($singleloanDetails->principle_amount);
                                    @endphp
                                    <tr>
                                        <td>Loan Amount :</td>
                                        <td style="display: flex; gap: 0; width: auto; border: 1px solid black; overflow: hidden; padding: 0; margin-bottom: 3px;"
                                            class="name-box">
                                            @foreach ($loan_amount_char as $char)
                                                <div style="width: 20px; display: flex; justify-content: center; align-items: center; border-right: 1px solid black; box-sizing: border-box;"
                                                    class="letter-box">{{ $char }}</div>
                                            @endforeach

                                        </td>
                                        @php
                                            $loan_cycle_char = str_split($singleloanDetails->loan_terms);
                                        @endphp
                                        <td>Loan Cycle :</td>
                                        <td style="display: flex; gap: 0; width: auto; border: 1px solid black; overflow: hidden; padding: 0; margin-bottom: 3px;"
                                            class="name-box">
                                            @foreach ($loan_cycle_char as $char)
                                                <div style="width: 20px; display: flex; justify-content: center; align-items: center; border-right: 1px solid black; box-sizing: border-box;"
                                                    class="letter-box">{{ $char }}</div>
                                            @endforeach

                                        </td>

                                        @php
                                            $year = substr($singleloanDetails->approve_date, 0, 4);
                                            $month = substr($singleloanDetails->approve_date, 5, 2);
                                            $day = substr($singleloanDetails->approve_date, 8, 2);
                                        @endphp

                                        <td>Loan Date :</td>
                                        <td style="display: flex; gap: 0; width: auto; border: 1px solid black; overflow: hidden; padding: 0; margin-bottom: 3px;"
                                            class="name-box">
                                            <!-- Day -->
                                            @foreach (str_split($day) as $char)
                                                <div style="width: 20px; display: flex; justify-content: center; align-items: center; border-right: 1px solid black; box-sizing: border-box;"
                                                    class="letter-box">
                                                    {{ $char }}
                                                </div>
                                            @endforeach

                                            <!-- Separator -->
                                            <div style="width: 20px; display: flex; justify-content: center; align-items: center; border-right: 1px solid black; box-sizing: border-box;"
                                                class="letter-box">/</div>

                                            <!-- Month -->
                                            @foreach (str_split($month) as $char)
                                                <div style="width: 20px; display: flex; justify-content: center; align-items: center; border-right: 1px solid black; box-sizing: border-box;"
                                                    class="letter-box">
                                                    {{ $char }}
                                                </div>
                                            @endforeach

                                            <!-- Separator -->
                                            <div style="width: 20px; display: flex; justify-content: center; align-items: center; border-right: 1px solid black; box-sizing: border-box;"
                                                class="letter-box">/</div>

                                            <!-- Year -->
                                            @foreach (str_split($year) as $char)
                                                <div style="width: 20px; display: flex; justify-content: center; align-items: center; border-right: 1px solid black; box-sizing: border-box;"
                                                    class="letter-box">
                                                    {{ $char }}
                                                </div>
                                            @endforeach
                                        </td>

                                    </tr>
                                </tbody>
                            </table>
                            {{-- <table>
                                <tbody>
                                    <tr>
                                        <td>Purpose of Loan :</td>
                                        <td style="display: flex; gap: 0; width: auto; border: 1px solid black; overflow: hidden; padding: 0; margin-bottom: 3px;"
                                            class="name-box">
                                            <div style="width: 20px; display: flex; justify-content: center; align-items: center; border-right: 1px solid black; box-sizing: border-box;"
                                                class="letter-box">B</div>
                                            <div style="width: 20px; display: flex; justify-content: center; align-items: center; border-right: 1px solid black; box-sizing: border-box;"
                                                class="letter-box">I</div>
                                            <div style="width: 20px; display: flex; justify-content: center; align-items: center; border-right: 1px solid black; box-sizing: border-box;"
                                                class="letter-box">K</div>
                                            <div style="width: 20px; display: flex; justify-content: center; align-items: center; border-right: 1px solid black; box-sizing: border-box;"
                                                class="letter-box">E</div>
                                            <div style="width: 20px; display: flex; justify-content: center; align-items: center; border-right: 1px solid black; box-sizing: border-box;"
                                                class="letter-box"> </div>
                                            <div style="width: 20px; display: flex; justify-content: center; align-items: center; border-right: 1px solid black; box-sizing: border-box;"
                                                class="letter-box">M</div>
                                            <div style="width: 20px; display: flex; justify-content: center; align-items: center; border-right: 1px solid black; box-sizing: border-box;"
                                                class="letter-box">E</div>
                                            <div style="width: 20px; display: flex; justify-content: center; align-items: center; border-right: 1px solid black; box-sizing: border-box;"
                                                class="letter-box">C</div>
                                            <div style="width: 20px; display: flex; justify-content: center; align-items: center; border-right: 1px solid black; box-sizing: border-box;"
                                                class="letter-box">H</div>
                                            <div style="width: 20px; display: flex; justify-content: center; align-items: center; border-right: 1px solid black; box-sizing: border-box;"
                                                class="letter-box">A</div>
                                            <div style="width: 20px; display: flex; justify-content: center; align-items: center; border-right: 1px solid black; box-sizing: border-box;"
                                                class="letter-box">N</div>
                                            <div style="width: 20px; display: flex; justify-content: center; align-items: center; border-right: 1px solid black; box-sizing: border-box;"
                                                class="letter-box">I</div>
                                            <div style="width: 20px; display: flex; justify-content: center; align-items: center; border-right: 1px solid black; box-sizing: border-box;"
                                                class="letter-box">C</div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <table>
                                <tbody>
                                    <tr>
                                        <td>Shop Address :</td>
                                        <td style="display: flex; gap: 0; width: auto; border: 1px solid black; overflow: hidden; padding: 0; margin-bottom: 3px;"
                                            class="name-box">
                                            <div style="width: 20px; display: flex; justify-content: center; align-items: center; border-right: 1px solid black; box-sizing: border-box;"
                                                class="letter-box">B</div>
                                            <div style="width: 20px; display: flex; justify-content: center; align-items: center; border-right: 1px solid black; box-sizing: border-box;"
                                                class="letter-box">A</div>
                                            <div style="width: 20px; display: flex; justify-content: center; align-items: center; border-right: 1px solid black; box-sizing: border-box;"
                                                class="letter-box">N</div>
                                            <div style="width: 20px; display: flex; justify-content: center; align-items: center; border-right: 1px solid black; box-sizing: border-box;"
                                                class="letter-box">G</div>
                                            <div style="width: 20px; display: flex; justify-content: center; align-items: center; border-right: 1px solid black; box-sizing: border-box;"
                                                class="letter-box">A</div>
                                            <div style="width: 20px; display: flex; justify-content: center; align-items: center; border-right: 1px solid black; box-sizing: border-box;"
                                                class="letter-box">L</div>
                                            <div style="width: 20px; display: flex; justify-content: center; align-items: center; border-right: 1px solid black; box-sizing: border-box;"
                                                class="letter-box">B</div>
                                            <div style="width: 20px; display: flex; justify-content: center; align-items: center; border-right: 1px solid black; box-sizing: border-box;"
                                                class="letter-box">A</div>
                                            <div style="width: 20px; display: flex; justify-content: center; align-items: center; border-right: 1px solid black; box-sizing: border-box;"
                                                class="letter-box">R</div>
                                            <div style="width: 20px; display: flex; justify-content: center; align-items: center; border-right: 1px solid black; box-sizing: border-box;"
                                                class="letter-box">I</div>
                                        </td>
                                        <td>Landmark :</td>
                                        <td style="display: flex; gap: 0; width: auto; border: 1px solid black; overflow: hidden; padding: 0; margin-bottom: 3px;"
                                            class="name-box">
                                            <div style="width: 20px; display: flex; justify-content: center; align-items: center; border-right: 1px solid black; box-sizing: border-box;"
                                                class="letter-box">N</div>
                                            <div style="width: 20px; display: flex; justify-content: center; align-items: center; border-right: 1px solid black; box-sizing: border-box;"
                                                class="letter-box">E</div>
                                            <div style="width: 20px; display: flex; justify-content: center; align-items: center; border-right: 1px solid black; box-sizing: border-box;"
                                                class="letter-box">A</div>
                                            <div style="width: 20px; display: flex; justify-content: center; align-items: center; border-right: 1px solid black; box-sizing: border-box;"
                                                class="letter-box">R</div>
                                            <div style="width: 20px; display: flex; justify-content: center; align-items: center; border-right: 1px solid black; box-sizing: border-box;"
                                                class="letter-box"> </div>
                                            <div style="width: 20px; display: flex; justify-content: center; align-items: center; border-right: 1px solid black; box-sizing: border-box;"
                                                class="letter-box">R</div>
                                            <div style="width: 20px; display: flex; justify-content: center; align-items: center; border-right: 1px solid black; box-sizing: border-box;"
                                                class="letter-box">A</div>
                                            <div style="width: 20px; display: flex; justify-content: center; align-items: center; border-right: 1px solid black; box-sizing: border-box;"
                                                class="letter-box">I</div>
                                            <div style="width: 20px; display: flex; justify-content: center; align-items: center; border-right: 1px solid black; box-sizing: border-box;"
                                                class="letter-box">L</div>
                                            <div style="width: 20px; display: flex; justify-content: center; align-items: center; border-right: 1px solid black; box-sizing: border-box;"
                                                class="letter-box">W</div>
                                            <div style="width: 20px; display: flex; justify-content: center; align-items: center; border-right: 1px solid black; box-sizing: border-box;"
                                                class="letter-box">A</div>
                                            <div style="width: 20px; display: flex; justify-content: center; align-items: center; border-right: 1px solid black; box-sizing: border-box;"
                                                class="letter-box">Y</div>
                                            <div style="width: 20px; display: flex; justify-content: center; align-items: center; border-right: 1px solid black; box-sizing: border-box;"
                                                class="letter-box"> </div>
                                            <div style="width: 20px; display: flex; justify-content: center; align-items: center; border-right: 1px solid black; box-sizing: border-box;"
                                                class="letter-box">T</div>
                                            <div style="width: 20px; display: flex; justify-content: center; align-items: center; border-right: 1px solid black; box-sizing: border-box;"
                                                class="letter-box">R</div>
                                            <div style="width: 20px; display: flex; justify-content: center; align-items: center; border-right: 1px solid black; box-sizing: border-box;"
                                                class="letter-box">A</div>
                                            <div style="width: 20px; display: flex; justify-content: center; align-items: center; border-right: 1px solid black; box-sizing: border-box;"
                                                class="letter-box">C</div>
                                            <div style="width: 20px; display: flex; justify-content: center; align-items: center; border-right: 1px solid black; box-sizing: border-box;"
                                                class="letter-box">K</div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table> --}}

                            <img src="https://anusilanservices.com/loanIII/assets/form/Loan Application Form final799.png"
                                alt="">
                            <div class="col-md-12">
                                <ul>
                                    <li>Installment will be on a daily basis</li>
                                    <li>2% of the loan amount will be deducted for insurance &amp; documentation purpose
                                    </li>
                                    <li>New loan can be sanctioned after 80 installments</li>
                                    <li>Extra charges will be applicable for non repayment within loan tenure</li>
                                    <li>Non repayment of loan can lead to legal actions</li>
                                </ul>
                            </div>
                            <img src="https://anusilanservices.com/loanIII/assets/form/Loan Application Form final1083.png"
                                alt="">
                            <p>I declare that the particulars and information given in the application form are true,
                                correct,
                                complete
                                and up to date in all respects and I have not withheld any information. I have read the
                                application
                                form
                                and am aware of all terms and conditions of availing finance from Anusilan Services Pvt.
                                Ltd. I
                                will
                                be
                                liable to pay the installments on a daily basis without fail.</p>
                            <table>
                                <tbody>
                                    <tr>
                                        @php
                                            use Carbon\Carbon;
                                            $todaysDate = Carbon::now()->format('d/m/Y'); // Format today's date as "dd/mm/yyyy"
                                            $day = substr($todaysDate, 0, 2);
                                            $month = substr($todaysDate, 3, 2);
                                            $year = substr($todaysDate, 6, 4);
                                        @endphp

                                        <td style="padding-bottom: 35px;">Date</td>
                                        <td style="display: flex; gap: 0; width: auto; border: 1px solid black; overflow: hidden; padding: 0; margin-bottom: 3px;"
                                            class="name-box">
                                            <!-- Day -->
                                            @foreach (str_split($day) as $char)
                                                <div style="width: 20px; display: flex; justify-content: center; align-items: center; border-right: 1px solid black; box-sizing: border-box;"
                                                    class="letter-box">
                                                    {{ $char }}
                                                </div>
                                            @endforeach

                                            <!-- Separator -->
                                            <div style="width: 20px; display: flex; justify-content: center; align-items: center; border-right: 1px solid black; box-sizing: border-box;"
                                                class="letter-box">/</div>

                                            <!-- Month -->
                                            @foreach (str_split($month) as $char)
                                                <div style="width: 20px; display: flex; justify-content: center; align-items: center; border-right: 1px solid black; box-sizing: border-box;"
                                                    class="letter-box">
                                                    {{ $char }}
                                                </div>
                                            @endforeach

                                            <!-- Separator -->
                                            <div style="width: 20px; display: flex; justify-content: center; align-items: center; border-right: 1px solid black; box-sizing: border-box;"
                                                class="letter-box">/</div>

                                            <!-- Year -->
                                            @foreach (str_split($year) as $char)
                                                <div style="width: 20px; display: flex; justify-content: center; align-items: center; border-right: 1px solid black; box-sizing: border-box;"
                                                    class="letter-box">
                                                    {{ $char }}
                                                </div>
                                            @endforeach
                                        </td>

                                        <td>Thumb Imp :
                                            <textarea style="margin-top: -18px; margin-left: 90px; border: 1px solid black;" rows="3"></textarea>
                                        </td>
                                        <td>Signature :
                                            <textarea style="margin-top: -18px; margin-left: 80px; border: 1px solid black;" rows="3"></textarea>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <img src="https://anusilanservices.com/loanIII/assets/form/Loan Application Form final1616.png"
                                alt="">
                            <table>
                                <tbody>
                                    <tr>
                                        <td>Sourced By :</td>
                                        <td style="display: flex; gap: 0; width: auto; border: 1px solid black; overflow: hidden; padding: 0; margin-bottom: 3px;"
                                            class="name-box">
                                            <div style="width: 20px; display: flex; justify-content: center; align-items: center; border-right: 1px solid black; box-sizing: border-box;"
                                                class="letter-box">_</div>
                                            <div style="width: 20px; display: flex; justify-content: center; align-items: center; border-right: 1px solid black; box-sizing: border-box;"
                                                class="letter-box">_</div>
                                            <div style="width: 20px; display: flex; justify-content: center; align-items: center; border-right: 1px solid black; box-sizing: border-box;"
                                                class="letter-box">_</div>
                                            <div style="width: 20px; display: flex; justify-content: center; align-items: center; border-right: 1px solid black; box-sizing: border-box;"
                                                class="letter-box">_</div>
                                            <div style="width: 20px; display: flex; justify-content: center; align-items: center; border-right: 1px solid black; box-sizing: border-box;"
                                                class="letter-box">_</div>
                                            <div style="width: 20px; display: flex; justify-content: center; align-items: center; border-right: 1px solid black; box-sizing: border-box;"
                                                class="letter-box">_</div>
                                            <div style="width: 20px; display: flex; justify-content: center; align-items: center; border-right: 1px solid black; box-sizing: border-box;"
                                                class="letter-box">_</div>
                                            <div style="width: 20px; display: flex; justify-content: center; align-items: center; border-right: 1px solid black; box-sizing: border-box;"
                                                class="letter-box">_</div>
                                            <div style="width: 20px; display: flex; justify-content: center; align-items: center; border-right: 1px solid black; box-sizing: border-box;"
                                                class="letter-box">_</div>
                                            <div style="width: 20px; display: flex; justify-content: center; align-items: center; border-right: 1px solid black; box-sizing: border-box;"
                                                class="letter-box">_</div>
                                            <div style="width: 20px; display: flex; justify-content: center; align-items: center; border-right: 1px solid black; box-sizing: border-box;"
                                                class="letter-box">_</div>
                                            <div style="width: 20px; display: flex; justify-content: center; align-items: center; border-right: 1px solid black; box-sizing: border-box;"
                                                class="letter-box">_</div>
                                            <div style="width: 20px; display: flex; justify-content: center; align-items: center; border-right: 1px solid black; box-sizing: border-box;"
                                                class="letter-box">_</div>
                                        </td>
                                        <td>Verified by :</td>
                                        <td style="display: flex; gap: 0; width: auto; border: 1px solid black; overflow: hidden; padding: 0; margin-bottom: 3px;"
                                            class="name-box">
                                            <div style="width: 20px; display: flex; justify-content: center; align-items: center; border-right: 1px solid black; box-sizing: border-box;"
                                                class="letter-box">_</div>
                                            <div style="width: 20px; display: flex; justify-content: center; align-items: center; border-right: 1px solid black; box-sizing: border-box;"
                                                class="letter-box">_</div>
                                            <div style="width: 20px; display: flex; justify-content: center; align-items: center; border-right: 1px solid black; box-sizing: border-box;"
                                                class="letter-box">_</div>
                                            <div style="width: 20px; display: flex; justify-content: center; align-items: center; border-right: 1px solid black; box-sizing: border-box;"
                                                class="letter-box">_</div>
                                            <div style="width: 20px; display: flex; justify-content: center; align-items: center; border-right: 1px solid black; box-sizing: border-box;"
                                                class="letter-box">_</div>
                                            <div style="width: 20px; display: flex; justify-content: center; align-items: center; border-right: 1px solid black; box-sizing: border-box;"
                                                class="letter-box">_</div>
                                            <div style="width: 20px; display: flex; justify-content: center; align-items: center; border-right: 1px solid black; box-sizing: border-box;"
                                                class="letter-box">_</div>
                                            <div style="width: 20px; display: flex; justify-content: center; align-items: center; border-right: 1px solid black; box-sizing: border-box;"
                                                class="letter-box">_</div>
                                            <div style="width: 20px; display: flex; justify-content: center; align-items: center; border-right: 1px solid black; box-sizing: border-box;"
                                                class="letter-box">_</div>
                                            <div style="width: 20px; display: flex; justify-content: center; align-items: center; border-right: 1px solid black; box-sizing: border-box;"
                                                class="letter-box">_</div>
                                            <div style="width: 20px; display: flex; justify-content: center; align-items: center; border-right: 1px solid black; box-sizing: border-box;"
                                                class="letter-box">_</div>
                                            <div style="width: 20px; display: flex; justify-content: center; align-items: center; border-right: 1px solid black; box-sizing: border-box;"
                                                class="letter-box">_</div>
                                            <div style="width: 20px; display: flex; justify-content: center; align-items: center; border-right: 1px solid black; box-sizing: border-box;"
                                                class="letter-box">_</div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <table>
                                <tbody>
                                    <tr>
                                        <td>Signature 1:
                                            <textarea style="border: 1px solid black;" rows="3"></textarea>
                                        </td>
                                        <td>Signature 2:
                                            <textarea style="border: 1px solid black;" rows="3"></textarea>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </center>
                </div>
            </div>
        </div>

    </div>
    <script>
        function printDiv() {
            var printContents = document.getElementById('printableContent').innerHTML;
            var originalContents = document.body.innerHTML;

            document.body.innerHTML = printContents;
            window.print();
            document.body.innerHTML = originalContents;
        }
    </script>
@endsection
