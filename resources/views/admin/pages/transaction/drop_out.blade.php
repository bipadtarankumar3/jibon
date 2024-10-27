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
        <table class="table">
          <thead>
            <tr>
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
            <tr>
              <td>0</td>
              <td>farhn</td>
              <td>9800213454</td>
              <td>2000</td>
              <td>100</td>
              <td>10</td>
              <td>102</td>
              <td><span class="dua">Due</span> <span class="paid">Paid</span></td>
              <td>siliguri</td>
               
              <td>
                <ul class="actn">
                  <li><a href="#url"><span class="material-symbols-outlined">
                    edit
                    </span></a></li>
                    <li><a href="#url"><span class="material-symbols-outlined">
                      delete
                      </span></a></li>
                </ul>
              </td>
          </tr>
          </tbody>
        </table>
      </div>
      </div> 

      </div>
@endsection