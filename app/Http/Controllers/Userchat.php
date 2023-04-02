<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\Storage;
use App\Models\User;
use App\Models\ChatModel;
use Illuminate\Session\SessionManager; //You can load it in the Kernel or here yow men
use Illuminate\Routing\Controller as BaseController;

class UserChat extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    // Property to hold the Users instance
    protected $users;
    protected $session;
    protected $chat;

    public function __construct(User $users, SessionManager $session, ChatModel $chat) //use this to access the model or session to all functions and you do not need to load it every time oh yeah $model= user::all(); ewwsss
    {
        $this->users = $users;
        $this->session = $session;
        $this->chat = $chat;
    }

    public function home()
    {
        return view('userview.userhome');
    }
    public function userchat()
    {
        return view('dashboard.user.userchat');
    }
    public function messages()
    {
        $users = $this->users->get();
        foreach ($users as $user) {
            $message = $this->chat
                ->where('user_id', $this->session->get('id'))
                ->where('admin_id', $user->id)
                ->latest()
                ->first();
            if ($message) {
                if ($message->type == "text") {
                    $profile = asset('storage/userpictures/' . $user->picture);
                    echo '<div class="d-flex justify-content-start mb-2">
                    <div class="col-md-1 me-3 align-self-center">
                    <img src="' . $profile . '"class="ms-1 profile-size profile-sm img-fluid rounded-circle">
                    </div>
                    <div class="mes-pic align-items-center d-flex flex-direction: row">
                    <a href="' . url("/chatadminnow/{$user->id}") . '" class="name-message text-white m-0 text-decoration-none" id="chatnow">' . $user->name . '</a>
                    ';
                    if ($message->sender === $this->session->get('id')) {
                        echo '<p class="text-message text-white m-0">You: ' . $message->data . '</p>
                        </div>
                        </div>';
                    } else {
                        echo '<p class="text-message text-white m-0">' . $user->name . ': ' . $message->data . '</p>
                        </div>
                        </div>';
                    }
                } else if ($message->type == "image") {
                    $profile = asset('storage/userpictures/' . $user->picture);
                    echo '<div class="d-flex justify-content-start align-items-center mb-2">
                    <div class="col-md-1 me-3 align-self-center">
                    <img src="' . $profile . '"class="ms-1 profile-size profile-sm img-fluid rounded-circle">
                    </div>
                    <div class="align-self-center align-items-center d-flex flex-direction: row">';
                    if ($message->sender === $this->session->get('id')) {
                        echo '
                        <a href="' . url("/chatadminnow/{$user->id}") . '" class="name-message text-white m-0 text-decoration-none" id="chatnow">' . $user->name . '</a>
                    <p class="image-message text-white m-0">You sent a photo</p>
                    </div>
                    </div>';
                    } else {
                        echo '
                        <a href="' . url("/chatadminnow/{$user->id}") . '" class="name-message text-white m-0 text-decoration-none" id="chatnow">' . $user->name . '</a>
                        <p class="image-message text-white m-0">' . $user->name . ' ' . 'sent a photo</p>
                        </div>
                        </div>';
                    }
                } else if ($message->type == "files") {
                    $profile = asset('storage/userpictures/' . $user->picture);
                    echo '<div class="d-flex justify-content-start align-items-center mb-2">
                    <div class="col-md-1 me-3 align-self-center">
                    <img src="' . $profile . '"class="ms-1 profile-size profile-sm img-fluid rounded-circle">
                    </div>
                    <div class="align-self-center align-items-center d-flex flex-direction: row">';
                    if ($message->sender === $this->session->get('id')) {
                        echo '
                        <a href="' . url("/chatadminnow/{$user->id}") . '" class="name-message text-white m-0 text-decoration-none" id="chatnow">' . $user->name . '</a>
                    <p class="image-message text-white m-0">You sent a file</p>
                    </div>
                    </div>';
                    } else {
                        echo '
                        <a href="' . url("/chatadminnow/{$user->id}") . '" class="name-message text-white m-0 text-decoration-none" id="chatnow">' . $user->name . '</a>
                        <p class="image-message text-white m-0">' . $user->name . ' ' . 'sent a file</p>
                        </div>
                        </div>';
                    }
                }
            }
        }
    }
    public function chatnow($id)
    {
        // user::all();
        // $session_id= $this->session->get('id');
        // $data['show']=$this->users->getChatHistory($session_id);
        $user = $this->users->where('id', $id)->first();
        $user_name = $user->name;
        $user_role = $user->type;
        $user_picture = $user->picture;
        return view('dashboard.user.chatnow')->with('admin_id', $id)->with('usersname', $user_name)->with('userrole', $user_role)->with('userpicture', $user_picture);
        $this->adminchatshow($id);
    }
    public function admins()
    {
        $users = $this->users->where('type', '1')->get();
        foreach ($users as $user) :
            $imgdir = asset('storage/userpictures/' . $user->picture);
            echo '<div class="d-flex justify-content-start mt-2 align-items-center"><div class="col-md-1 me-2 "><img src="' . $imgdir . '" class="ms-1 profile-size profile-sm img-fluid rounded-circle"/></div>
            <a class="usernamestyle text-white m-0 text-decoration-none" href="' . url("/chatadminnow/{$user->id}") . '" id="chatnow">
                ' . $user->name . '
            </a>
            </div>';
        endforeach;
    }
    public function adminchatshow($id)
    {
        $chats = $this->chat->where('admin_id', $id)->where('user_id', $this->session->get('id'))->get();
        $admin = $this->users->where('id', $id)->first();
        // echo '<p class="text-white">' . $profile_pic . '</p>';
        foreach ($chats as $chat) :
            if ($chat->type === 'text') {
                if ($chat->sender === $this->session->get('id')) {
                    $profile = asset('storage/userpictures/' . $this->session->get('picture'));
                    echo '<div class="d-flex justify-content-end"><div class="messages d-flex justify-content-start bg-primary text-white col-md-5 mb-3 p-2 rounded"><p class="usernamestyle text-white m-0 align-self-center">' . $chat->data . '</p></div><div class="col-md-1 me-2"><img src="' . $profile . '"class="ms-1 profile-size profile-sm img-fluid rounded-circle"></div></div>';
                } else {
                    $profiles = asset('storage/userpictures/'  . $admin->picture);
                    echo '<div class="d-flex justify-content-start"><div class="col-md-1 me-2"><img src="' . $profiles . '"class="ms-1 profile-size profile-sm img-fluid rounded-circle"></div><div class="messages d-flex justify-content-start bg-secondary text-white col-md-5 mb-3 p-2 rounded"><p class="usernamestyle text-white m-0 align-self-center">' . $chat->data . '</p></div></div>';
                }
            } else if ($chat->type === 'image') {
                if ($chat->sender === $this->session->get('id')) {
                    $profile = asset('storage/userpictures/' . $this->session->get('picture'));
                    $imgdir = asset('storage/chatimages/' . $chat->data);
                    echo '<div class="d-flex justify-content-end"><div class="d-flex justify-content-start text-white col-md-5 mb-3 rounded"><img src="' . $imgdir . '" class="img-fluid respondent-img-sm"></div><div class="col-md-1 me-2"><img src="' . $profile . '"class="ms-1 profile-size profile-sm img-fluid rounded-circle"></div></div>';
                } else {
                    $profile_pic = asset('storage/userpictures/' . $admin->picture);
                    $imgdir = asset('storage/chatimages/'  .  $chat->data);
                    echo '<div class="d-flex justify-content-start">
                    <div class="col-md-1 me-2">
                    <img src="' . $profile_pic . '"class="ms-1 profile-size profile-sm img-fluid rounded-circle">
                    </div>
                    <div class="d-flex justify-content-start text-white col-md-5 mb-3 rounded">
                    <img src="' . $imgdir . '" class="img-fluid respondent-img-sm">
                    </div>
                    </div>';
                }
            } else if ($chat->type === 'files') {
                if ($chat->sender === $this->session->get('id')) {
                    $profile = asset('storage/userpictures/' . $this->session->get('picture'));
                    $file_url = asset('storage/filesupload/' .  $chat->data);
                    echo '<div class="d-flex justify-content-end"><div class="messages d-flex justify-content-start bg-secondary text-white col-md-5 mb-3 p-2 rounded"><i class="file-style fa fa-file rounded-circle border p-1 me-2"></i><a href="' .  $file_url . '"class="usernamestyle text-white m-0 align-self-center" download>' . $chat->data . '</a> </div><div class="col-md-1 me-2"><img src="' . $profile . '"class="ms-1 profile-size profile-sm img-fluid rounded-circle"></div></div>';
                } else {
                    $profile = asset('storage/userpictures/' .   $admin->picture);
                    $file_url = asset('storage/filesupload/' .  $chat->data);
                    echo '<div class="d-flex justify-content-start"><div class="col-md-1 me-2"><img src="' . $profile . '"class="ms-1 profile-size profile-sm img-fluid rounded-circle"></div><div class="messages d-flex justify-content-start bg-secondary text-white col-md-5 mb-3 p-2 rounded"><i class="file-style fa fa-file rounded-circle border p-1 me-2"></i><a href="' .  $file_url . '"class="usernamestyle text-white m-0 align-self-center" download>' . $chat->data . '</a> </div></div>';
                }
            }
        endforeach;
    }
    public function sendmessage(Request $request)
    {
        $this->chat->create([
            'data' => $request->input('data'),
            'type' => $request->input('type'),
            'admin_id' => $request->input('receiver_id'),
            'user_id' => $request->input('sender_id'),
            'sender' => $request->input('sender'),
        ]);
        // return response()->json([
        //     'success' => true,
        //     'message' => 'Message saved successfully',
        // ]);
    }
    public function sendmultimedia(Request $request)
    {
        $file = $request->file('picture');
        $image_name = uniqid() . '.' . $file->extension();
        $insert = $this->chat->create([
            'data' => $image_name,
            'type' => $request->input('type'),
            'admin_id' => $request->input('receiver_id'),
            'user_id' => $request->input('sender_id'),
            'sender' => $request->input('sender'),
        ]);
        // $data = [
        //     'data' => $image_name,
        //     'type' => $request->input('type'),
        //     'admin_id' => $request->input('receiver_id'),
        //     'user_id' => $request->input('sender_id'),
        //     'sender' => $request->input('sender'),
        // ];

        // $this->chat->create($data);
        // user::create($data);    
        if ($insert) {
            $file->storeAs('public/chatimages', $image_name);
        }
    }
    public function sendfiles(Request $request)
    {
        $file = $request->file('files');
        $file_name = $file->getClientOriginalName();
        $insert = $this->chat->create([
            'data' => $file_name,
            'type' => $request->input('type'),
            'admin_id' => $request->input('receiver_id'),
            'user_id' => $request->input('sender_id'),
            'sender' => $request->input('sender'),
        ]);
        if ($insert) {
            $file->storeAs('public/filesupload', $file_name);
        }
    }
}
