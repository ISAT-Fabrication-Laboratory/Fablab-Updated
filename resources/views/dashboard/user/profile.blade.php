
   @extends('layouts.userDashboard')
   @section('userDashboard')
    <main id="main" class="my-5 col-md-9 ml-sm-auto col-lg-10 px-md-4 py-4">


        <div class="col-md-15 ">
          <div class="card">
            <div class="card-header">
              <h5 class="card-title">Dashboard</h5>
            </div>
            <div class="card-body ">
              <h6 class="card-subtitle mb-2 text-muted">Welcome to your dashboard, {{ session('name')}}!</h6>
              <div class="row">
                <div class="col-md-6" >
                  <div class="card" >
                    <div class="card-header">
                      <h6 class="card-subtitle mb-2 text-muted">Pending Consultation (s)</h6>
                    </div>
                    
                    
                    <div class="card-body"> 
                      
                      <p>You currently have <span class="bg-danger p-1 rounded pill text-light"> {{ $countConsult }}</span> pending consultation(s).</p>
                      
                      <a href="{{ url('/userside_pendingconsultation') }}" class="card-link">View consultation(s)</a>
                    </div>                  
                  </div>
                  
                </div>
                <div class="col-md-6">
                  <div class="card">
                    <div class="card-header">
                      <h6 class="card-subtitle mb-2 text-muted">My Profile</h6>
                    </div>
                    <div class="card-body">
                      <p>Name: {{ session('name')}}</p>
                      <p>Email: {{ session('email')}}</p>
                      <p>Phone: {{ session('contact_number')}}</p>
                      <a href="#" class="card-link" data-bs-toggle="modal" data-bs-target="#exampleModal">Edit profile</a>
                      
                    </div>
                  </div>
                </div>
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Profile</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        <form>
                          <div class="mb-3">              
                              <label for="" class="form-label">Name</label>
                              <input type="text" class="form-control" id="edit_name">
                          </div>
                          <div class="mb-3">
                            <label for="" class="form-label">Email</label>
                            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                          </div>
                          <div class="mb-3">
                            <label for="" class="form-label">Phone</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                          </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
          @endsection
    </main> 

