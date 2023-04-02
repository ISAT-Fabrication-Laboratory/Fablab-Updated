@extends('layouts.adminDashboard')
@section('admincontent')

<main class="col-md-9 ml-sm-auto col-lg-10 px-md-4 py-4">
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb">
          
          <li class="breadcrumb-item ms-3 my-3" aria-current="page"><a href="{{url('dashboard/admin_panel/p_consultation')}}"> Pending Consultation</a></li>
          <li class="breadcrumb-item active my-3" aria-current="page">User Number of Transaction</li>
          <li class="breadcrumb-item active my-3" aria-current="page">Consultations</li>
        </ol>
      </nav>

      <div class="container"></div>
        
        <div class="table-responsive">
          <table class="table table-striped">
            <thead>
              <tr>
                <th>#</th>
                <th>Item Name</th>
                <th>Description</th>
                <th>Material</th>
                <th>Quantity</th>
                <th>No. of Days</th>
                <th>Action</th>
                
              </tr>
            </thead>
            <tbody>
              <?php $no=1; ?>
              @foreach ($consultation as $item)              
              <tr>
                <td>{{$no}}</td>                           
                <?php $no++ ?>                
                <td>{{$item->item_name}}</td>
                <td>{{$item->description}}</td>
                <td>{{$item->material}}</td>
                <td>{{$item->quantity}}</td>
                <td></td>
                <td></td>
              </tr>
              @endforeach
              
              
             

            </tbody>

          </table>
        </div>
      </div>
      
</main>
@endsection