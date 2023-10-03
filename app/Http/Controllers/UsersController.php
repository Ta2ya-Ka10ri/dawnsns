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
        return view('users.search',['users'=>$users]);
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

        $newImage=$request->input('newImage');
        dd($newImage);
        DB::table('users')
        ->where('id', $id)
        ->update(
            ['image'=> $newImage]
        );
            return redirect('/profile');
    }

}