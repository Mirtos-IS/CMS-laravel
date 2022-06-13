<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Post extends Model
{
    use HasFactory;

	protected $table = 'posts';

	protected $fillable = [
		'category_id',
        'user_id',
		'title',
		'author',
		'image',
		'content',
		'tag',
		'status'
	];

	public function getImageUrlAttribute(){
		if ($this->image){
			return Storage::url($this->image);
		}
		return Storage::url('no_image.jpg');
	}

	public function comments(){
		return $this->hasMany(Comment::class);
	}

	public function user(){
		return $this->belongsTo(User::class);
	}

	public function category(){
		return $this->belongsTo(Category::class);
	}

}
