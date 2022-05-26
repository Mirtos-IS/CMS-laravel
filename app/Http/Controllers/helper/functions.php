<?php

namespace App\Http\Controllers;

use App\Models\{Posts, Categories, Comments, User};

function getAllPosts(int $limit=0){
	$posts = Posts::orderByDesc('post_id')
		->skip(0+$limit)
		->take('20')
		->get();

	return $posts;
}

function getAllCategories(){
	$cats = Categories::orderBy('cat_title')->get();
	return $cats;
}

function getAllComments(){
	$comments = Comments::orderBy('comment_id');

	return $comments;
}
function getAllUsers(){
	$users = User::orderBy('user_name')->get();
	return $users;
}
