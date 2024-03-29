<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\DB;

class PostsController extends Controller
{
    //
    public function index()
    {
        $user = Auth::user();
        $posts = DB::table('posts')
        ->join('users','posts.user_id','=','users.id')
        ->where('posts.user_id',Auth::id())
        ->select('users.id','users.image','users.username','posts.post','posts.created_at as created_at')
        ->get();
        // dd($posts);
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

    public function delete($id)
    {
        DB::table('posts')
            ->where('id', $id)
            ->delete();
        return redirect('/top');
    }

}
