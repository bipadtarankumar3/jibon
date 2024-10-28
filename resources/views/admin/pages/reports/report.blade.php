@extends('admin.layouts.main')

@section('content')


<div class="right_part">
    <h3 class="pageTitlw">Reports</h3>

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
        <table class="table" id="zero_config">
          <thead>
            <tr>
            <th>Loan No</th>
            <th>Borrower</th>
            <th>Collection Date</th>
            <th>Collected Amount</th>
            <th>Market</th>
            </tr>
          </thead>
          <tbody>

            @foreach ($transactions as $transaction)
                <tr>
                    <td>{{$transaction->loan_unique_id}}</td>
                    <td>{{$transaction->first_name}}</td>
                    <td>{{$transaction->created_at}}</td>
                    <td>{{$transaction->trans_emi_amount}}</td>
                    <td>{{$transaction->market_name}}</td>
                </tr>
            @endforeach
            


          </tbody>
        </table>
      </div>
      </div> 

      </div>


@endsection