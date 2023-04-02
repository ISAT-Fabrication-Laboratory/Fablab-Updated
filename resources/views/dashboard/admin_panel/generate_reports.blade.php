@extends('layouts.adminDashboard')
  
@section('admincontent')

<main class="col-md-9 ml-sm-auto col-lg-10 px-md-4 py-4">

    <div class="container">
       <form action="">
        @csrf
        <div class="row">
          <div class="col-lg-12">
            <div class=" d-flex justify-content-between">
                <div class="col mx-5">
                    <select class="form-select" aria-label="Default select example">
                        <option selected>Open this select menu</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                      </select>
                </div>
                <form action="" class="mx-2">
                    <input type="button" class="btn btn-success mx-2" value="Print">
                    <input type="button" class="btn btn-success" value="Print">
                </form>
            </div>
            <table class="table table-hover">
                
              <thead>
                <tr>
                  <th>Date</th>
                  <th>Description</th>
                  <th>Amount</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>01/01/2022</td>
                  <td>Payment from client A</td>
                  <td>$1,000.00</td>
                </tr>
                <tr>
                  <td>01/02/2022</td>
                  <td>Payment from client B</td>
                  <td>$2,000.00</td>
                </tr>
                <tr>
                  <td>01/03/2022</td>
                  <td>Payment to vendor X</td>
                  <td>-$500.00</td>
                </tr>
                <tr>
                  <td>01/04/2022</td>
                  <td>Payment from client C</td>
                  <td>$3,000.00</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
       </form>
      </div>

</main>


<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>

@endsection