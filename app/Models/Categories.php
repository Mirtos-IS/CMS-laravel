<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
	use HasFactory;

	protected $table = 'categories';

	protected $primaryKey = 'cat_id';
	protected $fillable = ['cat_title'];

	public $timestamps = false;

	public function posts(){
		return $this->hasMany('\App\Model\Posts', 'cat_id');
	}

    public static function getAllCategories(){
        $cats = Categories::orderBy('cat_title')->get();
        return $cats;
    }
}
