<?php

namespace App\Http\Controllers;

use App\Tag;
use App\Post;
use App\User;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\PostView;

class FrontEndController extends Controller
{

    /** Helper Functions  */
    // Used for Side Bar Categories
    public function getAllCategories()
    {
        return Category::select('id','category','slug')->get();
    }
    // Used for Side Bar Tags
    public function getAllTags()
    {
        return Tag::select('id','tag')->inRandomOrder()->get();
    }
    // Get Top Four Categories Only for Navbar Menu
    public function getTopFourCategories()
    {
        return Category::select('id','category','slug')->orderBy('created_at','asc')->limit(4)->get();
    }
    
    // Get Single Posts for Pagination on Single Pages
    public function getSinglePostForNavigation($id)
    {
        return Post::select('id','title','slug','urdu')->whereId($id)->first();
    }
    // Returns Only 1 Posts By Slug 
    public function getSinglePostBySlug($slug)
    {
        return Post::select('id','title','featured','slug','created_at')->whereSlug($slug)->get();
    }

    // Get Posts by Category -- Returns Related Posts Only
    public function getPostsByCategory($id)
    {
        // return Post::where('category_id',$id)->orderBy('created_at','desc')->take(3)->get();
        // return Post::where('category_id',$id)->orWhere('published',1)->orderBy('created_at','desc')->get();
        return Post::where('category_id',$id)->orderBy('published_at','desc')->paginate(5);
    }

    /** Helper Functions End */
    //For index.blade.php
    public function index()
    {
        // $posts = Post::withCount('views')->orderBy('title','desc')->get();
        // $posts = $posts->sortBy('views_count');
        // dd($posts[4]->views_count);
        // dd($posts);

        //DB Returns an Array - StoredProcedure returns latest 3 published posts only
        //Convert the Array to Model Collection via hydrate() function
        $posts = Post::hydrate(DB::select('CALL GetLatestThreePosts'));

        //INdex Page Record
        PostView::createIndexLog();

        return view('index')
        //Send separately 3 posts
        ->with('first_post', $posts[0])
        ->with('second_post', $posts[1])
        ->with('third_post', $posts[2])
        ->with('categories',$this->getTopFourCategories())
        // ->with('third_post',Post::orderBy('created_at','desc')->where('published',1)->skip(2)->take(1)->first())
        ->with('politics',$this->getPostsByCategory(1))
        ->with('pakistan',$this->getPostsByCategory(8))
        ;
    }
    //For single.blade.php
    public function singlePost($slug)
    {
        $post = Post::whereSlug($slug)->first();
        $next_id = Post::where('id','>',$post->id)->min('id');
        $prev_id = Post::where('id','<',$post->id)->max('id');

        //Call PostView
        PostView::createViewLog($post);

        return view('single')
        ->with('post',$post)
        ->with('next',$this->getSinglePostForNavigation($next_id))
        ->with('prev',$this->getSinglePostForNavigation($prev_id))
        ->with('categories',$this->getAllCategories())
        ->with('tags',$this->getAllTags())
        ;
         
    }

    public function postsByCategory($slug)
    {
        //Get The Category
        $category = Category::where('slug',$slug)->first();

        return view('category')
        ->with('category',$category)
        ->with('posts',$this->getPostsByCategory($category->id))
        ->with('categories',$this->getAllCategories())
        ->with('tags',$this->getAllTags())
        ;
    }

    public function tag($id)
    {
        $tag = Tag::find($id);
        $posts = $tag->posts()->orderBy('published_at','desc')->paginate(5);
        // dd($posts);
        return view('tag')
        ->with('tag',$tag)
        ->with('posts',$posts)
        ->with('categories',$this->getAllCategories())
        ->with('tags',$this->getAllTags())
        ;
    }

    public function result()
    {
        $query = request()->get('query');
        // dd($query);
        //Calls stored procedure to search published posts only
        // $posts = Post::hydrate(DB::select("CALL SearchQuery('$query')"));
        $posts = Post::where('title','like','%' . $query . '%')->get();
        // dd ($p);
        return view('results')
        ->with('posts',$posts)
        ->with('query',$query)
        ->with('categories',$this->getAllCategories())
        ->with('tags',$this->getAllTags())
        ;
    }

    public function authorPosts($slug)
    {
        // $u = User::find(2);
        $user = User::where('slug',$slug)->first();
        // dd($user);
        $posts = Post::where('user_id',$user->id)->orderBy('created_at','desc')->paginate(5);

        return view('authorsposts')
        ->with('posts',$posts)
        ->with('user',$user)
        ->with('tags',$this->getAllTags())
        ->with('categories',$this->getAllCategories())
        ;
    }
}
