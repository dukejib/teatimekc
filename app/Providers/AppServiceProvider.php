<?php

namespace App\Providers;

// use App\Post;
// use App\Observers\PostObserver;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

        //Force Https
        // if (env('REDIRECT_HTTPS')) {
        //     URL::forceScheme('https');
        // }

        //For Database
        Schema::defaultStringLength(191);
        
        //Bind the Observer to Model Post
        //Post::observe(PostObserver::class);
        //Now defined in its on TrackableProvider.php
        //Also, ensure to add it in 'providers' = [ ];
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //Force Https
        // if(env('REDIRECT_HTTPS')) {
        //     $this->app['request']->server->set('HTTPS', true);
        // }
    }
}
