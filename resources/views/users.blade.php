@extends('layouts.default')
@section('content')

    @foreach($posts as $post)
        @if ($loop->first)
            <h2 class="post-listings">{{ $post->username }}さんの記事一覧</h2>
        @endif
    @endforeach
    @if(session()->has('message'))
        <div data-alert class="alert-box round">
            メッセージ：{{ session('message') }}
            <a href="#" class="close">&times;</a>
        </div>
    @endif
    <table>
        <thead>
        <tr>
            <th width="300">タイトル</th>
            <th width="120">編集</th>
            <th width="120">削除</th>
            <th width="120">閲覧</th>
            <th width="120">投稿者</th>
        </tr>
        </thead>
        <tbody>
        @foreach($posts as $post)
            @if($post->author_id === $user->id)
                <tr>
                    <td>{{$post->title}}</td>
                    <td><a href="{{ $post->id }}edit">Edit</a></td>
                    <td><a href="post/{{ $post->id }}/delete" onclick='return confirm("削除します。よろしいですか？");'>Delete</a></td>
                    <td><a href="{{ $post->id }}show">View</a></td>
                    <td>{{ $user->username }}</td>
                </tr>
            @else
                <tr>
                    <td>{{$post->title}}</td>
                    <td></td>
                    <td></td>
                    <td><a href="{{ $post->id }}show">View</a></td>
                    <td>{{ $post->username }}</td>
                </tr>
            @endif
        @endforeach
        </tbody>
    </table>

@stop
