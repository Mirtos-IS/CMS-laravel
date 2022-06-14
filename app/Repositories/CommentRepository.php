<?php

namespace App\Repositories;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentRepository 
{

    public const PAGE_SIZE = 20;

    public function all(int $post_id = 0) {
        $comments= Comment::orderByDesc('id')
                        ->join('users', 'users.id', '=', 'comments.user_id')
                        ->join('posts', 'posts.id', '=', 'comments.post_id')
                        ->select('comments.*', 'users.name', 'users.image as image', 'posts.title')
                        ->when($post_id > 0, function ($query) use ($post_id){
                            $query->where('post_id', $post_id);
                        }, function ($query){
                            $query->where('posts.user_id', Auth::user()->id);
                        })->paginate(self::PAGE_SIZE);

        return $comments;
    }

    public function store(Request $request, int $post_id){
        $user = Auth::user()->id;
        $comment = Comment::create([
            'post_id' => $post_id,
            'user_id' => $user,
            'content' => $request->comment_content
        ]);

        PostRepository::addCommentCount($post_id);
        return $comment;
    }

    public function update() {
        //update comments
    }

    public function delete(int $id) : void {
        $comment = Comment::find($id);
        $comment->delete();
    }
}
