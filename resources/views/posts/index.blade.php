@extends('layouts.login')

@section('content')

<div class='container'>
    <h2 class='page-header'>新しく投稿をする</h2>
    <form action='post/create'>
        <div class="form-group">
            <textarea name="newPost" id="" cols="75" rows="2" placeholder="何をつぶやこうか....？"></textarea>
        </div>
        <input type="image" src="images/post.png" >
    </form>
</div>
@foreach($posts as $post)
    <img src="/images/{{$post->image}}" alt="">
    {{$post->username}}
    {{$post->post}}
    {{$post->created_at}}
    {!! Form::open(['url' => '/post/update']) !!}
    {!! Form::hidden('id', $post->id) !!}
    {!! Form::input('text', 'upPost', $post->post, ['required', 'class' => 'form-control']) !!}

    {!! Form::close() !!}
<a class="btn btn-danger" href="/post/{{ $post->id }}/delete" onclick="return confirm('こちらの投稿を削除してもよろしいでしょうか？')">
<input type="image" src="images/trash_h.png" >
</a>

<button class="modalopen"  data-target="modal01">
    <p class="post-name">
      <input type="image" src="images/edit.png" >
    </p>
  </button>
  <!-- 1つ目のモーダルの中身 -->
<div id="modal" class="modal-overlay">
  <div id="modal-content">
    <div class="modal-main js-modal" id="modal01">
      <div class="modal-inner">
        <div class="inner-content">
<p class="inner-text">
{{$post->post}}
{!! Form::open(['url' => '/post/update']) !!}
    {!! Form::hidden('id', $post->id) !!}
    {!! Form::input('text', 'upPost', $post->post, ['required', 'class' => 'form-control']) !!}
    <input type="image" src="images/edit.png" >
{!! Form::close() !!}
</p>
<p>
<button class="send-button modalClose">Close
</button>
</p>
        </div>
      </div>
    </div>
  </div>
</div>

<br>
@endforeach

@endsection