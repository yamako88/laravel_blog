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

        <div id="reply">
            <h2>コメントを残す</h2>
            @if(Session::has('success'))
                <div data-alert class="alert-box round">
                    {{Session::get('success')}}
                    <a href="#" class="close">&times;</a>
                </div>
            @endif

            <form method="post" action="{{ $posts->id }}comment">
                {{ csrf_field() }}
            <div class="row">
                <div class="small-7 large-7 column">
                    <label for="comment">内容:</label>
                    <textarea class="form-control" id="bodyInput" rows="5" name="comment" value="{{ old('comment') }}"></textarea>
                </div>
            </div>
            @if($errors->any())
                @foreach($errors->all() as $error)
                    <div data-alert class="alert-box warning round">
                        {{$error}}
                        <a href="#" class="close">&times;</a>
                    </div>
                @endforeach
            @endif
                <button type="submit" class="button tiny radiu btn btn-primary">送信する</button>
            </form>
        </div>
</section>

@stop
