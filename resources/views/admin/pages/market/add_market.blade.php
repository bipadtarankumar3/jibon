@extends('admin.layouts.main')

@section('content')
<div class="right_part">
    <h3 class="pageTitlw">market</h3>

    <div class="money_table">
       <div class="text-end mb-3">
        <a class="common_btn" href="#url" data-bs-toggle="modal" data-bs-target="#createMarketModal">Add Market</a>

      </div>
        <table class="table">
          <thead>
            <tr>
            <th>Serial No.</th>
            <th>Market Nmae</th>
            
            <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>1</td>
               
            
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