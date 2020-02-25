<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>クチラン</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
<div class="container">
    <header>
        <h1><a href="/">クチラン！<span class="subtitle">〜最強口コミランキング〜</span></a></h1>
        <nav>
            <ul>
                @if (Route::has('login'))
                    @auth
                        <li><a href="{{ url('/items/create') }}">商品を登録する</a></li>
                        <li><a href="{{ route('logout') }}"
                               onclick="event.preventDefault();document.getElementById('logout-form').submit();">ログアウト</a>
                        </li>
                        <form action="{{ route('logout') }}" method="post" id="logout-form" style="display: none;">
                            @csrf
                        </form>

                    @else
                        <li>
                            <form action="{{ route('login') }}" method="POST" class="">
                                @csrf
                                <input type="hidden" name="email" value="test@example.jp">
                                <input type="hidden" name="password" value="password">
                                <button type="submit" class="">テストログイン</button>
                            </form>
                        </li>

                        <li><a href="{{ route('login') }}">管理者ログイン</a></li>
                        @if (Route::has('register'))
                            <li><a href="{{ route('register') }}">管理者登録</a></li>
                        @endif
                    @endauth
                @endif
            </ul>
        </nav>
    </header>

    <div class="row">
        <div class="col-9">

            <main>
                @yield('content')
            </main>

            <footer>
                <p>copyright <a href="/">クチラン</a> 2020</p>
            </footer>
        </div>

        <aside class="col-3">
            <h2 class="head-gray">検索フォーム</h2>
            <div class="form-group">
                <form action="#">
                    @csrf
                    <input class="form-control" type="text" name="search" id="search">
                    <button class="btn btn-primary">検索する</button>
                </form>
            </div>
            <h2 class="head-gray">広告</h2>
            <div class="ad"><img src="storage/ad_sample.png" width="100%" alt=""></div>
        </aside>

    </div>
</div>
</body>

</html>