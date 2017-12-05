<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Profile;
use App\Mail\UserMailChanged;
use Illuminate\Support\Facades\Mail;

class User extends Authenticatable
{
    use Notifiable;

    const VERIFIED_USER = '1';
	const UNVERIFIED_USER = '0';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'verification_token',
    ];

    /**
	 * return true if the user is verified
	 * @return bool
	 */
	public function isVerified()
	{
		return User::VERIFIED_USER == $this->verified;
    }
    
    /**
	 * generate a verification code for the user
	 * @return string
	 */
	public static function generateVerificationCode()
	{
		return str_random(40);
    }


    /**
	 * triggred by laravel
	 */
    public static function boot()
    {
        parent::boot();

        static::creating(function($user)
        {
            $user->verification_token = self::generateVerificationCode();
        });

        // send email when the user change the email
        static::updated(function($user){
            if($user->isDirty('email')){
                retry(
                    5,
                    function()use($user) {
                        Mail::to($user)->send(new UserMailChanged($user));
                    },
                    100
                );
            }
        });
    }

    /**
	 * a user has one profile
	 * @return \Illuminate\Database\Eloquent\Relations\HasOne
	 */
	public function profile()
	{
		return $this->hasOne(Profile::class);
	}
}
