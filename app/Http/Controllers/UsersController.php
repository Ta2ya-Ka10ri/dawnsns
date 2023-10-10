<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\DB;

class UsersController extends Controller
{
    public function search(Request $request)
    {
        $users = DB::table('users')
        ->get();
        $follows = DB::table('follows')
        ->where('follower_id',Auth::id())
        ->pluck('follow_id');
        // dd($follows);
        return view('users.search',['users'=>$users,'follows'=>$follows]);
    }

    public function result(Request $request)
    {
        $keyword=$request->keyword;
        // dd($keyword);
        $users = DB::table('users')
        ->where('username', 'like', '%' . $keyword . '%')
        ->get();
        // dd($users);
        $follows = DB::table('follows')
        ->where('follower_id',Auth::id())
        ->pluck('follow_id');
        return view('users.search',['users'=>$users,'follows'=>$follows]);
    }

    public function getIndex(Request $request)
    {
        //キーワード受け取り
            $keyword = $request->input('keyword');

            return view('users.search')->with('keyword',$keyword);
        }

    public function update(Request $request)
    {
        $id = Auth::id();
        $up_user = $request->input('upUser');
        // dd($up_user);
        DB::table('users')
            ->where('id', $id)
            ->update(
                ['username'=> $up_user]
            );
        $up_mail = $request->input('upMail');
        // dd($up_mail);
        DB::table('users')
        ->where('id', $id)
        ->update(
            ['mail'=> $up_mail]
        );

        $newBio=$request->input('newBio');
        // dd($newBio);
        DB::table('users')
        ->where('id', $id)
        ->update(
            ['bio'=> $newBio]
        );

        $newImage=$request->file('newImage');
        dd($newImage);
        DB::table('users')
        ->where('id', $id)
        ->update(
            ['image'=> $newImage]
        );
            return redirect('/profile');
    }

    public function profile()
    {
        $users = DB::table('users')
        ->where('users.id',Auth::id())
        ->select('users.id','users.username','users.mail','users.password','users.bio','users.image','users.created_at as created_at')
        ->first();

        $user = Auth::user();
        $others = DB::table('users')
        ->join('follows','follows.follow_id','=','users.id')
        ->where('follows.follower_id',Auth::id())
        ->select('users.image')
        ->first();

        return view('users.follow profile',
        ['users'=>$users,'others'=>$others]);
    }

    public function index()
    {
        $user = Auth::user();
        $posts = DB::table('posts')
        ->join('users','posts.user_id','=','users.id')
        ->where('posts.user_id',Auth::id())
        ->select('posts.id','users.image','users.username','posts.post','posts.created_at as created_at')
        ->get();
        return view('users.follow profile',['user'=>$user,'posts'=>$posts]);
    }

}