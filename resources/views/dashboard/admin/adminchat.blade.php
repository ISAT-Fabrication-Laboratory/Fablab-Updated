@extends('layouts.adminDashboard')
@section('admincontent')
<div class="chat-panel col-md-4 m-auto shadow rounded px-3 py-2 bg-dark mt-2">
    <div class="row m-auto underline">
        <div class="d-flex justify-content-start align-items-center">
            <div class="col-md-1 me-2">
                <img src="{{ asset('storage/userpictures/'.session('picture')) }}" class="profile-size profile-sm img-fluid rounded-circle">
            </div>
            <div>
                <p class="name text-white h5 m-0">{{ session('name')}}</p>
                <p class="roles text-white m-0">
                    @if(session('type') == "1")
                    <?php echo 'Admin'; ?>
                    @endif
                </p>
            </div>
        </div>
    </div>
    <div class="dropdown-divider bg-white mx-2"></div>
    <div class="row m-auto">
        <div class="chat-body col-md-12 m-auto">
            <div class="buttons-sm row m-auto g-0">
                <div class="col-6">
                    <div class="row m-auto">
                        <button id="messages" class="btn btn-outline-light btn-sm shadow-none">Messages</button>
                    </div>
                </div>
                <div class="col-6">
                    <div class="row m-auto">
                        <button id="customer" class="btn btn-outline-light btn-sm shadow-none">Customer</button>
                    </div>
                </div>
            </div>
            <!-- chats -->
            <div class="row m-auto mt-2">
                <div class="messages col-md-12 me-3">
                    <p class="text-white">Messages</p>
                    <div id="messagesadmin"></div>
                </div>
                <div class="customers col-md-12 me-3">
                    <p class="nuisance text-white m-0">Customer</p>
                    <div id="customershow"></div>
                </div>
                @yield('chatnowadmin');
            </div>
        </div>
    </div>
</div>
@endsection