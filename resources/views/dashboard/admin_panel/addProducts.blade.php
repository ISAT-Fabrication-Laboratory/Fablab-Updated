@extends('layouts.adminDashboard')
  
@section('admincontent')

<main class="col-md-9 ml-sm-auto col-lg-10 px-md-4 py-4">
    <form method="post" enctype="multipart/form-data action="{{ url('/addProducts') }}">
        @csrf
        <!--add button-->
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addProductModal">
            Add Products
        </button>
        <!--end add button-->

        <div class="table-responsive">
          <table class="table table-striped text-center table-hover margin-tb">
              <thead>
                  <tr>
                      <th scope="col">No.</th>
                      <th scope="col">Image</th>
                      <th scope="col">Name</th>
                      <th scope="col">Description</th>
                      <th scope="col">Type</th>
                      <th scope="col">Actions</th>
                  </tr>
              </thead>
              <tbody>
                  <?php $no = 1; ?>
                  @foreach($offers as $item)  
                  <tr>
                      <th scope="row margin-tb">{{ $no }}</th>
                      <?php $no++; ?>
                      <td><img class="h-auto border border-dark" src="{{asset($item->images)}}" style="max-width: 120px;"></td>
                      <td>{{ $item->name }}</td>
                      <td>{{ $item->description }}</td>
                      <td>{{ $item->type }}</td>
                      <td>
                          <div class="d-flex justify-content-evenly p-2" method="POST"> 
                              <a href="#" class="btn btn-success btn-sm me-2" data-bs-toggle="modal" data-bs-target="#viewModal">View</a>
                              <a href="#" class="btn btn-warning btn-sm me-2" data-bs-toggle="modal" data-bs-target="#updateModal{{ $item->id }}">Update</a>
                              <a href="{{url('/deleteOffer/'.$item->id)}}" class="btn btn-danger btn-sm">Delete</a>
                          </div>                                                                                 
                      </td>
                  </tr>
                          <!--Edit Product Modal-->
        <div class="modal fade" id="updateModal{{ $item->id }}" tabindex="-1" aria-labelledby="updateModal{{ $item->id }}" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="updateModal">Update Details</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                  <form action="{{ url('update/'. $item->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ $item->name }}">
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control" id="description" name="description">{{ $item->description }}</textarea>
                    </div>
                    <div class="mb-3">
                      <label for="type" class="form-label">Type</label>
                      <select class="form-select" id="type" name="type" aria-label="Default select example">
                          <option selected>Select Product Type</option>
                          <option value="1">Services</option>
                          <option value="2">Training</option>                        
                      </select>
                    </div>
                    <div class="mb-3">
                      <label for="images" class="form-label">Image</label>
                      <input type="file" name="images" id="images">
                  </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>  
                  </form>

                </div>
              </div>
            </div>
          </div>
        <!--End Edit Product Modal-->
                  @endforeach
              </tbody>
          </table>
      </div>
      

        <!-- Pagination -->
        {{$offers->links()}}


        <!--View Product Modal-->
        <div class="modal fade" id="viewModal" tabindex="-1" aria-labelledby="viewModal" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered ">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="viewModalLabel">View Details</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
              </div>
            </div>
          </div>
        <!--End View Product Modal-->

        <!--Add Products Modal-->
            <div class="modal fade" id="addProductModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Add Product</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form method="POST" enctype="multipart/form-data" action="{{ url('/addProducts') }}" ">
                                    @csrf
                                    <div class="mb-3">              
                                        <label for="name" class="form-label">Name</label>
                                        <input type="text" class="form-control" id="add_name" name="name">
                                    </div>
                                    <div class="mb-3">
                                        <label for="description" class="form-label">Description</label>
                                        <input type="text" class="form-control" id="description" name="description">
                                    </div>
                                    <div class="mb-3">
                                        <label for="images" class="form-label">Image</label>
                                        <input type="file" class="form-control" id="images" name="images">
                                    </div>
                                    <div class="mb-3">
                                        <label for="type" class="form-label">Role</label>
                                        <select class="form-select" id="type" name="type" aria-label="Default select example">
                                            <option selected>Select Product Role</option>
                                            <option value="services">Services</option>
                                            <option value="training">Training</option>                        
                                        </select>
                                    </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Add Product</button>
                                    </div>
                            </form>
                        </div>
                    </div>
                </div>

    </form>
</main>


<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>

@endsection