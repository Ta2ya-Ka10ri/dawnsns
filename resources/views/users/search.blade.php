@extends('layouts.login')

@section('content')

<form action="result">
    <div class="form-group">
        <textarea name="keyword" username="" cols="30" rows="10" placeholder="ユーザー名"></textarea>
        <!-- 検索ワード -->
    </div>
    <input type="image" src="images/post.png" >
</form>

@foreach($users as $user)
    <img src="/images/{{$user->image}}" alt="">
    {{$user->username}}
    <form action='/add-follow'>
        <input name="id" value="{{$user->id}}" type="hidden">
        <input type="submit" value="フォローする">
    </form>
    <form action='/un-follow'>
        <input name="id" value="{{$user->id}}" type="hidden">
        <input type="submit" value="フォローを外す">
    </form>
    <br>
@endforeach

@endsection