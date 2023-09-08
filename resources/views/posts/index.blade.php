@extends('layouts.login')

@section('content')

<div class='container'>
    <h2 class='page-header'>新しく投稿をする</h2>
    <form action='post/create'>
        <div class="form-group">
            <textarea name="newPost" id="" cols="30" rows="10" placeholder="何をつぶやこうか....？"></textarea>
        </div>
        <input type="image" src="images/post.png" >
    </form>
</div>
@foreach($posts as $post)
    <img src="/images/{{$post->image}}" alt="">
    {{$post->username}}
    {{$post->post}}
    {{$post->created_at}}
    <a class="btn btn-primary" href="/post/{{ $post->id }}/update-form">
    <input type="image" src="images/edit.png" >
    </a>
    <a class="btn btn-danger" href="/post/{{ $post->id }}/delete" onclick="return confirm('こちらの投稿を削除してもよろしいでしょうか？')">
    <input type="image" src="images/trash_h.png" >
</a>
<br>
@endforeach

@endsection
