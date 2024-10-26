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
      <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel">Add Money</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
      
      
              <form>
                <div class="row gy-3">
                  <div class="col-12">
                    <label>Name</label>
                    <input type="text" class="form-control" placeholder="Enter name">
                  </div>
                  <div class="col-12"> 
                    <label>Amount</label>
                    <input type="text" class="form-control" placeholder="Enter amount">
                  </div>
      
                  <div class="col-12"> 
                    <label>Description</label>
                    <textarea class="form-control"></textarea>
                  </div>
                  <div class="col-6"> 
                    <label>Payment Option</label>
                    <select class="form-select">
                      <option>Cash</option>
                    </select>
                  </div>
                  <div class="col-6"> 
                    <label>Payment Option</label>
                    <select class="form-select">
                      <option>Cash</option>
                    </select>
                  </div>
      
                  <div class="col-12 text-end"> 
                    <input type="submit" value="submit" class="btn btn-primary">
                  </div>
      
                </div>
              </form>
        
            </div>
          </div>
        </div>
      </div>
      
        
       <!-- Modal market-->
       <div class="modal fade" id="createindent" tabindex="-1" aria-labelledby="createindent" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="marketLabel">System Info</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form class="common_form">
                <div class="row gy-3">
                  <div class="col-6">
                    <label>Business Name</label>
                    <input type="text" class="form-control">
                  </div>
                  <div class="col-6">
                    <label>System Name</label>
                    <input type="text" class="form-control">
                  </div>
                  <div class="col-12">
                    <label>Address</label>
                    <input type="text" class="form-control">
                  </div>
                  <div class="col-4">
                    <label>Email Address</label>
                    <input type="text" class="form-control">
                  </div>
                  <div class="col-4">
                    <label>Contact Number</label>
                    <input type="text" class="form-control">
                  </div>
                  <div class="col-4">
                    <label>Currency</label>
                    <input type="text" class="form-control">
                  </div>
                  <div class="col-6">
                    <label>Logo 1</label>
                    <input type="file" class="form-control">
                  </div>
                  <div class="col-6"> 
                    <label>Logo 2</label>
                    <input type="file" class="form-control">
                  </div>
                  <div class="col-12 text-end"> 
                    <input type="submit" value="update" class="btn btn-primary">
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      
      <div class="modal fade" id="restore" tabindex="-1" aria-labelledby="restore" aria-hidden="true"> 
        <div class="modal-dialog modal-dialog-centered modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="marketLabel">Restore Database</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form>
                <div class="row gy-3">
                  <div class="col-12">
                    <label>Upload Sql file</label>
                    <input type="file" class="form-control">
                  </div>
                  <p>Note: pls upload sql file only.</p>
                  <div class="col-12 text-end"> 
                    <input type="submit" value="Restore" class="btn btn-primary">
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
@endsection