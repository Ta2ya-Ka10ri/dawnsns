@extends('layouts.login')

@section('content')

@if ($errors->any())
            @foreach ($errors->all() as $error)
                {{ $error }}
            @endforeach
@endif

<form action="user/update" method="post" enctype="multipart/form-data">
{{ csrf_field() }}
<img src="images/dawn.png">

{{ Form::label('UserName') }}
<input class="form-control" id="Auth::user()" value="{{Auth::user()->username}}" name="username" type="text">
<br>

{{ Form::label('MailAddress') }}
<input class="form-control" id="Auth::user()" value="{{Auth::user()->mail}}" name="mail" type="text">
<br>

{{ Form::label('Password') }}
<input type="password" id="Auth::user()" value= "{{Auth::user()->password}}" name="password" type="text">
<br>

{{ Form::label('new Password') }}
<input type="new password" id="password" value=●●●●●●● name="new password" type="text">
<br>

{{ Form::label('Bio') }}
<input class="form-control" id="Auth::user()" value="{{Auth::user()->bio}}" name="bio" type="text" style="width:200px;height:100px;">
<br>
{{ Form::label('Icon Image') }}
<input type="file" id="Auth::user()" name="image">
<br>

<button type="submit" class="btn btn-primary pull-right">更新</button>

@endsection