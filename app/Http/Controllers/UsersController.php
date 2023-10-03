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

    public function update(Request $request)
    {
        $id = $request->input('id');
        $up_user = $request->input('upUser');
        DB::table('users')
            ->where('id', $id)
            ->update(
                ['user' => $up_user]
            )
            ->first();
            return redirect('/top');
    }

    public function savenew(Request $request){

        $user = new Form;
        $user->title = $request->title;
        $user->main = $request->main;
        $user->save();

if($request->user_img){

    if($request->user_img->extension() == 'gif' || $request->user_img->extension() == 'jpeg' || $request->user_img->extension() == 'jpg' || $request->user_img->extension() == 'png'){
    $request->file('user_img')->storeAs('public/user_img', $user->id.'.'.$request->user_img->extension());
    }
}
            return redirect('/top');
    }

}