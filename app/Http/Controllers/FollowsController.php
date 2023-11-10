<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class FollowsController extends Controller
{
    public function followList()
    {
        $user = Auth::user();
        $follow_count = DB::table('follows')
        ->where('follower_id',Auth::id())
        ->count();
        // dd($follow_count);
        $others = DB::table('users')
        ->join('follows','follows.follow_id','=','users.id')
        ->where('follows.follower_id',Auth::id())
        ->select('users.image','users.id')
        ->get();
        // dd($others);
        $posts = DB::table('posts')
        ->join('users','posts.user_id','=','users.id')
        ->join('follows','follows.follow_id','=','users.id')
        ->where('follows.follower_id',Auth::id())
        ->select('users.id','users.username','users.image','posts.post','posts.created_at','posts.user_id','follows.id','follows.follow_id')
        ->get();
        return view('follows.followList',['user'=>$user,'posts'=>$posts,'others'=>$others,'follow_count'=>$follow_count]);
    }

    public function addFollow(Request $request)
    {
        $newPost = $request->id;
        DB::table('follows')->insert([
            'follow_id' => $newPost,
            'follower_id' => Auth::id()
        ]);
        return redirect('/search');
    }

    public function unFollow(Request $request)
    {
        $id = $request->id;
        $follows = DB::table('follows')
            ->where('follow_id', $id)
            ->where('follower_id', Auth::id())
            ->delete();
        return redirect('/search');
    }

}