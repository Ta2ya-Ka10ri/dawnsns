<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class FollowsController extends Controller
{

    public function followList()
    {
        $follows = DB::table('follows')
            ->get();
        return view('follows.followList');
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