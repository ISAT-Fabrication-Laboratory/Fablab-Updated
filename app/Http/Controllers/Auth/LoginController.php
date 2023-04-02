<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Session\SessionManager;
use Illuminate\Foundation\Validation\ValidatesRequests;
use App\Models\ChatModel;
use App\Models\Offer;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    protected $users;
    protected $session;
    protected $chat;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(User $users, SessionManager $session, ChatModel $chat)
    {
        $this->middleware('guest')->except('logout');
        $this->users = $users;
        $this->session = $session;
        $this->chat = $chat;
    }

    public function login(Request $request)
    {
        if (request()->isMethod('post')) { //if it submitted through post
            $validator = Validator::make($request->all(), [
                '_token' => 'bail|required|string',
                'email' => 'required|exists:users,email',
                'password' => 'sometimes|required',
            ], [
                '_token.required' => 'A CSRF token is required.',
                'email.required' => 'Email is required to login',
                'email.exists' => 'The email does not exist',
                'password.required' => 'password is required to login',
            ]);

            // If the username is correct, validate the password
            if ($validator->passes()) {
                $validator->after(function ($validator) use ($request) {
                    $hashedPassword = $this->users->where('email', $request->input('email'))->first()->password;
                    if (!Hash::check($request->input('password'), $hashedPassword)) {
                        $validator->errors()->add('password', 'The password is incorrect.');
                    }
                });
            }

            if ($validator->fails()) {
                return redirect()->back() // return the validation to current page
                    ->withInput()
                    ->withErrors($validator);
            } else {
                // Form data is valid, do something with it
                $user = $this->users->where('email', $request->input('email'))->first();
                $this->setSession($user);
                if ((int) $user->type === 1) {
                    return redirect()->to('/adminhome');
                } else if ((int) $user->type === 0) {
                    return redirect()->to('/home');
                }
            }
        }
        return view('auth.login');
    }

    private function setSession($user)
    {
        // dd($user); // Debugging line
        $session = $this->session->put([
            'id'                => $user->id,
            'name'              => $user->name,
            'birthdate'         => $user->birthdate,
            'organization'      => $user->organization,
            'occupation'        => $user->occupation,
            'street'            => $user->street,
            'municipality'      => $user->municipality,
            'province'          => $user->province,
            'contact_number'    => $user->contact_number,
            'email'             => $user->email,
            'password'          => $user->password,
            'type'              => $user->type,
            'picture'           => $user->picture,
        ]);
    }
    public function logout()
    {
        Auth::logout();
        $this->session->flush();
        return redirect('/');
    }
}
