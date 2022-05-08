<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comments extends Model
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

		return $this->belongsTo('\App\Models\Posts', 'comment_post_id');
	}
}
