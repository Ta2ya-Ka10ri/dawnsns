<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\DB;

class PostsController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $posts = DB::table('posts')
        ->join('users','posts.user_id','=','users.id')
        ->where('posts.user_id',Auth::id())
        ->select('posts.id','users.image','users.username','posts.post','posts.created_at as created_at')
        ->get();
        return view('posts.index',['user'=>$user,'posts'=>$posts]);
    }

    public function create(Request $request)
    {
        $newPost=$request->newPost;
        DB::table('posts')->insert([
            'user_id' => Auth::id(),
            'post' => $newPost,
            'created_at' => now()
        ]);

        return redirect('/top');
    }

    public function update(Request $request)
    {
        $id = $request->input('id');
        $up_post = $request->input('upPost');
        DB::table('posts')
            ->where('id', $id)
            ->update(
                ['post' => $up_post]
            );

        return redirect('/top');
    }

    public function delete($id)
    {
        DB::table('posts')
            ->where('id', $id)
            ->delete();
        return redirect('/top');
    }

    public function profile()
    {
        $users = DB::table('users')
        ->where('users.id',Auth::id())
        ->select('users.id','users.username','users.mail','users.password','users.bio','users.image','users.created_at as created_at')
        ->first();
        return view('users.profile',['users'=>$users]);
    }

    public function followerList()
    {
        $user = Auth::user();
        $follower_count = DB::table('follows')
        ->where('follow_id',Auth::id())
        ->count();
        // dd($follower_count);
        $others = DB::table('users')
        ->join('follows','follows.follower_id','=','users.id')
        ->where('follows.follow_id',Auth::id())
        ->select('users.image','users.id')
        ->get();
        $posts = DB::table('posts')
        ->join('users','posts.user_id','=','users.id')
        ->join('follows','follows.follower_id','=','users.id')
        ->where('follows.follow_id',Auth::id())
        ->select('users.id','users.username','users.image','posts.post','posts.created_at','posts.user_id','follows.id','follows.follower_id')
        ->get();
        return view('follows.followerList',['user'=>$user,'posts'=>$posts,'others'=>$others,'follower_count'=>$follower_count]);
    }

}
