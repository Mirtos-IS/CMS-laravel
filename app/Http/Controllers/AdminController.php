<?php

namespace App\Http\Controllers;

use \App\Events\NewEmailPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;

use App\Mail\NewPost;
use App\Models\{Posts, Comments, Categories, User};
use App\Repositories\{CategoryRepository, CommentRepository, PostRepository, UserRepository};
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
        $user_id = Auth::user()->id;
		$posts = new PostRepository;
        $posts = $posts->allFromUser($user_id);
        
		return view(
			'admin.posts',
			compact('posts')
		);
	}

	public function addPosts(){
        $categories = new CategoryRepository;
		$categories = $categories->all();

		return view(
			'admin.add_posts',
			compact('categories')
		);
	}

	public function storePost(Request $request){
        $post = new PostRepository;
        $user_id = Auth::user()->id;
        $post->store($request, $user_id);

		return redirect('/admin/posts');
	}

	public function destroyPost($id) {
        $post = new PostRepository;
        $post->delete($id);

		return redirect()->back();
    }

	public function editPost(Request $request){
		$post = Posts::find($request->id);
		$cats = Categories::getAllCategories();

		return view(
			'admin.edit_post',
			['post' => $post,
			 'cats' => $cats]
		);
	}
	public function updatePost(Request $request) {
        $post = new PostRepository;
        $post->update($request);

		return redirect('/admin/posts');
	}

	public function allCategories(Request $request){
        $categories = new CategoryRepository;
		$categories = $categories->all();
		return view(
			'admin.categories',
			['categories' => $categories,
			'id' => $request->id]
		);
	}

    public function storeCategory(Request $request){
        $category = new CategoryRepository;
        $category = $category->store($request);

        return redirect()->back();
    }

    public function updateCategory(Request $request, int $id){
        $category = new CategoryRepository;
        $category = $category->update($request, $id);

        return redirect()->back();
    }

	public function allComments(){
        $comments = new CommentRepository;
        $comments = $comments->all();
		return view(
			'admin.comments',
			compact('comments')
		);	
	}

    public function storeComment(Request $request, int $post_id){
        $comments = new CommentRepository;
        $comments = $comments->store($request, $post_id);

        return redirect("/post/{$post_id}");
    }

	public function allUsers(){
        $users = new UserRepository;
		$users = $users->all();
		return view(
			'admin.users',
			compact('users')
		);
	}

    public function profile(){
        $user_id = Auth::user()->id;
        $numberOfPosts = new PostRepository;
        $numberOfPosts = $numberOfPosts->count($user_id);
        return view('admin.profile', ['numberOfPosts' => $numberOfPosts->numberOfPosts]);
    }
}

