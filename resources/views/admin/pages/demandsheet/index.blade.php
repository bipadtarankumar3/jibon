@extends('admin.layouts.main')

@section('content')
<div class="right_part">
    <h3 class="pageTitlw">Print</h3>

    <form class="common_form mb-5">
      <div class="row gy-4">
      <div class="col-12">
       <label>Market :</label>
       <select class="form-select" name="market">
        <option>Select Market</option>
        @foreach($markets as $market)
          <option value="{{$market->id}}" @if (isset($_GET['market']) && $_GET['market'] == $market->id) selected @endif>{{$market->market_name}}</option>
        @endforeach
       </select>
        </div>
        <div class="col-6">
          <label>From</label>
           <input type="date" name="form_date" @if(isset($_GET['form_date'])) value="{{$_GET['form_date']}}" @endif class="form-control">
        </div>
        <div class="col-6">
          <label>To </label>
           <input type="date" name="to_date" @if(isset($_GET['to_date'])) value="{{$_GET['to_date']}}" @endif class="form-control">
        </div>
        <div class="col-12 text-end"> 
   
           <input type="submit" class="btn btn-primary">
        </div>
      </div>
    </form>

    <div class="money_table">
       
      <table class="table" id="printDatatable">
        <thead>
          <tr>
            <th>Serial No.</th>
            <th>Load Id</th>
            <th>Member Details</th>
            <th>Loan Date</th>
            <th>Loan Amount</th>
            <th>Loan Installment</th>
            <th>Due</th>
          </tr>
        </thead>
        <tbody>
          @php
            $totalLoanAmount = 0;
            $totalDueAmount = 0;
          @endphp
      
          @foreach($results as $index => $result)
            @php
              $totalLoanAmount += $result->total_amount;
              $totalDueAmount += $result->due_amount;
            @endphp
            <tr>
              <td>{{ $index + 1 }}</td>
              <td>{{ $result->loan_unique_id }}</td>
              <td>{{ $result->first_name }} {{ $result->last_name }}</td>
              <td>{{ \Carbon\Carbon::parse($result->created_at)->format('d/m/Y') }}</td>
              <td>{{ number_format($result->total_amount, 2) }}</td>
              <td>{{ number_format($result->emi_paid, 2) }}</td>
              <td>{{ number_format($result->due_amount, 2) }}</td>
            </tr>
          @endforeach
        </tbody>
        <tfoot>
          <tr>
            <th></th>
            <th></th>
            <th></th>
            <th  class="text-end">Grand Total</th>
            <th>{{ number_format($totalLoanAmount, 2) }}</th>
            <th></th>
            <th>{{ number_format($totalDueAmount, 2) }}</th>
          </tr>
        </tfoot>
      </table>
      
      </div> 

      </div>
@endsection