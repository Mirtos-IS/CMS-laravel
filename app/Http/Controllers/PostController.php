<?php

namespace App\Http\Controllers;

use App\Models\{Post};
use App\Repositories\PostRepository;

class PostController extends Controller
{
    //
	public function index(int $limit=0){
		$posts = new PostRepository;
        $posts = $posts->all();
		return view(
			'post_index',
			compact('posts')
		);
	}

	public function onePost(Post $post){
		return view(
		    'post',
			['post' => $post]
		);
	}


}
