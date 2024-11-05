@extends('admin.layouts.main')

@section('content')

<div class="right_part">
    <h3 class="pageTitlw">Loan Reports</h3>




    {{-- <form class="common_form mb-5" method="GET" id="create_loan_form" action="">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Month’s :</label>
                    <select class="form-control valid" name="month" style="width: 100%;" required="" aria-invalid="false">
                        <option value="January">January</option>
                        <option value="February">February</option>
                        <option value="March">March</option>
                        <option value="April">April</option>
                        <option value="May">May</option>
                        <option value="June">June</option>
                        <option value="July">July</option>
                        <option value="August">August</option>
                        <option value="September">September</option>
                        <option value="October">October</option>
                        <option value="November">November</option>
                        <option value="December">December</option>
                    </select><label id="month-error" class="error" for="month"></label>
                </div>
            </div>
        </div>
        <center>
            <button type="submit" class="btn btn-primary">Search</button>
        </center>
    </form> --}}

    <form class="common_form mb-5">
        <div class="row gy-4">
        
          <div class="col-6">
            <label>From</label>
             <input type="date" name="form_date" @if(isset($_GET['form_date'])) value="{{$_GET['form_date']}}" @endif class="form-control">
          </div>
          <div class="col-6">
            <label>To </label>
             <input type="date" name="to_date" @if(isset($_GET['to_date'])) value="{{$_GET['to_date']}}" @endif class="form-control">
          </div>
          <div class="col-12 text-end"> 
     
             <input type="submit" value="Search" class="btn btn-primary">
          </div>
        </div>
      </form>

    <div class="money_table">

      <div class="responsive-table">
        @php
    $totalMarketIn = 0;
    $totalMarketOut = 0;
    $totalNumberOfUsers = 0;
    $totalExistMember = 0;
    $totalLoanAmount = 0;
    $totalInterest = 0;
    $totalCollection = 0;
@endphp

<table class="table" id="zero_config">
    <thead>
        <tr>
            <th>#</th>
            <th>Date</th>
            <th>Market In</th>
            <th>Market Out</th>
            <th>Market Exist</th>
            <th>Member Add</th>
            <th>Full Paid</th>
            <th>Exist Member</th>
            <th>Loan Amount</th>
            <th>Interest</th>
            <th>Realisable</th>
            <th>Realised</th>
            <th>Outstanding</th>
            <th>Collection</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($transactions as $index => $transaction)
            @php
                $totalMarketIn += $transaction->market_in;
                $totalMarketOut += $transaction->market_out;
                $totalNumberOfUsers += $transaction->number_of_users;
                $totalExistMember += $transaction->exist_member;
                $totalLoanAmount += $transaction->loan_amount;
                $totalInterest += $transaction->interest;
                $totalCollection += $transaction->collection;
            @endphp
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $transaction->date }}</td>
                <td>{{ $transaction->market_in }}</td>
                <td>{{ $transaction->market_out }}</td>
                <td>0</td>
                <td>{{ $transaction->number_of_users }}</td>
                <td>0</td>
                <td>{{ $transaction->exist_member }}</td>
                <td>{{ $transaction->loan_amount }}</td>
                <td>{{ $transaction->interest }}</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
                <td>{{ $transaction->collection }}</td>
            </tr>
        @endforeach
    </tbody>
    <tfoot>
        <tr>
            <td colspan="2"><strong>Total</strong></td>
            <td>{{ $totalMarketIn }}</td>
            <td>{{ $totalMarketOut }}</td>
            <td>0</td>
            <td>{{ $totalNumberOfUsers }}</td>
            <td>0</td>
            <td>{{ $totalExistMember }}</td>
            <td>{{ $totalLoanAmount }}</td>
            <td>{{ $totalInterest }}</td>
            <td>0</td>
            <td>0</td>
            <td>0</td>
            <td>{{ $totalCollection }}</td>
        </tr>
    </tfoot>
</table>

      </div>
      </div> 

      </div>

@endsection