@extends('admin.layouts.main')

@section('content')
<div class="right_part">
    <h3 class="pageTitlw">Print</h3>

    <form class="common_form mb-5">
      <div class="row gy-4">
      <div class="col-12">
       <label>Market :</label>
       <select class="form-select">
        <option value="Bangalbari A">Bangalbari A</option>
       </select>
        </div>
        <div class="col-6">
          <label>From</label>
           <input type="date" class="form-control">
        </div>
        <div class="col-6">
          <label>To </label>
           <input type="date" class="form-control">
        </div>
        <div class="col-12 text-end"> 
   
           <input type="submit" class="btn btn-primary">
        </div>
      </div>
    </form>

    <div class="money_table">
       <div class="mb-3">
        <a href="#url" class="common_btn">Print Table</a>
      </div>
        <table class="table">
          <thead>
            <tr>
            <th>Serial No.</th>
            <th>Member Details</th>
            <th>Loan Date</th>
            <th>Loan Amount</th>
            <th>Loan Installment</th>
            <th>Due</th>
            </tr>
          </thead>
          <tbody>
            <tr>
             <td>1</td>
             <td>vdfvdf</td>
             <td>20//7/23</td>
             <td>2333</td>
             <td>0.00</td>
             <td>20//7/23</td>
            </tr>
          </tbody>
        </table>
      </div> 

      </div>
@endsection