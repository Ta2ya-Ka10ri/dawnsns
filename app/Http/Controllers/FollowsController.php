<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;

class FollowsController extends Controller
{

    public function followList()
    {
        $user = Auth::user();
        $posts = DB::table('posts');
        $follows = DB::table('follows')
        ->join('users','posts.user_id','=','users.id')
        ->join('users','follows.follow_id','=','users.id')
        ->where('posts.user_id',Auth::id())
        ->where('follows.follow_id',Auth::id())
        ->select('users.id','posts.post','follows.id','follows.follow_id')
        ->get();
        return view('follows.followList',['user'=>$user,'posts'=>$posts,'follows'=>$follows]);
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