<?php

namespace App\Http\Controllers;

use App\Models\{Posts};
use App\Repositories\PostRepository;

class PostController extends Controller
{
    //
	public function index(int $limit=0){
		$posts = new PostRepository;
        $posts = $posts->allPosts();
		return view(
			'post_index',
			compact('posts')
		);
	}

	public function onePost(Posts $post){
		return view(
		    'post',
			['post' => $post]
		);
	}


}
