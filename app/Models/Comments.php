<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    use HasFactory;

	protected $table = 'comments';
	protected $fillable = [
		'comments_post_id',
		'comment_user_id',
		'comment_content'
	];
}
