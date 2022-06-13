<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

	protected $table = 'comments';
	protected $primaryKey = 'comment_id';
	protected $fillable = [
		'comment_post_id',
		'comment_user_id',
		'comment_content'
	];

	public function post(){

		return $this->belongsTo(Post::class, 'comment_post_id');
	}

    public function user(){
        return $this->belongsTo(User::class, 'comment_user_id');
    }




}
