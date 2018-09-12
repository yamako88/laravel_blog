<!DOCTYPE html>
<html class="no-js" lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="stylesheet" href="./css/foundation.css">
    <link rel="stylesheet" href="./css/custom.css">
    <script src="./js/vendor/custom.modernizr.js"></script>
</head>
<body>
<div class="row main">
    <div class="small-12 large-12 column" id="masthead">
        <header>
            <nav class="top-bar" data-topbar>
                <ul class="title-area">
                    <!-- Title Area -->
                    <li class="name"></li>
                    <li class="toggle-topbar menu-icon"><a href="#"><span>メニュー</span></a></li>
                </ul>
                <section class="top-bar-section">
                    <ul class="left">
                        <li class="{{(strcmp(URL::full(), URL::to('/')) == 0) ? 'active' : ''}}"><a href="{{URL::to('/')}}">ホーム</a></li>
                    </ul>
                    {{--<ul class="right">--}}
                    {{--@if(Auth::check())--}}

                        {{--<!-- if文の解説：現在ページのliクラスにactiveを付加する -->--}}
                            {{--<li class="{{ (strpos(URL::current(), URL::to('admin/dash-board'))!== false) ? 'active' : '' }}">--}}
                                {{--<a href="admin/dash-board">ダッシュボード</a>--}}
                            {{--</li>--}}
                            {{--<li class="{{ (strpos(URL::current(), URL::to('logout'))!== false) ? 'active' : '' }}" >--}}
                                {{--<a href="logout">ログアウト</a>--}}
                            {{--</li>--}}
                        {{--@else--}}
                            {{--<li class="{{ (strpos(URL::current(), URL::to('login'))!== false) ? 'active' : '' }}">--}}
                                {{--<a href="login">ログイン</a>--}}
                            {{--</li>--}}
                        {{--@endif--}}
                    {{--</ul>--}}

                <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right right">
                        <!-- Authentication Links -->
                        @guest
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @else
                            {{--<li class="dropdown">--}}
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                {{--<ul class="dropdown-menu">--}}
                                    <li>
                                        <a href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                {{--</ul>--}}
                            {{--</li>--}}
                        @endguest
                    </ul>

                </section>
            </nav>
            <div class="sub-header">
                {{--<hgroup>--}}
                {{--<h1>{{HTML::link('/','Laravelブログ')}}</h1>--}}
                <h1><a href="/public">laravelブログ</a></h1>
                <h2>Laravelでブログ作成</h2>
                {{--</hgroup>--}}
            </div>
        </header>
    </div>
    <div class="row">
        {{--{{$main}}--}}
        @yield('content')
    </div>
    <div class="row">
        <div class="small-12 large-12 column">
            <footer class="site-footer"></footer>
        </div>
    </div>
</div>
<script src="./js/vendor/jquery.js"></script>
<script src="./js/foundation.min.js"></script>
<script>
    $(document).foundation();
</script>
</body>
</html>
