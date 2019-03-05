<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
// use App\Events\PostCreated;
// use App\Events\PostUpdated;
// use App\Events\PostDeleted;
use App\Traits\Trackable;
use App\Traits\ClassifiesDeleted;

class Post extends Model
{
    //Use Trait
    // Use Trackable;

    
    //For Soft Delete
    use SoftDeletes;

    //For Event Binding - Via Events
    // protected $dispatchesEvents = [
    //     'created' => PostCreated::class,
    //     'updated' => PostUpdated::class,
    //     'deleted' => PostDeleted::class
    // ];

    protected $dates = ['deleted_at','published_at'];

    protected $table = 'posts';

    protected $fillable = [
        'title',
        'content',
        'category_id',
        'featured',
        'slug',
        'user_id',
        'published',
        'published_at',
        'shortnote',
        'urdu'
    ];

    /** Accessors/Mutators uses get/set */
    /** https://laravel.com/docs/5.7/eloquent-mutators */ 
    //TODO: Read More About it
    public function getFeaturedAttribute($featured)
    {
        return asset($featured);
    }

    // public function setTitleAttribute($title)
    // {
    //     $this->attributes['title'] = ucfirst($title);
    //     $this->attributes['slug'] = str_slug($title);
    // }

    /** Relationship */
    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function tags()
    {
        return $this->belongsToMany('App\Tag');
    }

    public function user()
    {
        return $this->belongsTo('App\User');    
    }

    public function views()
    {
        return $this->hasMany('App\PostView');
    }

    /** Method */
    public function getTotalPostViews()
    {
        
    }
}
