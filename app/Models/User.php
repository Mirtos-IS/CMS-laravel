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

	protected $primaryKey = 'user_id';
    protected $fillable = [
        'user_name',
		'user_firstname',
		'user_lastname',
		'user_password',
		'user_email',
		'user_image',
		'user_role'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'user_password',
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
		if (!$this->user_image){
            return Storage::url('no_image.jpg');
		}
        return Storage::url($this->user_image);
	}

	public function posts(){
		return $this->hasMany('\App\Models\Posts', 'user_id');
	}

	public function user_name(){
		return $this->user_name;
	}

	public function getAuthPassword(){
		return $this->user_password;
	}

    
    public static function getAllUsers(){
        $users = User::orderByDesc('user_name')->get();
        return $users;
    }
}
