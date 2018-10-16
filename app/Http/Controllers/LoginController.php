<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;

class LoginController extends Controller
{
	use AuthenticatesUsers;
	//protected $username='email';
	protected $redirectTo = '/dashboard';
	protected $guard= 'web';
    public function login()
    {
    	return view('login');
    }

    public function check_login(Request $request)
    {
    	$this->validate($request,[
    		'email'=>'required|email',
    		'password'=>'required'
    	]);

    	$auth = Auth::guard('web')->attempt([
    		'email'=>$request->email,
    		'password'=>$request->password,
    		
		]);
		if($auth)
		{
			return redirect()->route('dashboard');
		}
		//return redirect()->route('login');
		return redirect()->back()
             ->withErrors(['Username or password is invalid']);
		
		// $errors = [$this->username() => trans('auth.failed')];
		        
  //       $user = \App\User::where($this->username(), $request->{$this->username()})->first();
        
  //       if ($user && \Hash::check($request->password, $user->password) && $user->active != 1) {
  //           $errors = [$this->username() => 'Your account is not active.'];
  //       }
  //       if ($request->expectsJson()) {
  //           return response()->json($errors, 422);
  //       }
  //       return redirect()->back()
  //           ->withInput($request->only($this->username(), 'remember'))
  //           ->withErrors($errors);

    }

    public function logout()
    {
    	Auth::guard('web')->logout();
    	return redirect()->route('login');
    }
}
