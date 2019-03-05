<?php

namespace App\Http\Controllers;

use App\Tag;
use App\Post;
use App\Category;
use App\Helpers\LogActivity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use App\Events\PostPublishedNotification;


class PostController extends Controller
{
   
    /*
    * Custom Validation For Post
    */
    public function validatePost(Request $request)
    {
        //Validation Messages
        $messages =  [
            'title.required' => 'Title for post is required',
            'title.min' => 'Title should be minimum 2 characters long',
            'title.max' => 'Title should be maximum 255 characters long',
            'content.required' => 'Content for post is required',
            'shortnote.required' => 'Shortnote for post is required',
            'tags.required' => 'Relevant Tag(s) are required with the Post',
        ];
        //Validate
        $this->validate($request,[
            'title' => 'required|min:2|max:255',
            'content' => 'required',
            'shortnote' => 'required',
            'category_id' => 'required',
            'tags' => 'required',
        ],$messages);
    }

    /*
    * Validate the Image Only
    */
    public function validateImage(Request $request)
    {
        //Validation Messages
        $messages =  [
            'featured.required' => 'Post Image is required',
            'featured.image' => 'Post Image should be an image file',
            'featured.mimes' => 'Post Image should be of file type: jpeg,jpg,png,gif',
            'featured.dimensions' => 'Image should be Maximum 800 pixels and Minimum 400 pixels wide',
        ];
        //Validate
        $this->validate($request,[
            'featured' => 'required|image|max:1024|mimes:jpeg,jpg,png,gif|dimensions:min_width=400,max_width=800',
        ],$messages);
    }

    /*
    * Publish the Post
    */
    public function publish($id)
    {
        $post = Post::find($id);
        $post->published = 1;
        $post->published_at = \Carbon\Carbon::now();
        $post->save();
        //Raise Event
        event(new PostPublishedNotification($post));

        Session::flash('success','Post Published');
        return redirect()->route('posts');
    }

    /*
    * Saves Post Image to Storage
    * Removes all the trailing slashes, spaces, underscores
    */
    public function saveImageFile(Request $request)
    {
        $replace = [" ","_","^","/"];
        $with = ["-"];

        //Get the Image
        $featured = $request->featured;
        
        //Get Original Name 
        $featured_new_name = strtolower(str_replace($replace,$with,time(). $featured->getClientOriginalName()));
        //Store the Image with New Name
        $featured->move('uploads/posts/', $featured_new_name);

        return $featured_new_name;
    }

    /*
    * Deletes old Images from Storeage
    */
    public function deleteOldImage($filename)
    {
        $file = pathinfo($filename,PATHINFO_BASENAME);
        unlink('uploads/posts/' . $file);
    }

    /*
    * Gets all Categories in Ascending Order
    */
    public function getCategories()
    {
        $categories = Category::orderBy('category','asc')->get();
        return $categories;
    }

    /*
    * Gets all Tags in Ascending Order
    */
    public function getTags()
    {
        $tags = Tag::orderBy('tag','asc')->get();
        return $tags;
    }

    /**
     * Display a listing of All Posts
     * dependent on the Admin privileges
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = '';
        // 99 is the Super Admin , 1 is The Main Admin
        if(Auth::user()->isAdmin == 99 || Auth::user()->isAdmin == 1)
        {
            //User is Super User - Send All Data
            $posts = Post::orderBy('created_at','desc')->paginate(10);
        }
        // 2 is normal Admin/User of Blog
        if(Auth::user()->isAdmin == 2)
        {
            //Normal User, send his/her Posts only
            $posts = Post::orderBy('created_at','desc')->where('user_id',Auth::id())->paginate(10);
        }

        return view('admin.posts.index')
        ->with('posts',$posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = $this->getTags();
        $categories = $this->getCategories();

        if (count($categories) == 0)
        {
            Session::flash('info','You must have a category before creating a Post');
            return redirect()->back();
        }

        if (count($tags) == 0)
        {
            Session::flash('info','You must have tags before creating a Post');
            return redirect()->back();
        }
        
        //All fine, proceed further
        return view('admin.posts.create')
        ->with('tags',$tags)
        ->with('categories',$categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $this->validatePost($request);
        $this->validateImage($request);
        //Save Image to Disk
        $featured_new_name = $this->saveImageFile($request);
        //If urdu is there or not
        //Save Post
        $post = new Post();
        $post->title = $request->title;
        $post->shortnote = $request->shortnote;
        $post->user_id = Auth::id();
        $post->content = $request->content;
        $post->category_id = $request->category_id;
        $post->featured = 'uploads/posts/' . $featured_new_name;
        $post->urdu = 0;
        //Get Urdu Check Box
        if($request->urdu)
        {
            $post->urdu = 1;
        }        
        $post->save();

        //Attached tag with Many to Many Relations- creates new tags
        // $post->tags()->attach($request->tags,['user_id' => Auth::id()]);
        $post->tags()->attach($request->tags);
        
        //Flash the Session & Redirect
        Session::flash('success','Post stored');
        return redirect()->back();
    }

    public function show($id)
    {
        $post = Post::find($id);
        return view ('admin.posts.show')
        ->with('post',$post);
        ;
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        // dd($post);
        return view('admin.posts.edit')
        ->with('categories',$this->getCategories())
        ->with('tags',$this->getTags())
        ->with('post',$post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $filename='';
        $this->validatePost($request);
        //Find the post
        $post = Post::find($id);
        // $old_title = $post->title;
        //Get old file name
        $oldFileName = $post->featured;
        //Check if the user has selected an image
        if($request->hasFile('featured'))
        {
            $this->validateImage($request);
            //Then Save It
            $filename =  $this->saveImageFile($request);
            $post->featured = 'uploads/posts/' . $filename;
            //Delete the old Image file from system
            $this->deleteOldImage($oldFileName);
        }
        //Now Save the Data
        $post->title = $request->title;
        $post->shortnote = $request->shortnote;
        $post->content = $request->content;
        $post->category_id = $request->category_id;
        $post->urdu = 0;
        //Get Urdu Check Box
        if($request->urdu)
        {
            $post->urdu = 1;
        } 
        $post->save();
        //Save the tags - replace with sync()
        $post->tags()->sync($request->tags);

        Session::flash('success','Post updated');
        return redirect()->route('posts');

    }

    public function trash($id)
    {
        $post = Post::find($id);
        $post->published = 0;
        $post->published_at = null;
        $post->save();
        //Now Delete
        $post->delete();

        Session::flash('success','Post is trashed');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Get the Trashed row from the table
        $post = Post::withTrashed()->where('id',$id)->first();
        $post_title = $post->title;
        //Delete the Image too TODO:
        // dd($post);
        $this->deleteOldImage($post->featured);
        $post->forceDelete();
   
        Session::flash('success','Post deleted permanently');
        return redirect()->back();
    }

    /*
    * Restore Soft Deleted Files 
    */
    public function restore($id)
    {
        //Get the Trashed row from the table
        $post = Post::withTrashed()->where('id',$id)->first();
        //Restore it
        $post->restore();

        Session::flash('success','Post restored');
        return redirect()->route('posts'); 
    }

    /*
    * Permanently Delete, soft deleted Posts
    */
    public function trashed()
    {
        $posts = Post::onlyTrashed()->paginate(8);
        return view('admin.posts.trashed')->with('posts',$posts);
    }
}
