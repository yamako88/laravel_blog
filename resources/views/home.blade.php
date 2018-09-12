{{--@extends('layouts.app')--}}

{{--@section('content')--}}
{{--<div class="container">--}}
    {{--<div class="row">--}}
        {{--<div class="col-md-8 col-md-offset-2">--}}
            {{--<div class="panel panel-default">--}}
                {{--<div class="panel-heading">Dashboard</div>--}}

                {{--<div class="panel-body">--}}
                    {{--@if (session('status'))--}}
                        {{--<div class="alert alert-success">--}}
                            {{--{{ session('status') }}--}}
                        {{--</div>--}}
                    {{--@endif--}}

                    {{--You are logged in!--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
{{--</div>--}}
{{--@endsection--}}


@extends('layouts.default')
@section('content')

@if(!empty($notFound))
    <p>記事がありません</p>
@else

    @foreach($posts as $post)
        <article class="post">
            <header class="post-header">
                <h1 class="post-title">
                    {{--{{route('post.show',$post->title,$post->id)}}--}}
                    {{ $post->title }}
                </h1>
                <div class="clearfix">
                    <!-- explode ("区切り文字", "分割する文字列"); -->
                    <span class="left">投稿日：{{explode(' ',$post->created_at)[0]}}</span>
                    <span class="right label">{{$post->comment_count}} 個のコメント </span>
                </div>
            </header>
            <div class="post-content">
                <p>{{$post->read_more.' ...'}}</p>
                {{--{{route('post.show','続きを読む',$post->id)}}--}}
                <p><a href="{{ $post->id }}" class="btn btn-primary">続きを読む</a></p>
            </div>
            <footer class="post-footer">
                <hr>
            </footer>
        </article>
    @endforeach
    {{--{{$posts->links()}}--}}
@endif

@stop
