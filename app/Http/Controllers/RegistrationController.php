<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Role;
use App\User;
class RegistrationController extends Controller
{
    public function register()
    {
    	$roles=Role::all();
    	return view( 'reg',compact('roles') );
    }

    public function register_data(Request $request)
    {
    	$this->validate($request,[
    		'name'=>'required',
    		'email'=>'required|email|unique:users',
    		'password'=>'required|confirmed'
    	]);

    	$user=User::create([
    		'name'=>$request->name,
    		'email'=>$request->email,
    		'password'=>Hash::make($request->password),
    		'role_id'=>$request->role_id,
    	]);
    	return redirect()->route('login');
    }
}
