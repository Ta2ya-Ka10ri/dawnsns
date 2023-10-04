@extends('layouts.login')

@section('content')

<form action="user/update" method="post" enctype="multipart/form-data">
{{ csrf_field() }}
<img src="images/dawn.png">

{{ Form::label('UserName') }}
<input class="form-control" id="Auth::user()" value="{{Auth::user()->username}}" name="upUser" type="text">
<br>

{{ Form::label('MailAddress') }}
<input class="form-control" id="Auth::user()" value="{{Auth::user()->mail}}" name="upMail" type="text">
<br>

{{ Form::label('Password') }}
<input type="password" id="password" value=●●●●●●● name="password" type="text">
<br>

{{ Form::label('new Password') }}
{{ Form::text('password-confirm',null,['class' => 'input']) }}
<br>

{{ Form::label('Bio') }}
<input class="form-control" id="Auth::user()" value="{{Auth::user()->bio}}" name="newBio" type="text" style="width:200px;height:100px;">
<br>
{{ Form::label('Icon Image') }}
<input type="file" id="Auth::user()" name="post_img">
<br>

<button type="submit" class="btn btn-primary pull-right">更新</button>

@endsection