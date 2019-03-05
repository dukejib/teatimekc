<?php

namespace App\Http\Controllers;

use App\Log;
use App\Tag;
use App\Post;
// use Illuminate\Support\Facades\Request;
use App\Category;
use App\PostView;
use App\RegisterToken;
use Illuminate\Support\Str;
use App\Helpers\LogActivity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Events\InviteNewMemberNotification;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    /** Helper Functions */
    public function getTagsCount()
    {
        return Tag::all()->count();
    }
    public function getCategoriesCount()
    {
        return Category::all()->count();
    }
    public function getPostsCount()
    {
        if (Auth::user()->isAdmin  == 2)
        {
            return Post::where('user_id',Auth::id())->where('published',1)->get()->count();
        }
        return Post::where('published',1)->count();
    }
    public function getPendingPostsCount()
    {
        if (Auth::user()->isAdmin  == 2)
        {
            return Post::where('user_id',Auth::id())->where('published',0)->where('deleted_at',null)->get()->count();
        }
        return Post::where('published',0)->count();
    }
    public function getMembersCount()
    {
        return User::all()->count() -1 ;
    }
    public function getPostsViewsCount()
    {
        return PostView::all()->count();
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = DB::select('CALL TopTenPosts');
        $dailyviews = DB::select('CALL GetViewsPerDay');
        $uniqueviews = DB::select('CALL GetDailyUniqueUsersBasedOnIp');
        // $uniqueusers
        
        $posts = collect($posts);
        // $dailyviews = collect($dailyviews);
       
        // dd($dailyviews[0]->the_date);

        return view('admin.dashboard')
        ->with('posts',$posts)
        ->with('dailyviews',$dailyviews)
        ->with('uniqueviews',$uniqueviews)
        ->with('tagscount',$this->getTagsCount())
        ->with('catcount',$this->getCategoriesCount())
        ->with('postscount',$this->getPostsCount())
        ->with('pendingcount',$this->getPendingPostsCount())
        ->with('memberscount',$this->getMembersCount())
        ->with('viewscount',$this->getPostsViewsCount())
        ;
    }

    public function logActivity()
    {
        $logs = LogActivity::logActivityClass();
        return $logs;
    }

    public function addToLog()
    {
        LogActivity::addToLog("Testing Log");
        dd('Inserted');
    }

    public function logs()
    {
        return view('admin.logs.index')->with('logs',Log::orderBy('created_at','desc')->paginate(5));
    }

    public function deleteLog($id)
    {
        Log::destroy($id);
        return redirect()->back();
    }

    /**
    * Used to Invite a user to Register with Domain
    * @param  \Illuminate\Http\Request  $request->emailid
    * @return \Illuminate\Http\Response
    */
    public function invite(Request $request)
    {
		// dd($request->all());
		$this->validate($request,[
			'emailid' => 'required|email'
        ]);
        //Register Token
        $regToken = RegisterToken::getRegisterToken($request->emailid);

        //Raise The Event
        event(new InviteNewMemberNotification($regToken));
        //RegisterToken - Unique

        Session::flash('success','Invitation sent to ' . $request->emailid );
        return redirect()->back();
    }

}
