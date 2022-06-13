<?php

namespace App\Repositories;

use App\Models\Posts;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class CommentRepository 
{
    public function all(): Collection {
        $comments= Comments::orderByDesc('id')->get();
        return $comments;
    }

    public function store(Request $request){
        //store comments
    }

    public function update() {
        //update comments
    }

    public function delete(int $id) : void {
        $comment = Comments::find($id);
        $comment->delete();
    }
}
