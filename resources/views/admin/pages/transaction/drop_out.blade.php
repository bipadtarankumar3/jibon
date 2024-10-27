@extends('admin.layouts.main')
@section('content')
<div class="right_part">
    <h3 class="pageTitlw">Drop Out Customer</h3>


    <div class="money_table">
       <div class="mb-3">
        <a href="#url" class="common_btn">Copy</a>
        <a href="#url" class="common_btn">CSV</a>
        <a href="#url" class="common_btn">PDF</a>
        <a href="#url" class="common_btn">Print</a>
      </div>
      <div class="responsive-table">
        <table class="table" id="zero_config">
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
            <th>Action</th>
            
            </tr>
          </thead>
          <tbody>
            @foreach ($drop_out as $key => $item)
                
            
            <tr>
              <td>{{ $key+1 }}</td>
              <td>{{ $item->loan_unique_id }}</td>
               
            <td>{{ $item->user->first_name ?? 'N/A' }} {{ $item->user->last_name ?? '' }}</td>
            <td>{{$item->user->contact_numbe}}</td>
            <td>{{$item->total_amount}}</td>
            <td>{{$item->total_amount/$item->loan_terms}}</td>
            <td>{{$item->total_amount-$item->principle_amount}}</td>
            <td>0</td>
              <td><span class="paid">{{$item->itemd}}</span></td>
              <td>{{$item->market->market_name}}</td>
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
            
          </tbody>
        </table>
      </div>
      </div> 

      </div>
@endsection