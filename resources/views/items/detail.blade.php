@extends('layouts.app')

@section('title')
    {{ $item->item_name }}} の詳細ページ
@endsection

@section('content')

    {{--フラッシュメッセージ--}}
    @if (session('flash_message'))
        <div class="flash_message">
            <div class="alert alert-success">
                {{ session('flash_message') }}
            </div>
        </div>
    @endif

    {{--クチコミフォームのエラーメッセージ--}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{--商品登録者がログイン中のみ記事編集・記事削除メニューを表示する--}}
    @auth
        @if (Auth::user()->id === $item->user_id)
            <a class="del item_detail_menu" href="#" data-id="{{ $item->id }}" id="item_del">[記事削除]</a>
            <form method="post" action="/items/{{ $item->id }}/" id="item_form_{{$item->id}}">
                @csrf
                {{ method_field('delete') }}
            </form>
            <a class="item_detail_menu" href="/items/{{ $item->id }}/edit">[記事編集]</a>
        @endif
        {{--投稿者を表示する--}}
        <p class="item_detail_menu">商品登録者：{{ $item_creator->name }}（ID:{{ $item->user_id }}）</p>
    @endauth
    <div class="clearfix"></div>
    <h2 class="head-gray">{{ $item->item_name }}</h2>
    <div class="item">
        <img class="mb-2" src="{{ asset('storage/' . $item->item_image) }}" alt="{{ $item->item_name }}の画像">
        <p>参考価格：<span class="text-danger font-weight-bold">{{ number_format($item->price) }}</span>円</p>
        @if ($item->kuchikomi_avg_score != 0)
            <p>クチコミ平均点：<span class="text-danger"> {{ number_format($item->kuchikomi_avg_score,2) }} </span>点</p>
        @else
            <p>クチコミ平均点：なし</p>
        @endif
    </div>

    <h2 class="head-gray">{{ $item->item_name }}のクチコミ</h2>
    @forelse ($kuchikomis as $kuchikomi)
        <div class="kuchikomi">
            {{--クチコミ削除機能（管理者のみ実行可能）--}}
            @auth
                <form method="post" action="/kuchikomis/{{ $kuchikomi->id }}/" id="kuchikomi_form">
                    @csrf
                    {{ method_field('delete') }}
                    <a class="del item_detail_menu" href="javascript:void(0)" onclick="this.parentNode.submit()">[クチコミ削除]</a></form>
            @endauth

            <table>
                <tr>
                    <th>投稿日：</th>
                    <td>{{ $kuchikomi->created_at->format('Y年m月d日 H時i分') }}</td>
                </tr>
                <tr>
                    <th>投稿者：</th>
                    <td>{{ $kuchikomi->name }}</td>
                </tr>
                <tr>
                    <th>スコア：</th>
                    <td>
                        @switch($kuchikomi->score)
                            @case(1)
                            <span class="text-primary">★☆☆☆☆</span>（{{ $kuchikomi->score }}点）
                            @break
                            @case(2)
                            <span class="text-primary">★★☆☆☆</span>（{{ $kuchikomi->score }}点）
                            @break
                            @case(3)
                            <span class="text-primary">★★★☆☆</span>（{{ $kuchikomi->score }}点）
                            @break
                            @case(4)
                            <span class="text-primary">★★★★☆</span>（{{ $kuchikomi->score }}点）
                            @break
                            @case(5)
                            <span class="text-primary">★★★★★</span>（{{ $kuchikomi->score }}点）
                            @break
                        @endswitch
                    </td>
                </tr>
                <tr>
                    <th>本文　：</th>
                    <td>{!! nl2br($kuchikomi->body) !!}</td>
                </tr>
            </table>
        </div>
    @empty
        <div class="kuchikomi">
            <p>クチコミはありません</p>
        </div>
    @endforelse

    <h2 class="head-gray">{{ $item->item_name }}のクチコミを書く</h2>
    <div class="item">
        <form method="post" action=" {{ action('KuchikomiController@store', 'aaa') }} ">
            @csrf
            <input type="hidden" name="item_id" value="{{ $item->id }}">
            <label for="comment_user_name">名前</label><span class="text-danger ml-2">必須</span>
            <input type="text" name="comment_user_name" id="comment_user_name" class="form-control"
                   value="{{ old('comment_user_name') }}">
            <label for="comment_user_email">Eメールアドレス</label><span class="ml-2">任意</span>
            <input type="text" name="comment_user_email" id="comment_user_email" class="form-control">
            <label for="score">点数（５段階）</label><span class="text-danger ml-2">必須</span>
            <select name="score" id="score" class="form-control">
                <option value="0" selected @if(old('score')=='0') selected @endif>※選択してください</option>
                <option value="5" @if(old('score')=='5') selected @endif>5(とても良い)</option>
                <option value="4" @if(old('score')=='4') selected @endif>4(良い)</option>
                <option value="3" @if(old('score')=='3') selected @endif>3(普通)</option>
                <option value="2" @if(old('score')=='2') selected @endif>2(悪い)</option>
                <option value="1" @if(old('score')=='1') selected @endif>1(とても悪い)</option>
            </select>
            <label for="comment_body">本文</label><span class="text-danger ml-2">必須</span>
            <textarea name="comment_body" id="comment_body" cols="30" rows="10"
                      class="form-control">{{ old('comment_body') }}</textarea>
            <button type="submit" class="btn btn-primary">コメントする</button>
        </form>
    </div>

    <script src="/js/delete.js"></script>
    {{--    <script src="/js/delete_kuchikomi.js"></script>--}}
@endsection