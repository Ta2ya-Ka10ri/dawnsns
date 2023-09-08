<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\DB;

class UsersController extends Controller
{
    public function profile()
    {
        $users = DB::table('users')
        ->where('users.id',Auth::id())
        ->select('users.id','users.username','users.mail','users.password','users.bio','users.image','users.created_at as created_at')
        ->first();
        return view('users.profile',['users'=>$user,'posts'=>$posts]);
    }

    public function search(Request $request)
    {
        $users = DB::table('users')
        ->get();
        // dd($users);
        return view('users.search',['users'=>$users]);
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

    public function upProfile()
    {
        DB::table('users')->insert([
            'username' => Auth::id(),
            'mail' => Auth::id(),
            'password' =>Auth::id(),
            'bio' => $newPost,
            'image' =>$newPost,
            'created_at' => now()
            ]);
            return redirect('/profile');
    }

}