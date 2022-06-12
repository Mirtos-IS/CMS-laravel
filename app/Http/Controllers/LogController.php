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
		/* if (!Auth::attempt($request->only(['name','password']))){ */
		if (!Auth::attempt([
			'name' => $request['name'],
			'password' => $request['password']])){

			echo "<h1> {$request['name']} {$request['password']} </h1>";
			return redirect()
				->back()
				->withErrors($request['name'] . ' ' . $request['password']);
		}
		$request->session()->regenerate();
		return redirect('/admin');
	}
}

