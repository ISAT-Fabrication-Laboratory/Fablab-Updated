@extends('layouts.adminDashboard')
@section('admincontent')
<main class="col-md-9 ml-sm-auto col-lg-10 px-md-4 py-4">
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item "><a href="#" class="text-decoration-none p-1 mx-2 fs-4">Home</a></li>
    </ol>


  </nav>
  <div class="row my-3">
    <div class="col-12 col-md-6 col-lg-3 mb-3 mb-lg-0">
      <div class="card">
        <h5 class="card-header">Number of Users</h5>
        <div class="card-body">
          <h5 class="card-title">{{session('id')}}</h5>
        </div>
      </div>
    </div>
    <div class="col-12 col-md-6 mb-3 mb-lg-0 col-lg-3">
      <div class="card">
        <h5 class="card-header">Number of Transactions</h5>
        <div class="card-body">
          <h5 class="card-title">$2.4k</h5>
          <p class="card-text">Feb 1 - Apr 1, United States</p>
          <p class="card-text text-success">4.6% increase since last month</p>
        </div>
      </div>
    </div>
    <div class="col-12 col-md-6 mb-3 mb-lg-0 col-lg-3">
      <div class="card">
        <h5 class="card-header">Number of Services</h5>
        <div class="card-body">
          <h5 class="card-title">43</h5>
          <p class="card-text">Feb 1 - Apr 1, United States</p>
          <p class="card-text text-danger">2.6% decrease since last month</p>
        </div>
      </div>
    </div>
  </div>

  {{-- list of users --}}

  <div class="py-5" >
    <h4 class="border-bottom py-2">User Accounts</h4>
    <div>
      <table class="table table-striped">
        <thead class="">
          <tr class=>
            {{-- <th scope="col">#</th> --}}
            <th scope="col">No.</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Joined</th>
            <th scope="col">Type</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($display as $user)
        <tr>
        <td>{{ $user->id }}</td>
        <td>{{ $user->name }}</td>
        <td>{{ $user->email }}</td>
        <td>{{ $user->created_at }}</td>
        <td>
          {{$user->type==1? "admin" : ($user->type==0 ? "user":"")}}</td>
        </tr>
        @endforeach

        </tbody>
      </table>
    
    </div>
  </div>
</main>


@endsection