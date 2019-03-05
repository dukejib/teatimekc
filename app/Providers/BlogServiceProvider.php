<?php

namespace App\Providers;

use App\Tag;
use App\Post;
use App\Category;
use App\Observers\TagObserver;
use App\Observers\PostObserver;
use App\Observers\CategoryObserver;
use Illuminate\Support\ServiceProvider;

class BlogServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //creating, created,updating, updated
        //deleting,deleted,saving, saved
        //restoring, restored

        Tag::observe(TagObserver::class);
        Post::observe(PostObserver::class);
        Category::observe(CategoryObserver::class);
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
