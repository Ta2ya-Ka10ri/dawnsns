<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class UsersController extends Controller
{
    public function search(Request $request)
    {
        $users = DB::table('users')
        ->get();
        $follows = DB::table('follows')
        ->where('follower_id',Auth::id())
        ->pluck('follow_id');
        $keyword = null;
        // dd($keyword);
        return view('users.search',['users'=>$users,'follows'=>$follows,'keyword'=>$keyword]);
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
        return view('users.search',['users'=>$users,'follows'=>$follows,'keyword'=>$keyword]);
    }

    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required|string|min:4|max:12',
            'mail' => 'required|string|min:4|max:12|'.Rule::unique('users')->ignore(Auth::id()),
            'bio' => 'max:200',
            'image' => 'image',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
            ->withInput()
            ->withErrors($validator);
        }

        $id = Auth::id();
        $up_user = $request->input('username');
        // dd($up_user);
        DB::table('users')
            ->where('id', $id)
            ->update(
                ['username'=> $up_user]
            );
        $up_mail = $request->input('mail');
        // dd($up_mail);
        DB::table('users')
        ->where('id', $id)
        ->update(
            ['mail'=> $up_mail]
        );

        $up_password = $request->input('password');
        if(isset($up_password)){
            $validator = Validator::make($request->all(), [
                'password' => 'string|min:4|max:12|unique:users',
            ]);

            if ($validator->fails()) {
                return redirect()->back()
                ->withInput()
                ->withErrors($validator);
            }
            // dd($up_password);
            DB::table('users')
            ->where('id', $id)
            ->update(
                ['password'=> bcrypt($up_password)]
            );
        }

        $bio=$request->input('bio');
        // dd($bio);
        DB::table('users')
        ->where('id', $id)
        ->update(
            ['bio'=> $bio]
        );

        $image_name=$request->file('image')->getClientOriginalName();
        // dd($image_name);
        DB::table('users')
        ->where('id', $id)
        ->update(
            ['image'=> $image_name]
        );
        $request->file('image')->storeAs('public/img', $image_name);
            return redirect('/profile');
    }

    public function profile($id)
    {
        // dd($id);
        $users = DB::table('users')
        ->where('users.id',$id)
        ->first();

        $posts = DB::table('posts')
        ->join('users','posts.user_id','=','users.id')
        ->where('posts.user_id',$id)
        ->select('posts.id','users.image','users.username','posts.post','posts.created_at as created_at')
        ->get();

        $follows = DB::table('follows')
        ->where('follower_id',Auth::id())
        ->pluck('follow_id');

        return view('users.followProfile',
        ['users'=>$users,'posts'=>$posts,'follows'=>$follows]);
    }

    public function addFollow(Request $request)
    {
        $newPost = $request->id;
        DB::table('follows')->insert([
            'follow_id' => $newPost,
            'follower_id' => Auth::id()
        ]);
        return redirect('/follow-profile');
    }

    public function unFollow(Request $request)
    {
        $id = $request->id;
        $follows = DB::table('follows')
            ->where('follow_id', $id)
            ->where('follower_id', Auth::id())
            ->delete();
        return redirect('/follow-profile');
    }

}