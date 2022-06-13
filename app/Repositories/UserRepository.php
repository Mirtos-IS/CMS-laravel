<?php

namespace App\Repositories;

use App\Events\NewEmailPost;
use App\Models\{User};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserRepository 
{    
    public function all(){
        $users = User::orderBy('name')->get();

        return $users;
    }

    public function store(Request $request): User {

        $data = $request->except('_token');
		$data['password'] = Hash::make($data['password']);
		$user = User::create($data);

        return $user;
    }

    public function update() {
        //update User
    }

    public function delete(int $id): void {
		$image = User::find($id)->select('image')->get();
		
		if ($image){
			Storage::delete($image);
		}

		User::destroy($id);
    }

}
