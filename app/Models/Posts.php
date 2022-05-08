<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    use HasFactory;

	protected $table = 'posts';
	protected $primaryKey = 'post_id';
	protected $fillable = [
		'post_category_id',
		'post_title',
		'post_author',
		'post_image',
		'post_content',
		'post_tags',
		'post_status'
	];

	public function comments(){
		return $this->hasMany('Comments');
	}

	public function user(){
		return $this->belongsTo('\App\Model\User', 'post_id');
	}

	public function category(){
		return $this->belongsTo('\App\Model\Categories', 'post_id');
	}
}
