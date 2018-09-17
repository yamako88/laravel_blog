@extends('layouts.default')
@section('content')

<h2 class="new-post">
    新規記事の作成
    <span class="right"><a href="home" class="button tiny radius">キャンセル</a></span>
</h2>
<hr>

<form method="post" action="save">
    {{ csrf_field() }}
    <div class="form-group">
        <label for="titleInput">タイトル</label>
        <input type="text" class="form-control" id="titleInput" name="title">
    </div>
    <div class="form-group">
        <label for="bodyInput">内容</label>
        <textarea class="form-control" id="bodyInput" rows="5" name="content"></textarea>
    </div>
    <button type="submit" class="button tiny radiu btn btn-primary">新規追加</button>
</form>

    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <div data-alert class="alert-box warning round">
                <li>{{ $error }}</li>
                <a href="#" class="close">&times;</a>
            </div>
        @endforeach
    @endif

@stop
