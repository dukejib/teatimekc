<?php

namespace App\Http\Controllers;

use App\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Foundation\Auth\User;
use App\Post;

class ProfileController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function validateProfile(Request $request)
    {
        $this->validate($request,[
            'jobtitle' => 'required',
            'about' => 'required',
            'facebook' => 'required|url',
            'twitter' => 'required|url',
            'gmail' => 'required|url',
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.profile')
        ->with('profile',Auth::user()->profile);
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
        $this->validateProfile($request);
        $profile = Profile::find($id);
        //Get Old Image
        $old_image = $profile->avatar;
        //Check if we have file and save it
        if($request->hasFile('avatar'))
        {
            $this->validate($request,[
                'avatar' => 'image|max:256|Mimes:jpeg,jpg,png,gif|dimensions:min_width=128,max_width=512'
            ]);
            $filename = $this->saveImageFile($request);
            $profile->avatar = 'uploads/avatars/' . $filename;
            //Delete the old image file from system
            $this->deleteOldImage($old_image);
        }
        //Now save the data
        $profile->about = $request->about;
        $profile->jobtitle = $request->jobtitle;
        $profile->facebook = $request->facebook;
        $profile->twitter = $request->twitter;
        $profile->gmail = $request->gmail;
        $profile->save();

        Session::flash('success','Profile updated');
        return redirect()->back();
    }

     /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        // dd(Auth::user()->profile);
        $user = User::where('slug',$slug)->first();
        $posts = Post::where('user_id',$user->id)->paginate(5);
        $profile = Profile::find($user->id);
        // dd($posts);
        return view('admin.users.show')
        ->with('user',$user)
        ->with('profile',$profile)
        ->with('posts',$posts)
        ;

    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function saveImageFile(Request $request)
    {
        $replace = [" ","_","^","/"];
        $with = ["-"];

        //Get the Image
        $avatar = $request->avatar;
    
        //Get Original Name 
        $avatar_new_name = strtolower(str_replace($replace,$with,time(). $avatar->getClientOriginalName()));
        //Store the Image with New Name
        $avatar->move('uploads/avatars/', $avatar_new_name);

        return $avatar_new_name;
    }

    public static function deleteOldImage($filename)
    {
        $file = pathinfo($filename,PATHINFO_BASENAME);

        if ($file == 'default_avatar.png')
        {
            return;
            // dd('THis is default file, would not delete it');
        }
        else {
            // dd('Not default file, proceed with deleting');
            unlink('uploads/avatars/' . $file);
        }
    }
}
