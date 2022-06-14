<?php

namespace App\Repositories;

use App\Events\NewEmailPost;
use App\Models\{Post, Comment};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PostRepository 
{
    private const PAGE_SIZE = 20;

    public function all() {
        $posts = Post::orderByDesc('id')
                    ->join('users', 'users.id', '=', 'posts.user_id')
                    ->join('categories', 'categories.id', '=', 'posts.category_id')
                    ->select('posts.*', 'users.name', 'categories.name as category_name')
                    ->paginate(self::PAGE_SIZE);

        return $posts;
        }

    public function allFromUser($user_id){
        $posts = Post::orderByDesc('id')
                    ->join('users', 'users.id', '=', 'posts.user_id')
                    ->join('categories', 'categories.id', '=', 'posts.category_id')
                    ->select('posts.*', 'users.name', 'categories.name as category_name')
                    ->where('posts.user_id', $user_id)
                    ->paginate(self::PAGE_SIZE);

        return $posts;
    }

    public function store(Request $request, $user_id): void {
		$image = null;
		if ($request->hasFile('image')){
			$image = $request->file('image')->store('posts');
		}

        Post::create([
            'category_id' => $request->category_id,
        'user_id' => $user_id,
            'title' => $request->title,
            'image' => $image,
            'tag' => $request->tag,
            'status' => $request->status,
            'content' => $request->content,
        ]);

        event(new NewEmailPost($request->title));
    }

    public function update(Request $request): void {
		Post::whereId($request->id)->update([
				'title' => $request->title,
				'category_id' => $request->category_id,
                'user_id' => $request->user_id,
				'tag' => $request->tag,
				'status' => $request->status,
				'content' => $request->content,
			]);
		if ($request->image){
			$image = Post::find($request->id)->select('image')->get();
			Storage::delete($image);

			Post::whereId($request->id)->update([
					'image' => $request->file('image')->store('posts')
				]);
		}
    }

    public static function addCommentCount($id){
        Post::find($id)->increment('comment_count', 1);
    }

    public function delete(int $id): void {
		$image = Post::find($id)->select('image')->get();
		
		if ($image){
			Storage::delete($image);
		}
        DB::beginTransaction();
        Comment::where('post_id', $id)->delete();
		Post::destroy($id);
        DB::commit();
	}
}
