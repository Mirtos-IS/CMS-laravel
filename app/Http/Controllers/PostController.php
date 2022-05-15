<?php

namespace App\Http\Controllers;

include 'helper/functions.php';

use App\Models\{Posts};

class PostController extends Controller
{
    //
	public function index(int $limit=0){
		$posts = getAllPosts($limit);
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
