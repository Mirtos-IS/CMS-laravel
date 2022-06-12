<?php

namespace App\Repositories;

use App\Events\NewEmailPost;
use App\Models\Posts;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserRepository 
{
    public function store(Request $request): User {

        $data = $request->except('_token');
		$data['password'] = Hash::make($data['password']);
		$user = User::create($data);

        return $user;
    }
}
