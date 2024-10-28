
@extends('admin.layouts.main')

@section('content')




<div class="right_part">
    <h3 class="pageTitlw">Loans</h3>

    <form class="common_form mb-5" style="max-width: 500px;margin: 0 auto;" method="GET">
      <div class="row gy-3">
        <div class="col-12">
         <select class="form-select" name="market" >
          <option>Select Market</option>

          @foreach($markets as $market)
            <option value="{{$market->id}}" @if (isset($_GET['market']) && $_GET['market'] == $market->id) selected @endif>{{$market->market_name}}</option>
          @endforeach

         </select>
        </div>
        <div class="col-12 text-center">
          <input type="submit" value="Search" class="btn btn-primary">
        </div>
      </div>
    
    </form>
    <div class="money_table">
    
        <table class="table" id="zero_config">
            <thead>
                <tr>
                    <th>Loan ID</th>
                    <th>Name</th>
                    <th>Loan Amount</th>
                    <th>Loan Type</th>
                    <th>Date Started</th>
                    <th>Maturity Date</th>
                    <th>Market</th>
                    <th>Total Amount</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($loanDetails as $loanDetail)
                    <tr>
                        <td>{{ $loanDetail->loan_unique_id }}</td>
                        <td>{{ $loanDetail->user->first_name ?? 'N/A' }} {{ $loanDetail->user->last_name ?? '' }}</td>
                        <td>{{ $loanDetail->total_amount ?? 'N/A' }}</td>
                        <td>{{ $loanDetail->loan_type->type_name ?? 'N/A' }}</td>
                        <td>{{ $loanDetail->created_at->format('d/m/Y') }}</td>
                        <td>{{ $loanDetail->maturity_date }}</td>
                        
                        <td>{{ $loanDetail->market->market_name ?? 'N/A' }}</td>
                        <td>{{ $loanDetail->total_amount ?? 'N/A' }}</td>
                        <td>{{ $loanDetail->status ?? 'N/A' }}</td>
                        <td>
                            <ul class="actn">
                                <li><a href="#"><span class="material-symbols-outlined">edit</span></a></li>
                                <li>
                                    <a href="#" 
                                       onclick="event.preventDefault(); document.getElementById('delete-form-{{ $loanDetail->id }}').submit();">
                                       <span class="material-symbols-outlined">delete</span>
                                    </a>
                                </li>
                                <form id="delete-form-{{ $loanDetail->id }}" action="#" method="POST" style="display: none;">
                                    @csrf
                                    @method('DELETE')
                                </form>
                            </ul>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
      </div> 

      </div>
      @endsection





