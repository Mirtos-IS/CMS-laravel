<?php

namespace App\Http\Controllers;

include 'helper/functions.php';

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use App\Models\{Posts, Categories, Comments, User};

class RegisterController extends Controller
{
	public function create(){
		return view('login.create');
	}
	public function store(Request $request){
		$data = $request->except('_token');
		$data['user_password'] = Hash::make($data['user_password']);
		$user = User::create($data);

		Auth::login($user);
		return redirect('/admin');
	}
}
