@extends('layouts.login')

@section('content')

{!! Form::open() !!}

<img src="images/dawn.png">

{{ Form::label('UserName') }}
<input class="form-control" id="Auth::user()" placeholder={{Auth::user()->username}} name="Auth::user()" type="text">
<br>

{{ Form::label('MailAddress') }}
<input class="form-control" id="Auth::user()" placeholder={{Auth::user()->mail}} name="Auth::user()" type="text">
<br>

{{ Form::label('Password') }}
<input type="password" id="password" placeholder=●●●●●●● name="password" type="text">
<br>

{{ Form::label('new Password') }}
{{ Form::text('password-confirm',null,['class' => 'input']) }}
<br>

{{ Form::label('Bio') }}
<textarea name="main" cols="40" rows="10"></textarea>
<br>

<form action="/newpostsend" method="post" enctype="multipart/form-data">
    <p>&nbsp;</p>

    <p>&nbsp;</p>
    <p>画像をアップロード</p>
    <input type="file" name="post_img">

</form>
<br>

<button type="submit" class="btn btn-primary pull-right">更新</button>

{!! Form::close() !!}

@endsection