<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $table = 'settings';

    protected $fillable = [
        'site_name',
        'contact_no',
        'twitter_handle',
        'contact_email'
    ];
}
