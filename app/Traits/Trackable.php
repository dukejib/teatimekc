<?php

namespace App\Traits;

use App\Tag;


trait Trackable
{
    public static function bootTrackable()
    {
        static::created(function ($model) {
            $m = $model->getTable();
            dd('New Object Created from trait trackable ' . $m . ' ' . $model);

        // if($model instanceof Tag)
        // {
        //     dd('This is a tag');
        // }
        // $log = [];
        // $log['subject'] = $model->;
    	// $log['url'] = Request::fullUrl();
    	// $log['method'] = Request::method();
    	// $log['ip'] = Request::ip();
    	// $log['agent'] = Request::header('user-agent');
        // $log['user_id'] = auth()->check() ? auth()->user()->id : 1;
        // LogActivityModel::create($log);
        
        });
    }
}