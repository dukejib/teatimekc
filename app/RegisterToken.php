<?php

namespace App;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class RegisterToken extends Model
{
    protected $table = 'register_tokens';

    protected $fillable = [
        'token','email'
    ];

    /** Method */
    public static function getRegisterToken($emailid)
    {
        $registertoken = RegisterToken::create([
            'token' => Str::uuid(),
            'email' => $emailid
        ]);

        return $registertoken;
    }
}
