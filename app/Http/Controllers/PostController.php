<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\{Posts, Categories, Comments};

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

	public function onePost(Posts $post){
		return view(
			'post',
			['post' => $post]
		);

	}

	public function allPosts(){
		$posts = $this->getAllPosts();
		return view(
			'admin.posts',
			compact('posts')
		);
	}

	public function addPosts(){
		$cats = $this->getAllCategories();

		return view(
			'admin.add_posts',
			compact('cats')
		);
	}

	public function allCategories(request $request){
		$cats = $this->getAllCategories();
		return view(
			'admin.categories',
			['cats' => $cats,
			'id' => $request->id]
		);
	}

	public function allComments(){
		$comments = $this->getAllComments()->get();
		return view(
			'admin.comments',
			compact('comments')
		);	
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
		return $cats;
	}

	private function getAllComments(){
		$comments = Comments::orderBy('comment_id');

		return $comments;
	}
}
