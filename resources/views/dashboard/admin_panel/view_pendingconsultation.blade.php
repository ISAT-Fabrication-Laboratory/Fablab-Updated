@extends('layouts.adminDashboard')
@section('admincontent')

<main class="col-md-9 ml-sm-auto col-lg-10 px-md-4 py-4">
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb">
          
          <li class="breadcrumb-item ms-3 my-3" aria-current="page"><a href="{{url('dashboard/admin_panel/p_consultation')}}"> Pending Consultation</a></li>
          <li class="breadcrumb-item active my-3" aria-current="page">User Number of Transaction</li>
        </ol>
      </nav>

      <div class="container">
          <h1>{{$users->name}}</h1>
          
        
        <div class="table-responsive">
          <table class="table table-striped">
            <thead>
              <tr>
                <th>#</th>
                <th>Item Name</th>
                <th>No. of Items</th>
                <th>Date Created</th>
                <th>Action</th>
                
              </tr>
            </thead>
            <tbody>
              <form action="">
              <?php $no=1; ?>
              @foreach ($consultations as $user)
              <tr>
                <td>{{$no}}</td>              
                <?php $no++ ?>
                <td>
                  @foreach($item_name as $items_row)
                  @if($user->index_id==$items_row->index_id)
                  {{$items_row->item_name}},
                  @endif
                  @endforeach
                </td>
              
                <td>{{$user->counts}}</td>
                <td>{{ date('M d, Y', strtotime($user->created_at)) }}</td>

                <td><a href="{{url('viewConsultation/'.$users->id.'/'.$user->index_id)}}" class="btn btn-primary"> <i class="fa fa-eye"></i> View</a></td>
                
              </tr>
            </form>
              @endforeach
              
             

            </tbody>

          </table>
        </div>
      </div>
      
</main>
@endsection