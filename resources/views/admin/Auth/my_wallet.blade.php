@extends('admin.layouts.main')

@section('content')
<div class="right_part">
    <h3 class="pageTitlw">Wallet Management </h3>

    <div class="money_table">
       <div class="text-end mb-3">
        <a class="common_btn" href="#url" data-bs-toggle="modal" data-bs-target="#exampleModal">add money</a>
      </div>
        <table class="table">
          <thead>
            <tr>
            <th>Serial No.</th>
            <th>Name</th>
            <th>Amount</th>
            <th>Descriptions</th>
            <th>Transaction Type</th>
            <th>Date</th>
            <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>1</td>
              <td>Rahaman</td>
              <td>200</td>
              <td>paid Amount</td>
              <td>324234ewrewr</td>
              <td>20/08/2024</td>
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
            <tr>
              <td>1</td>
              <td>Rahaman</td>
              <td>200</td>
              <td>paid Amount</td>
              <td>324234ewrewr</td>
              <td>20/08/2024</td>
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
            <tr>
              <td>1</td>
              <td>Rahaman</td>
              <td>200</td>
              <td>paid Amount</td>
              <td>324234ewrewr</td>
              <td>20/08/2024</td>
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