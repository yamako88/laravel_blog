@extends('layouts.default')
@section('content')

<article class="post">
    <header class="post-header">
        <h1 class="post-title">
            {{$posts->title}}
        </h1>
        <div class="clearfix">
            <span class="left date">{{explode(' ',$posts->created_at)[0]}}</span>
            <span class="right label"><a href="#reply" style="color:inherit">コメントする</a></span>
        </div>
    </header>
    <div class="post-content">
        <p>{{ $posts->content }}</p>
    </div>
    <footer class="post-footer">
        <hr>
    </footer>
</article>
<section class="comments">
    @if(!$comments->isEmpty())
        <h2>{{$posts->title}}のコメント一覧</h2>
        <ul>
            @foreach($comments as $comment)
                <li>
                    <article>
                        <header>
                            <div class="clearfix">
                                <span class="right date">{{explode(' ',$comment->created_at)[0]}}</span>
                                <span class="left commenter">{{$comment->commenter}}</span>
                            </div>
                        </header>
                        <div class="comment-content">
                            <p>{{{$comment->comment}}}</p>
                        </div>
                        <footer>
                            <hr>
                        </footer>
                    </article>
                </li>
            @endforeach
        </ul>
    @else
        <h2>{{$posts->title}}にコメントはありません</h2>
    @endif
</section>

@stop
