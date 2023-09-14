@extends('layouts.login')

@section('content')

{!! Form::open() !!}

{{ Form::label('UserName') }}
{{ Form::text('username',null,['class' => 'input']) }}

{{ Form::label('MailAdress') }}
{{ Form::text('mail',null,['class' => 'input']) }}

{{ Form::label('Password') }}
{{ Form::text('password',null,['class' => 'input']) }}

{{ Form::label('new Password') }}
{{ Form::text('password-confirm',null,['class' => 'input']) }}

{{ Form::label('Bio') }}
{{ Form::text('bio',null,['class' => 'input']) }}

{{ Form::label('Icon Image') }}
{{ Form::text('icon image',null,['class' => 'input']) }}

<br>

{{ Form::submit('更新') }}

{!! Form::close() !!}

@endsection