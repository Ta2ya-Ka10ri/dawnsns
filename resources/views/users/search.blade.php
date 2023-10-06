@extends('layouts.login')

@section('content')

<form action="result">
    <div class="form-group">
        <textarea name="keyword" username="" placeholder="ユーザー名"></textarea>
    </div>
    <input type="image" src="images/post.png" >
</form>

<p>検索ワード:</p>

@foreach($users as $user)
    <img src="/images/{{$user->image}}" alt="">
    {{$user->username}}
    @if($follows->contains($user->id))
    <form action='/un-follow'>
        <input name="id" value="{{$user->id}}" type="hidden">
        <input type="submit" value="フォローを外す">
    </form>
    @else
    <form action='/add-follow'>
        <input name="id" value="{{$user->id}}" type="hidden">
        <input type="submit" value="フォローする">
    </form>
    @endif
    <br>
@endforeach

@endsection