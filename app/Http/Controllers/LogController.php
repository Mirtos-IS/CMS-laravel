<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

use App\Models\{Posts, Categories, Comments, User};

class LogController extends Controller
{
	public function login(){
		return view('login.login');
	}
	
	public function logout(){
		Session::flush();
		Auth::logout();
		return redirect('/');
	}	

	public function create(){
		return view('login.create');
	}

	public function loginAuth(Request $request){
		/* if (!Auth::attempt($request->only(['user_name','password']))){ */
		if (!Auth::attempt([
			'user_name' => $request['user_name'],
			'password' => $request['user_password']])){

			echo "<h1> {$request['user_name']} {$request['user_password']} </h1>";
			return redirect()
				->back()
				->withErrors($request['user_name'] . ' ' . $request['user_password']);
		}
		$request->session()->regenerate();
		return redirect('/admin');
	}
}

