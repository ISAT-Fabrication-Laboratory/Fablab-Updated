
@extends('layouts.userDashboard')
@section('userDashboard')
 <main id="main" class="my-5 col-md-9 ml-sm-auto col-lg-10 px-md-4 py-4">
   <div class="container">
      <div class="row justify-content-center align-items-center">
        <div class="col-sm-12 col-md-6">
          <select class="form-select mb-3" aria-label="Select">
            <option selected>Select</option>
            <option value="option1">Pending</option>
            <option value="option2">On Process</option>
            <option value="option3">Delivered</option>
          </select>
        </div>
        <div class="col-sm-12 col-md-6">
          <form class="d-flex">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-primary" type="submit">Search</button>
          </form>
        </div>
      </div>

      <div class="table-responsive">
         <table class="table table-striped">
           <thead>
             <tr>
               <th>No.</th>
               <th>Name</th>
               <th>No. of Consultations</th>
               <th>Status</th>
               <th>Action</th>
             </tr>
           </thead>
           <tbody>
            <?php $no=1; ?>
            @foreach ($consultation as $item)
                
            
            <tr>
              <td>{{$no}}</td>
              <?php $no++ ?>
              <td>{{$item->name}}</td>
              <td>{{$item->consult_count_to_user}}</td>
              <td>pending</td>
              <td><a href="" class="btn btn-primary">View</a></td>
            </tr>
            @endforeach
           </tbody>
         </table>
    </div>

    
   
   
       @endsection
 </main> 

