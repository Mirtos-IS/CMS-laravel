<?php

namespace App\Http\Controllers;

use \App\Events\NewEmailPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;

use App\Mail\NewPost;
use App\Models\{Posts, Comments, Categories, User};

use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
	public function __construct(){
		$this->middleware('auth');
	}


	public function admin(){
		return view('admin.dashboard');
	}

	public function allPosts(){
		$posts = Posts::getAllPosts();
		return view(
			'admin.posts',
			compact('posts')
		);
	}

	public function addPosts(){
		$cats = Categories::getAllCategories();

		return view(
			'admin.add_posts',
			compact('cats')
		);
	}

	public function storePost(Request $request){
		$post_image = null;
		if ($request->hasFile('post_image')){
			$post_image = $request->file('post_image')->store('posts');
		}

		Posts::create([
			'post_title' => $request->post_title,
			'post_image' => $post_image,
			'post_category_id' => $request->post_category_id,
			'post_author' => $request->post_author,
			'post_tag' => $request->post_tag,
			'post_status' => $request->post_status,
			'post_content' => $request->post_content,
		]);

		event(new NewEmailPost($request->post_title));

		return redirect('/admin/posts');
		
	}

	public function destroyPost(Request $request){

		$post_image = Posts::find($request->post_id)
					  ->post_image;
		
		if ($post_image){
			Storage::delete($post_image);
		}

		Posts::destroy($request->post_id);
		return redirect()->back();
	}

	public function editPost(Request $request){
		$post = Posts::find($request->post_id);
		$cats = Categories::getAllCategories();

		return view(
			'admin.edit_post',
			['post' => $post,
			 'cats' => $cats]
		);
	}

	public function updatePost(Request $request){
		Posts::where('post_id', $request->post_id)
			->update([
				'post_title' => $request->post_title,
				'post_category_id' => $request->post_category_id,
				'post_author' => $request->post_author,
				'post_tag' => $request->post_tag,
				'post_status' => $request->post_status,
				'post_content' => $request->post_content,
			]);
		if ($request->post_image){
			$post_image = Posts::find($request->post_id)->image_url;
			Storage::delete($post_image);

			Posts::where('post_id', $request->post_id)
				->update([
					'post_image' => $request->file('post_image')->store('posts')
				]);
		}
		return redirect('/admin/posts');
	}

	public function allCategories(Request $request){
		$cats = Categories::getAllCategories();
		return view(
			'admin.categories',
			['cats' => $cats,
			'id' => $request->id]
		);
	}

	public function allComments(){
        $comments = Comments::getAllComments();
		return view(
			'admin.comments',
			compact('comments')
		);	
	}

	public function allUsers(){
		$users = User::getAllUsers();
		return view(
			'admin.users',
			compact('users')
		);
	}
}

