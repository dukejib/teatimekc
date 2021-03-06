<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Log extends Model
{

    protected $table = 'logs';

    protected $fillable = [
        'subject','url','ip','method','agent','user_id'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
