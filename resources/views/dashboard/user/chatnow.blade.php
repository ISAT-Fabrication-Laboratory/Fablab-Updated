@extends('dashboard.user.userchat')
@section('chatnow')
<div class="chatnow col-md-12 me-3 g-0 ms-1 mt-1">
    <div class="d-flex justify-content-start border-bottom border-secondary p-2">
        <div class="col-md-1 me-2 ">
            <img src="{{ asset('storage/userpictures/'. $userpicture) }}" class="profile-size profile-sm img-fluid rounded-circle">
        </div>
        <p class="text-white m-0 usernamestyle align-self-center">{{ $usersname }} @if($userrole == "1")
            <?php echo "(Admin)" ?>
            @endif</p>
    </div>
    <div class="messagescell m-auto mb-2 rounded px-2 py-2" id="chats">
    </div>
    <div class="d-flex justify-content-around align-items-end border-top border-secondary pt-2">
        <!-- Send picture -->
        <form id="picture-form" method="POST" enctype="multipart/form-data" class="align-self-center">
            @csrf
            <input type="hidden" name="sender_id" id="sender_id" value="{{ session('id')}}" />
            <input type="hidden" name="receiver_id" id="receiver_id" value="{{ $admin_id }}" />
            <input type="hidden" name="sender" id="sender" value="{{ session('id')}}" />
            <input type="hidden" name="type" id="type" value="image" />
            <label for="picture" class="uploadIcon">
                <i class="multimedia fa fa-picture-o text-white align-self-center"></i>
            </label>
            <input type="file" name="picture" accept="image/*" id="picture" style="display: none;" />
        </form>

        <form id="file-form-user" method="post" class="align-self-center" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="sender_id" id="sender_id" value="{{ session('id')}}" />
            <input type="hidden" name="receiver_id" id="receiver_id" value="{{ $admin_id }}" />
            <input type="hidden" name="sender" id="sender" value="{{ session('id')}}" />
            <input type="hidden" name="type" id="type" value="files" />
            <label for="files" class="uploadIcon">
                <i class="multimedia fa fa-paperclip text-white align-self-center"></i>
            </label>
            <input type="file" name="files" id="files" accept=".pdf, .doc, .docx, .xls, .xlsx, .ppt, .pptx" style="display: none;" />
        </form>
        <form method="post" id="chat-form-user">
            @csrf
            <div class="d-flex justify-content-between align-items-end">
                <input type="hidden" name="sender_id" id="sender_id" value="{{ session('id')}}" />
                <input type="hidden" name="receiver_id" id="receiver_id" value="{{ $admin_id }}" />
                <input type="hidden" name="sender" id="sender" value="{{ session('id')}}" />
                <input type="hidden" name="type" id="type" value="text" />
                <input name="data" id="data" class="form-control form-control-sm me-1 px-3" placeholder="Type a message..." style="border-radius:999999999px;">
                <button type="submit" id="send" class="btn btn-primary btn-sm bg-transparent shadow-none border-0 align-self-center"><i class="multimedia fa fa-paper-plane"></i></button>
            </div>
        </form>
    </div>
</div>
<script>
    function loadUserChat() {
        setInterval(function() {
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("chats").innerHTML = this.responseText;
                }
            };
            xhttp.open("GET", "<?php echo url('/adminchatshow') . '/' . $admin_id ?>", true);
            xhttp.send();
        }, 2000);
    }

    loadUserChat();
</script>

@endsection