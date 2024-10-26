@extends('admin.layouts.main')
@section('content')
<div class="right_part">
    <h3 class="pageTitlw">Borrowers</h3>

    <div class="money_table">
       <div class="text-end mb-3">
        <a class="common_btn" href="{{route('admin.brrowers.create')}}">Add Borrowers</a>

      </div>
        <table class="table">
          <thead>
            <tr>
            <th>Full Name</th>
            <th>Contact Number</th>
            <th>Date</th>
            <th>Loan Amount</th>
            <th>Market</th>
            <th>Status</th>
            
            <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>Farhn</td>
               
            <td>879002134</td>
              <td>20/08/2024</td>
              <td>1222</td>
              <td>cloth</td>
              <td>active</td>
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
@endsection