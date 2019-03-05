<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User;

class Profile extends Model
{
    protected $table = "profiles";

    protected $fillable = [
        'user_id', 'avatar','about','facebook','gmail','twitter','jobtitle'
    ];

    /** Relationshiip */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

}
