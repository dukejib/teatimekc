<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('views','FrontEndController@getPostViews');

Route::get('/','FrontEndController@index')->name('index');
Route::get('/post/{slug}','FrontEndController@singlePost')->name('post.single');
Route::get('/category/{slug}','FrontEndController@postsByCategory')->name('category.single');
Route::get('/tag/{id}','FrontEndController@tag')->name('tag.single');
Route::post('/results','FrontEndController@result')->name('query.result');
Route::get('/author/posts/{slug}','FrontEndController@authorPosts')->name('author.posts');

// Route::get('/test',function(){
//     //This is how to setup config at runtime
//     config(['blog.creator' => 'duke']);
//     return config('blog.creator');
// });

Route::get('addlog','HomeController@addToLog');
Route::get('viewlog','HomeController@logActivity');

Auth::routes(['verify' => true]);
/** Post Group with auth middleware */
Route::group(['prefix' => 'admin', 'middleware' => ['auth','verified'] ], function () {

    // All logins go to dashboard - Sagregate users dependent on their roles
    Route::get('/dashboard', 'HomeController@index')->name('dashboard');//->middleware('verified');
    Route::post('/invite','HomeController@invite')->name('invite.user');  
    Route::get('/profile','ProfileController@index')->name('profile');
    Route::post('/profile/update/{id}','ProfileController@update')->name('profile.update');
    Route::get('/profile/show/{slug}','ProfileController@show')->name('profile.show');

    /** Post Routes */
    Route::get('/posts','PostController@index')->name('posts');
    Route::get('/trashed','PostController@trashed')->name('post.trashed');
    Route::get('/post/create','PostController@create')->name('post.create');
    Route::get('/post/edit/{id}','PostController@edit')->name('post.edit');
    Route::get('/post/trash/{id}','PostController@trash')->name('post.trash');
    Route::get('/post/destroy/{id}','PostController@destroy')->name('post.destroy');
    Route::get('/post/restore/{id}','PostController@restore')->name('post.restore');
    Route::post('/post/store','PostController@store')->name('post.store');
    Route::get('/post/show/{id}','PostController@show')->name('post.show');
    Route::post('/post/update/{id}','PostController@update')->name('post.update');
    Route::get('/post/publish/{id}','PostController@publish')->name('post.publish');

    /** Category Routes */
    Route::get('/categories','CategoryController@index')->name('categories');
    Route::get('/category/edit/{id}','CategoryController@edit')->name('category.edit');
    Route::get('/category/delete/{id}','CategoryController@destroy')->name('category.delete');
    Route::post('/category/store','CategoryController@store')->name('category.store');
    Route::post('/category/update/{id}','CategoryController@update')->name('category.update');
    
    /** Tags Routes */
    Route::get('/tags','TagController@index')->name('tags');
    Route::get('/tag/create','TagController@create')->name('tag.create');
    Route::get('/tag/edit/{id}','TagController@edit')->name('tag.edit');
    Route::post('/tag/store','TagController@store')->name('tag.store');
    Route::post('/tag/update/{id}','TagController@update')->name('tag.update');
    Route::get('/tag/destroy/{id}','TagController@destroy')->name('tag.destroy');

    /** User Routes */
    Route::get('/users','UserController@index')->name('users');
    Route::get('/user/delete/{id}','UserController@destroy')->name('user.delete');
    /** Log Routes */
    Route::get('/logs','HomeController@logs')->name('logs')->middleware('admin');
    Route::get('/log/delete/{id}','HomeController@deleteLog')->name('log.delete')->middleware('admin');
});

/** This will override Register link of Auth::routes() */
// Route::get('/register',function(){
//     return 'Register user';
// });