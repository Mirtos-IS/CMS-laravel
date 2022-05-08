<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    use HasFactory;

	protected $table = 'posts';
	protected $fillable = [
		'post_category_id',
		'post_title',
		'post_author',
		'post_image',
		'post_content',
		'post_tags',
		'post_status'
	];
}
