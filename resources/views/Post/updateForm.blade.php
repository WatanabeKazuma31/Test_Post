@extends('layouts.app')

@section('content')
<div class="container">
  <h1 class="title">UpdateForm</h1>

  <form action="/post/update" class="form-group" method="post">
    @csrf
      <input type="hidden" name="id" value="{{ $post->id }}">
      <input type="text" class="name-box" name="upName" value="{{ $post->user_name }}">
      @if($errors->has('upName'))
      <p class="v-msg">{{ $errors->first('upName') }}</p>
      @endif
      <textarea name="upPost" class="form-control">{{ $post->contents}}</textarea>
      @if($errors->has('upPost'))
      <p class="v-msg">{{ $errors->first('upPost') }}</p>
      @endif
      <button class="sub-button" type="submit">更新する</button>
  </form>

  <div class="top button_file">
    <a href="/index">TOPへ戻る</a>
  </div>

</div>

@endsection
