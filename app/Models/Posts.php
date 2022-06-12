<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

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
		'post_tag',
		'post_status'
	];

	public function getImageUrlAttribute(){
		if ($this->post_image){
			return Storage::url($this->post_image);
		}
		return Storage::url('no_image.jpg');
	}

	public function comments(){
		return $this->hasMany(Comments::class, 'comment_post_id','post_id' );
	}

	public function user(){
		return $this->belongsTo(User::class, 'post_id');
	}

	public function category(){
		return $this->belongsTo(Categories::class, 'post_category_id', 'cat_id');
	}

}
