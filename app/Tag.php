<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\Trackable;
use App\Observers\TagObserver;

class Tag extends Model
{
        //For Event Binding - Via Events
    // protected $dispatchesEvents = [
    //     'created' => TagObserver::class,
    //     // 'updated' => TagObserver::class,
    //     // 'deleted' => TagObserver::class
    // ];
    
    protected $table = 'tags';

    protected $fillable = ['tag'];

    /** Relationships */
    public function posts()
    {
        return $this->belongsToMany('App\Post');
    }

    /** Mutator/Accesors Set/Get */
    // public function setTagAttribute($tag)
    // {
    //     $this->attributes['tag'] = ucfirst($tag);
    // }
    /** Now resides in TagObserver.php */

}
