<?php

namespace App;

use App\Post;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Request;

class PostView extends Model
{
    protected $table = 'post_views';

    protected $fillable = [
        'titleslug','url','session_id','user_id','ip','agent'
    ];

    public static function createViewLog(Post $post){
        $postviews = new PostView();
        $postviews->post_id = $post->id;
        $postviews->titleslug = $post->slug;
        $postviews->url = Request::url();
        $postviews->session_id = Request::getSession()->getId();
        $postviews->user_id = (Auth::check())? Auth::id():null;
        $postviews->ip = Request::getClientIp();
        $postviews->agent = Request::header('User-Agent');
        $postviews->save();
    }

    public static function createIndexLog(){
        $postviews = new PostView();
        $postviews->post_id = 0;
        $postviews->titleslug = 'landing';
        $postviews->url = Request::url();
        $postviews->session_id = Request::getSession()->getId();
        $postviews->user_id = (Auth::check())? Auth::id():null;
        $postviews->ip = Request::getClientIp();
        $postviews->agent = Request::header('User-Agent');
        $postviews->save();
    }

    /** Relationships */
    public function post()
    {
        return $this->belongsTo('App\Post');
    }

    /** Methods */
 
}
