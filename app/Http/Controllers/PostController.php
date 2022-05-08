<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\{Posts, Categories};

class PostController extends Controller
{
    //
	public function index(int $limit=0){
		$posts = $this->getAllPosts($limit);
		return view(
			'post_index',
			compact('posts')
		);
	}

	public function admin(){
		return view('admin.dashboard');
	}

	public function allPosts(){
		$posts = $this->getAllPosts();
		return view(
			'admin.posts',
			compact('posts')
		);
	}

	public function addPosts(){
		return $this->getAllCategories();
	}

	private function getAllPosts(int $limit=0){
		$posts = Posts::orderByDesc('post_id')
			->skip(0+$limit)
			->take('20')
			->get();

		return $posts;
	}

	private function getAllCategories(){
		$cats = Categories::orderBy('cat_title')->get();
		return view(
			'admin.add_posts',
			compact('cats')
		);
	}
}
