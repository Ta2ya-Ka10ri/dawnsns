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
{{ Form::text('bio',null,['class' => 'input']) }}
<br>

{{ Form::label('Icon Image') }}
{{ Form::text('icon image',null,['class' => 'input']) }}
<br>

<form action='updateForm'>
<input type="submit" value="更新">
</form>

{!! Form::close() !!}

@endsection