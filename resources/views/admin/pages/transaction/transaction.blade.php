@extends('admin.layouts.main')

@section('content')

<div class="right_part">
    <h3 class="pageTitlw">transactions</h3>

    <form class="common_form mb-5" style="max-width: 500px;
  margin: 0 auto;">
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
        <form action="{{ route('admin.transactions.store') }}" method="POST">
          @csrf
          <table class="table" id="zero_config">
              <thead>
                  <tr>
                      <th>Loan ID</th>
                      <th>Name</th>
                      <th>Total Amount</th>
                      <th>EMI</th>
                      <th>Due</th>
                      <th>Status</th>
                      <th>#</th>
                      <th>Amount</th>
                  </tr>
              </thead>
              <tbody>
                  @php
                      $grandTotalAmount = 0;
                      $grandEmiAmount = 0;
                      $grandRemainingAmount = 0;
                  @endphp
      
                  @foreach ($emi as $key => $item)
                      @php
                          $grandTotalAmount += $item->total_amount;
                          $grandEmiAmount += $item->emi_amount;
                          $grandRemainingAmount += $item->remaining_amount;
                      @endphp
                      <tr>
                          <td>{{ $item->loan_unique_id }}</td>
                          <td>{{ $item->first_name }}</td>
                          <td>{{ $item->total_amount }}</td>
                          <td>{{ $item->emi_amount }}</td>
                          <td>{{ $item->remaining_amount }}</td>
                          <td><span class="dua">Due</span></td>
                          <td>
                              <input type="checkbox" name="selected[{{ $key }}]" class="toggle-disable">
                              <input type="hidden" name="emi_id[{{ $key }}]" value="{{ $item->id }}">
                          </td>
                          <td>
                              <input type="number" name="amount[{{ $key }}]" disabled class="numberField">
                          </td>
                      </tr>
                  @endforeach
      
                  <!-- Grand Total Row -->
                  <tr>
                      <td colspan="2"><strong>Grand Total:</strong></td>
                      <td><strong>{{ $grandTotalAmount }}</strong></td>
                      <td><strong>{{ $grandEmiAmount }}</strong></td>
                      <td><strong>{{ $grandRemainingAmount }}</strong></td>
                      <td colspan="3"></td>
                  </tr>
      
                  <!-- Submit Button Row -->
                  <tr>
                      <td colspan="8" style="text-align: right;">
                          <button type="submit" class="btn btn-primary">Submit</button>
                      </td>
                  </tr>
              </tbody>
          </table>
      </form>
      
       
      </div> 

      </div>

@endsection

@section('js')
<script>
 document.addEventListener("DOMContentLoaded", function() {
    document.querySelectorAll('.toggle-disable').forEach(checkbox => {
        checkbox.addEventListener('change', function() {
            const numberField = this.closest('tr').querySelector('.numberField');
            numberField.disabled = !this.checked;
        });
    });
});


</script>
@endsection