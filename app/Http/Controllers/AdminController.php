<?php

namespace App\Http\Controllers;

include 'helper/functions.php';

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
	public function __construct(){
		$this->middleware('auth');
	}


	public function admin(){
		return view('admin.dashboard');
	}

	public function allPosts(){
		$posts = getAllPosts();
		return view(
			'admin.posts',
			compact('posts')
		);
	}

	public function addPosts(){
		$cats = getAllCategories();

		return view(
			'admin.add_posts',
			compact('cats')
		);
	}

	public function allCategories(Request $request){
		$cats = getAllCategories();
		return view(
			'admin.categories',
			['cats' => $cats,
			'id' => $request->id]
		);
	}

	public function allComments(){
		$comments = getAllComments()->get();
		return view(
			'admin.comments',
			compact('comments')
		);	
	}

	public function allUsers(){
		$users = getAllUsers();
		return view(
			'admin.users',
			compact('users')
		);
	}
}

