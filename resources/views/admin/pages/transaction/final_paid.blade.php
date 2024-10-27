@extends('admin.layouts.main')
@section('content')
<div class="right_part">
    <h3 class="pageTitlw">Full Paid Customer</h3>

    <div class="money_table">
     
        <table class="table">
          <thead>
            <tr>
            <th>#</th>
            <th>Loan ID</th>
            <th>Name</th>
            <th>Phone</th>
            <th>Total Amount</th>
            <th>EMI</th>
            <th>Extra</th>
            <th>Due</th>
            <th>Status</th>
            <th>Market</th>
            {{-- <th>Action</th> --}}
            </tr>
          </thead>
          @php
          $grandTotalAmount = 0;
         
      @endphp
          <tbody>
            @foreach ($final_paid as $key => $final_pai)
                
            @php
            $grandTotalAmount += $final_pai->total_amount;
           
        @endphp
            <tr>
              <td>1</td>
              <td>{{ $final_pai->loan_unique_id }}</td>
               
            <td>{{ $final_pai->user->first_name ?? 'N/A' }} {{ $final_pai->user->last_name ?? '' }}</td>
            <td>{{$final_pai->user->contact_numbe}}</td>
            <td>{{$final_pai->total_amount}}</td>
            <td>{{$final_pai->total_amount/$final_pai->loan_terms}}</td>
            <td>{{$final_pai->total_amount-$final_pai->principle_amount}}</td>
            <td>0</td>
              <td><span class="paid">{{$final_pai->final_paid}}</span></td>
              <td>{{$final_pai->market->market_name}}</td>
              {{-- <td>
                <ul class="actn">
                  <li><a href="#url"><span class="material-symbols-outlined">
                    edit
                    </span></a></li>
                    <li><a href="#url"><span class="material-symbols-outlined">
                      delete
                      </span></a></li>
                </ul>
              </td> --}}
             
            </tr>
            @endforeach
            <tr>
                <td colspan="2"><strong>Grand Total:</strong></td>
                <td><strong>{{ $grandTotalAmount }}</strong></td>
                <td></td>
                <td></td>
                <td colspan="2"></td>
            </tr>
          </tbody>
        </table>
      </div> 

      </div>
@endsection