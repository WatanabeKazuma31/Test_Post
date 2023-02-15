@extends('layouts.app')

@section('content')
<div class="container">
  <h1 class='title'>Blogs Top</h1>

  <div class="box1">
    <div class="button_file">
          <p class="create"><a href="/create-form" class="btn-create">新規投稿記事作成</a></p>
    </div>

    <div class="search">
      <form action="{{ '/search' }}" method="get">
        <input type="text" class="search_box" name="keyword" placeholder="ブログ検索">
        <input type="submit" value="検索">
      </form>
    </div>

  </div>

  <table class="blog_table">
   <tr class="table_title">
      <th>Name</th>
      <th>Content</th>
      <th>Created</th>
      <th></th>
      <th></th>
   </tr>

   @if(!$list->isEmpty())
   @foreach ($list as $list)
    <tr class="table_item">
       @csrf
      <td>{{ $list->user_name }}</td>
      <td>{{ $list->contents }}</td>
      <td>{{ $list->update_at }}</td>
      <td><button><a href="/post/{{ $list->id }}/update-form">更新</a></button></td>
      <td><button><a href="/post/{{ $list->id }}/delete" onclick="return confirm('この投稿を削除します。よろしいですか？')">削除</a></button></td>
    </tr>
   @endforeach
 </table>
 @else
   <p class="error_msg">検索結果は０件です</p>
 @endif

</div>
@endsection
