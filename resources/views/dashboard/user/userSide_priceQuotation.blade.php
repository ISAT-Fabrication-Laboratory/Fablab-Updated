
@extends('layouts.userDashboard')
@section('userDashboard')
 <main id="main" class="my-5 col-md-9 ml-sm-auto col-lg-10 px-md-4 py-4">

    <div class="container">

        <h1 class="bg-secondary text-light">Price Quotation</h1>
      
        <div class="table-responsive">
          <table class="table table-striped">
            <thead>
              <tr>
                <th>No.</th>
                <th>Item Name</th>
                <th>Scope of Works</th>
                <th>Quantity</th>
                <th>Unit</th>
                <th>Unit Price</th>
                <th>Total Price</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <th scope="row">1</th>
                <td>Plaque</td>
                <td>The Plaque should be made in Wood</td>
                <td>10 pieces</td>
                <td>1</td>
                <td>50</td>
                <td>500</td>
              </tr>               
            </tbody>
          </table>
        </div>
      
        <div class="d-flex justify-content-end">
            <button class="btn btn-primary me-2">Accept</button>
            <button class="btn btn-danger">Reject</button>
          </div>
          
      
      </div>
      
      
       @endsection
 </main> 

