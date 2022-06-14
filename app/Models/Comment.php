<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Comment extends Model
{
    use HasFactory;

	protected $table = 'comments';
	protected $fillable = [
		'post_id',
		'user_id',
		'content'
	];

	public function post(){

		return $this->belongsTo(Post::class);
	}

    public function user(){
        return $this->belongsTo(User::class);
    }

	public function getImageUrlAttribute(){
		if ($this->image === null){
            return Storage::url('no_image.jpg');
		}
        return Storage::url($this->image);
	}
}
