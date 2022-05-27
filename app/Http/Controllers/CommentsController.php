<?php

namespace App\Http\Controllers;

use App\Models\{Comments};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentsController extends Controller
{
    public function __construct(){
		$this->middleware('auth');
    }
    public function storeComment(Request $request, int $post){
        $user = Auth::user()->user_id;
        Comments::create([
            'comment_post_id' => $post,
            'comment_user_id' => $user,
            'comment_content' => $request->comment_content
        ]);
        return redirect()->back();
    }

    public function deleteComment(int $id){
        Comments::deleteComment($id);

        return redirect('/admin/comments');
    }
}
