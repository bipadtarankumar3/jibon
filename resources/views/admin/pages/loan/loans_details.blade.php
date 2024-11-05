@extends('admin.layouts.main')

@section('content')

    <div class="right_part">
        <h3 class="pageTitlw">Payment Management</h3>

        <div class="row row-cols-2 mb-4">
            <div class="col">
                <div class="loan_dtls_profil">
                    <figure>
                        <img src="{{URL::TO('public/'.$loanDetails->user->avater)}}" alt="">
                    </figure>
                    <h5>{{$loanDetails->user->first_name}}{{$loanDetails->user->last_name}}</h5>
                    <ul>
                        <li>Gender: {{$loanDetails->user->gender}}</li>
                        <li>Birthdate: {{$loanDetails->user->birth_date}}</li>
                        <li>Contact No.: <a href="tel:7908023143">{{$loanDetails->user->contact_number}}</a></li>
                        <li>Address: 
                            {{ $loanDetails->address->city ?? '' }} ,
                            {{ $loanDetails->address->market ?? '' }} ,
                            {{ $loanDetails->address->post_office ?? '' }} ,
                            {{ $loanDetails->address->police_station ?? '' }} ,
                            {{ $loanDetails->address->zip_code ?? '' }} ,
                            {{ $loanDetails->address->country ?? '' }}
                        </li>
                        <li>Profession: {{$loanDetails->address->occupation}}</li>
                    </ul>
                </div>
            </div>
            <div class="col">
                <div class="loan_right">
                    <h5>Loan Details</h5>
                    <ul>
                        <li>Status: <span>Active</span></li>
                        <li>Loan ID: <p>{{$loanDetails->loan_unique_id}}</p>
                        </li>
                        <li>Principal:<p> ₹ {{$loanDetails->principle_amount}}</p>
                        </li>
                        <li>Loan Type: <p>Short Term</p>
                        </li>
                        <li>Interest: <p>{{$loanDetails->interest}}%</p>
                        </li>
                        <li>Terms:<p>{{$loanDetails->loan_terms}} day(s)</p>
                        </li>
                        <li>Penalty: <p>%</p>
                        </li>
                        <li>Date Started: <p>{{$loanDetails->created_at->format('d/m/Y')}}</p>
                        </li>
                        <li>Maturity Date: <p>{{$loanDetails->maturity_date}}</p>
                        </li>
                        <li>Payment:<p> ₹ {{$trans_emi_amount_sum}}</p>
                        </li>
                        <li>Total Amount: <p>₹ {{$loanDetails->total_amount}}</p>
                        </li>
                        <li>Notes:</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="histry mb-5">
            <h5 style="font-size: 1.4rem;
color: #000;
margin-bottom: 20px;
text-transform: capitalize;
">Transaction
                History</h5>
            <div class="accordion" id="accordionExample">
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            Loan No 1
                        </button>
                    </h2>
                    <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                        <div class="accordion-body p-0">
                            <div class="money_table">
                                <table class="table" >
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Collection Date</th>
                                            <th>Collected Amount</th>
                                            <th>Collector</th>
                                        </tr>
                                    <tbody>
                                        @if(!empty($loanDetails->transactions ))
                                        @foreach ($loanDetails->transactions as $key => $transaction)
                                        <tr>
                                            <td>{{$key+1}}</td>
                                            <td>{{$transaction->created_at->format('d/m/Y')}}</td>
                                            <td>₹ {{$transaction->trans_emi_amount}}</td>
                                            <td>{{Auth::user()->name}}</td>
                                        </tr>
                                        @endforeach
                                        @endif
                                       
                                    </tbody>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>




        <div class="money_table">
            <h5>Payment History</h5>
            <table class="table" id="zero_config">
                <thead>
                    <tr>
                        <th>Sl No</th>
                        <th>Date</th>
                        <th>Daily EMI</th>
                        <th>Remaning Amount</th>
                        <th>Daily Collect</th>
                        <th>Status</th>
                        
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if (!empty($loanDetails->emi))
                    @foreach ($loanDetails->emi as $key => $item)
                    <tr>
                        <td>{{$key+1}}</td>

                        <td>{{$item->emi_date}}</td>
                        <td>₹ {{$item->emi_amount}}</td>
                        <td>₹ {{$item->remaining_amount}}</td>
                        <td>₹ {{$item->emi_amount}}</td>
                        <td>{{$item->status}}</td>
                        <td></td>
                        
                    </tr>
                    @endforeach
                    @endif
                    
                </tbody>
            </table>
        </div>
    </div>
@endsection
