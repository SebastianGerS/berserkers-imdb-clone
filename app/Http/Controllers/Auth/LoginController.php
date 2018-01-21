<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\User;
use Illuminate\Http\Request;

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

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function checkIfDeactivated(Request $request) 
    {

        $user = User::where('username', '=', $request->username)->first();
        
        if ($user->role == 0) {

            $request->session()->flash('message', ['unauthorised' =>'Your userprofile has been deactivated']);
            return redirect('/');

        }

        $this->login($request);
        $request->session()->flash('message', ['success' => 'You Where Sucessfully Logged In!']);
        return redirect('/');

    }

    public function validateLogin(Request $request)
    {
        $this->validate($request, [
            $this->username() => 'required|string',
            'password' => 'required|string',
        ]);

    }

    public function credentials(Request $request)
    {
        
        return $request->only($this->username(), 'password');
    }

    public function username()
    {
        return 'username';
    }

}
