<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\User;
use Illuminate\Support\Facades\Hash;

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

	public function showLoginForm(){
		return view('pages.login.login');
	}
    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

	public function login(Request $request)
    {
        // Check validation
        $this->validate($request, [
            'phone_number' => 'required|regex:/[0-9]{11}/|digits:11',
        ]);

        // Get user record
        $user = User::where('phone_number', $request->get('phone_number'))->first();
		if (!empty($user)) {
			if (Hash::check($request->get('password'), $user->password)) {
		        \Auth::login($user);
		        return redirect()->route('home');
			}else{
				return redirect()->back()->with('error_msg', 'Password does not match');
			}
		}else{
			return redirect()->back()->with('error_msg', 'Phone number not found');
		}


    }


}
