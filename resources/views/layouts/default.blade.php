<!DOCTYPE html>
<html class="no-js" lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="stylesheet" href="css/foundation.css">
    <link rel="stylesheet" href="./css/custom.css">
    <script src="../js/vendor/custom.modernizr.js"></script>
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
                        <li class="{{(strcmp(URL::full(), URL::to('/')) == 0) ? 'active' : ''}}"><a href="{{URL::to('/home')}}">ホーム</a></li>
                    </ul>
                <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right right">
                        <!-- Authentication Links -->
                        @guest
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @else
                            <li><a>ようこそ、{{ Auth::user()->username }}さん</a></li>
                            <li><a href="new">投稿</a></li>
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
                        @endguest
                    </ul>
                </section>
            </nav>
            <div class="sub-header">
                <h1><a href="/public">laravelブログ</a></h1>
                <h2>Laravelでブログ作成</h2>
            </div>
        </header>
    </div>

    <div class="small-9 large-9 column">
        <div class="content">
            <div class="row">
                @yield('content')
            </div>
        </div>
    </div>
    <div class="row">
        <div class="small-12 large-12 column">
            <footer class="site-footer"></footer>
        </div>
    </div>

<script src="./js/vendor/jquery.js"></script>
<script src="./js/foundation.min.js"></script>
<script>
    $(document).foundation();
</script>
</body>
</html>
