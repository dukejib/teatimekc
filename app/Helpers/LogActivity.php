<?php

namespace App\Helpers;

use auth;
use App\Log as LogActivityModel;
use Illuminate\Support\Facades\Request;

class LogActivity
{
    public static function addToLog($subject)
    {
        $log = [];
        $log['subject'] = $subject;
    	$log['url'] = Request::fullUrl();
    	$log['method'] = Request::method();
    	$log['ip'] = Request::ip();
    	$log['agent'] = Request::header('user-agent');
        $log['user_id'] = auth()->check() ? auth()->user()->id : 1;
        LogActivityModel::create($log);
    }

    public static function logActivityClass()
    {
        return LogActivityModel::latest()->orderBy('created_at','asc')->get();
    }
}