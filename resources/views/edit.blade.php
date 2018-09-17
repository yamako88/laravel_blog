@extends('layouts.default')
@section('content')

<h2 class="edit-post">
    記事の編集
    <span class="right"><a href="home" class="button tiny radius">キャンセル</a></span>
</h2>
<hr>

<form method="post" action="{{ $posts->id }}update">
    {{ csrf_field() }}
<div class="row">
    <div class="small-5 large-5 column">
        <label for="title">タイトル</label>
        <input type="text" class="form-control" id="titleInput" name="title" value="{{ $posts->title }}">
    </div>
</div>
<div class="row">
    <div class="small-7 large-7 column">
        <label for="content">本文</label>
        <textarea class="form-control" id="bodyInput" rows="5" name="content">{{ $posts->content }}</textarea>
    </div>
</div>

    @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <div data-alert class="alert-box warning round">
                    <li>{{ $error }}</li>
                        <a href="#" class="close">&times;</a>
                    </div>
                @endforeach
    @endif

    <button type="submit" class="button tiny radius btn btn-primary">更新する</button>
</form>

@stop
