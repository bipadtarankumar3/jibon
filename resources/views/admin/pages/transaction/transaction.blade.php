@extends('admin.layouts.main')

@section('content')

<div class="right_part">
    <h3 class="pageTitlw">transactions</h3>

    <form class="common_form mb-5" style="max-width: 500px;
  margin: 0 auto;">
      <div class="row gy-3">
        <div class="col-12">
         <select class="form-select">
          <option>Bangalbari A</option>
          <option>Guthin A</option>
         </select>
        </div>
        <div class="col-12 text-center">
          <input type="submit" value="Search" class="btn btn-primary">
        </div>
      </div>
    
    </form>
    <div class="money_table">
    
        <table class="table">
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
            <tr>
              <td>76</td>
               
            <td>farhn</td>
              <td>1222</td>
              <td>20/08/2024</td>
              <td>20/08/2024</td>
          
              <td><span class="dua">Due</span> <span class="paid">Paid</span></td>
             <td><input type="checkbox" class="disabled_field"></td>
              <td>
                <input type="number" disabled class="numberField">
              </td>
             
            </tr>
            <tr> 
              <td>76</td>
               
            <td>farhn</td>
              <td>1222</td>
              <td>20/08/2024</td>
              <td>20/08/2024</td>
          
              <td><span class="dua">Due</span> <span class="paid">Paid</span></td>
             <td><input type="checkbox" class="disabled_field"></td>
              <td>
                <input type="number" disabled class="numberField">
              </td>
             
            </tr>
            
          </tbody>
        </table>
      </div> 

      </div>

@endsection