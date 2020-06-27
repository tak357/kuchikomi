<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') | クチラン</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha256-4+XzXVhsDmqanXGHaHvgh1gMQKX40OUvDEBTu8JcmNs=" crossorigin="anonymous"></script>
    <script src="/js/delete.js"></script>
</head>

<body>
<div class="container">
    <header>
        <h1><a href="/">クチラン！<span class="subtitle">〜最強口コミランキング〜</span></a></h1>
        <nav>
            <ul>
                @if (Route::has('login'))
                    @auth
                        <li><a href="{{ url('/items/create') }}">商品登録</a></li>
                        <li><a href="{{ url('categories/create') }}">カテゴリー登録</a></li>
                        <li><a href="{{ route('register') }}">管理者登録</a></li>
                        <li><a href="{{ url('users') }}">管理者一覧</a></li>
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
                        <li><a href="{{ route('form') }}">お問い合わせ</a></li>
                    @endauth
                @endif
            </ul>
        </nav>
    </header>

    <div class="row">
        <div class="col-sm-9">

            <main>
                @yield('content')
            </main>

        </div>

        <aside class="col-sm-3">
            <h2 class="head-gray">サイト内検索</h2>
            <div class="form-group">
                <form action="{{ action('ItemController@search') }}" method="get">
                    @csrf
                    <input class="form-control" type="search" name="search_keyword" id="search_keyword"
                                placeholder="キーワードを入力">
                    <button class="btn btn-primary" id="search_btn">検索する</button>
                </form>
            </div>
            <h2 class="head-gray">カテゴリー</h2>

            <div class="category">
                <a href="{{ url('categories/') }}">カテゴリートップ</a>
            </div>
            @foreach(\App\Models\Category::all() as $category)
                <div class="category">
                    <a href="/categories/{{ $category->id }}">
                        - {{ $category->title }}
                    </a>
                </div>
            @endforeach

            <h2 class="head-gray">クチコミ人気ランキング</h2>
            @forelse(\App\Models\Item::KuchkomiRankingOutput() as $ranking_item)
                <p class="ranking-header">第{{ $loop->iteration }}位：{{ number_format($ranking_item->kuchikomi_avg_score,2) }}点({{ $ranking_item->kuchikomi_count }})</p>
                <div class="ranking">
                    <a href="{{ url('items/' . $ranking_item->id) }}">
                        <img src="{{ asset('storage/' . $ranking_item->item_image) }}"
                             alt="{{ $ranking_item->item_name }}の画像">
                    </a>
                    <p><a href="{{ url('items/' . $ranking_item->id) }}">{{ $ranking_item->item_name }}</a></p>
                </div>
            @empty
                <p>まだクチコミはありません</p>
            @endforelse

            <h2 class="head-gray">広告</h2>
            <div class="ad">
                <a href="https://mobile.rakuten.co.jp/" target="_blank">
                    <img src="{{ asset('storage/ad_sample.png') }}" width="100%" alt="広告">
                </a>
            </div>
        </aside>

        <footer>
            <p>copyright <a href="/">クチラン</a> 2020</p>
        </footer>

    </div>
</div>
</body>

</html>