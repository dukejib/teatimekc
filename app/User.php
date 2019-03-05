<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Auth;


/** To ensure, verificaiton email is sent, implement MustVerifyEmail 
 * A verified middleware has been added to the default application's HTTP kernel. 
 * This middleware may be attached to routes that should only allow verified users:
 * 'verified' => \Illuminate\Auth\Middleware\EnsureEmailIsVerified::class,
 */


class User extends Authenticatable //implements MustVerifyEmail
{
    use Notifiable;

    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','isAdmin','slug'
    ];
    
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    /** Relationships */
    public function profile()
    {
        return $this->hasOne('App\Profile');
    }

    public function posts()
    {
        return $this->hasMany('App\Post');
    }

    public function logs()
    {
        return $this->hasMany('App\Log');
    }

    /** Methods */

    public function setNameAttribute($value)
    {
        $this->attributes['name'] = $value;
        $this->attributes['slug'] = str_slug($value);
        
    }
   
}
