<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Notifications\RegisterNotification;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Session\SessionManager;

class RegisterController extends Controller
{
    protected $session;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(SessionManager $session)
    {
        $this->middleware('guest');
        $this->session = $session;
    }
    public function register(Request $request)
    {
        if (request()->isMethod('post')) {
            $validator = Validator::make(
                $request->all(),
                [
                    'name' => 'required',
                    'birthdate' => 'required',
                    'organization' => 'required',
                    'occupation' => 'required',
                    'street' => 'required',
                    'municipality' => 'required',
                    'province' => 'required',
                    'contact_number' => 'required|min:11|max:13|regex:/^([0-9\s\-\+\(\)]*)$/|unique:users,contact_number',
                    'email' => 'required|email|unique:users,email',
                    'password' => 'required|min:8',
                    'password_confirmation' => 'required|same:password',
                    '_token' => 'bail|required|string',
                    'picture'   => 'required',
                ],
                [
                    'name.required' => 'Name is required.',
                    'birthdate.required' => 'Birthdate is required',
                    'organization.required' => 'Organization is required.',
                    'occupation.required' => 'Occupation is required.',
                    'street.required' => 'Street is required.',
                    'municipality.required' => 'Municipality is required.',
                    'province.required' => 'Province is required.',
                    'contact_number.required' => 'Contact Number is required.',
                    'contact_number.min' => 'The contact number is not valid',
                    'contact_number.max' => 'The contact number is not valid',
                    'contact_number.regex' => 'The contact number is not valid',
                    'contact_number.unique' => 'The contact number is already taken',
                    'email.required' => 'Email is required',
                    'email.email' => 'email is not valid',
                    'email.unique' => 'Email is already taken',
                    'password.required' => 'password is required.',
                    'password.min' => 'The password must be at least :min characters long.',
                    'password_confirmation.required' => 'Re-enter your password',
                    'password_confirmation.same' => 'Password do not match',
                    '_token.required' => 'A CSRF token is required.',
                    'picture.required' => 'Profile is required.',
                ]
            );

            if ($validator->fails()) {
                return redirect()->back() // return the validation to current page
                    ->withInput()
                    ->withErrors($validator);
            }

            // Form data is valid, do something with it
            $file = $request->file('picture');
            $image_name = uniqid() . '.' . $file->extension();
            $user = User::create([
                'name'              => $request->input('name'),
                'birthdate'         => $request->input('birthdate'),
                'organization'      => $request->input('organization'),
                'occupation'        => $request->input('occupation'),
                'street'            => $request->input('street'),
                'municipality'      => $request->input('municipality'),
                'province'          => $request->input('province'),
                'contact_number'    => $request->input('contact_number'),
                'email'             => $request->input('email'),
                'password'          => bcrypt($request->input('password')),
                'roles'             => $request->input('type'),
                'picture'           => $image_name,
                'type'              => 0,
            ]);
            // or $user = $this->users->create($request->all()); to insert all without specifying
            if ($user) {
                // Success Redirect to the desired page with message
                $file->storeAs('public/userpictures', $image_name); //store the image
                $this->session->flash('success', 'Register Successfully');
                return redirect()->to('/register');
            } else {
                // Failed and display an appropriate message
                $this->session->flash('failed', 'Register Failed');
                return redirect()->to('/register');
            }
        }

        return view('auth.register');
    }
    public function update(Request $request, $id)
    {
        $user = user::find($id);
        $user->name = $request->input('fullName');
        $user->organization = $request->input('organization');
        $user->occupation = $request->input('job');
        $user->province = $request->input('address');
        $user->phone = $request->input('phone');
        $user->email = $request->input('email');
        $user->update();
    }
}
