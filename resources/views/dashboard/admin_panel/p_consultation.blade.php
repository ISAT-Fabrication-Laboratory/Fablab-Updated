@extends('layouts.adminDashboard')
@section('admincontent')

  <style>
    @media (max-width: 767px) {
  .input-group {
    flex-wrap: wrap;
  }
  .input-group > * {
    flex-basis: 100%;
  }
  .input-group .form-control {
    margin-bottom: 10px;
  }
}
  </style>

<main class="col-md-9 ml-sm-auto col-lg-10 px-md-4 py-4">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active my-3 px-3" aria-current="page">Pending Consultation</li>
        </ol>


    </nav>
    
    <div class="list-group">
      <form>
        <div class="row mt-5">
          <div class="col-md-6 ">
            <div class="input-group mb-3">
              <input type="text" class="form-control" placeholder="Search...">
              <button class="btn btn-outline-secondary" type="button">Search</button>
            </div>
          </div>
          <div class="col-md-6">
            <div class="input-group mb-3">
              <label class="input-group-text" for="filter-select">Filter By</label>
              <select class="form-select" id="filter-select">
                <option value="">Select Option</option>
                <option value="option1">Option 1</option>
                <option value="option2">Option 2</option>
                <option value="option3">Option 3</option>
              </select>
            </div>
          </div>
        </div>
        <div class="py-0" >
          <table class="table table-striped" >
            <thead class="">
              <tr ><a>
                {{-- <th scope="col">#</th> --}}
                <th scope="col">No.</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">No. of Consultations</th>
                <th scope="col">Action</th></a>
              </tr>
            </thead>
            <tbody>
              <?php $no=1; ?>
              @foreach ($show_pending as $user)
             
            <tr>
              <td> {{$no}}. </td>
              <?php $no++ ?>
              <td> {{$user->name }} </td>
              <td> {{ $user->email }} </td>
              <td> {{ $user->consult_count }} </td>
              {{-- <td ><span class="bg-danger p-1 rounded pill text-light"> pending</span> </td> --}}

            <td>
            <button class="border-0 bg-transparent" data-toggle="tooltip" data-bs-placement="bottom"  title="Delete Consultation"><a href=""><i class="fa fa-trash" style="font-size:20px;color:red;"></i></a></button>
            <span class="border-0 bg-transparent"  data-toggle="tooltip" data-bs-placement="bottom"  title="View Consultation"><a href="{{url('/view_pendingconsultation/'.$user->id)}}"><i class="fa fa-eye px-3" style="font-size:20px;color:blue;"></i></a></span>
            <button class="border-0 bg-transparent"  data-toggle="tooltip" data-bs-placement="bottom"  title="Approve Constultation"><a href=""><i class="fa fa-check" style="font-size:20px;color: green;"></i></a></button>
            </td>   
            </tr>  
            @endforeach    
            </tbody>
          </table>       
        </div>
      </div>
      </form>
      </div>
      
</main>
@endsection