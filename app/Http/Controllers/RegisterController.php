<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use App\Models\{Posts, Categories, Comments, User};
use App\Repositories\UserRepository;

class RegisterController extends Controller
{

	public function register(Request $request){
        $user = new UserRepository;
        $user = $user->store($request);

		Auth::login($user);
        return redirect('/admin');
	}
}
