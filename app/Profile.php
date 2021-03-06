<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Profile extends Model
{
    protected $fillable = [
		'first_name',
		'last_name',
		'job',
		'bio',
		'phone',
		'address',
		'city',
		'country',
		'birth_day',
		'zip_code',
		'avatar_path',
    ];
    
    	/**
	 * a profile belongs to a user
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function user()
	{
		return $this->belongsTo(User::class);
	}

	public function avatar(){
		return $this->avatar_path ? $this->avatar_path : 'avatars/default.jpeg';
	}
}
