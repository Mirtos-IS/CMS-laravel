<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Storage;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
	 */
	protected $table = 'users';

    protected $fillable = [
        'name',
		'first_name',
		'last_name',
		'password',
		'email',
		'image',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

	public function getImageUrlAttribute(){
		if ($this->image === null){
            return Storage::url('no_image.jpg');
		}
        return Storage::url($this->image);
	}

	public function posts(){
		return $this->hasMany(Post::class);
	}

	public function name(){
		return $this->name;
	}
}
