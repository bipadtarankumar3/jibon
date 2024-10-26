@extends('admin.layouts.main')

@section('content')

<div class="right_part">
    <h3 class="pageTitlw">Set Transation</h3>

    <form class="common_form mb-5">
      <div class="row gy-3 align-items-end">
        <div class="col-6">
          <label>Select Borrowers </label>
         <select class="form-select">
          <option>Bangalbari A</option>
          <option>Guthin A</option>
         </select>
        </div>
        <div class="col-6">
          <label>Total Loan No.</label>
           <input type="number" class="form-control">
        </div>

        <div class="col-3">
          <label>Start Date</label>
           <input type="date" class="form-control">
        </div>

        
        <div class="col-3">
          <label>End Date</label>
           <input type="date" class="form-control">
        </div>

        <div class="col-3">
          <label>Loan No.</label>
           <input type="number" class="form-control">
        </div>

        <div class="col-3">
          <label>Amount</label>
           <input type="number" class="form-control">
        </div>

        <div class="col-3">
          <label>Final Paid Date</label>
           <input type="date" class="form-control">
        </div>
        <div class="col-3">
          <a href="#url" class="addbtn">Add</a>
        </div>

        <div class="col-12 text-center">
          <input type="submit" value="Save" class="btn btn-primary">
        </div>
      </div>
    
    </form>
  

      </div>

@endsection