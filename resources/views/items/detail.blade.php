@extends('layouts.app')

@section('content')

    <!-- フラッシュメッセージ -->
    @if (session('flash_message'))
        <div class="flash_message">
            <div class="alert alert-success">
                {{ session('flash_message') }}
            </div>
        </div>
    @endif

    <!-- クチコミフォームのエラーメッセージ -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!--商品登録者がログイン中のみ記事編集・記事削除メニューを表示する-->
    @auth
        @if (Auth::user()->id === $item->user_id)
            <!--TODO:-誰が投稿したかを表示する-->
            {{--<p class="text-right">商品登録者：{{ $item->user_id }}</p>--}}
            <a class="del item_detail_menu" href="#" data-id="{{ $item->id }}">[記事削除]</a>
            <form method="post" action="/items/{{ $item->id }}/" id="form_{{$item->id}}">
                @csrf
                {{ method_field('delete') }}
            </form>
            <a class="item_detail_menu" href="/items/{{ $item->id }}/edit">[記事編集]</a>
        @endif
    @endauth
    <div class="clearfix"></div>
    <h2 class="head-gray">{{ $item->item_name }}</h2>
    <div class="item">
        <p>参考価格：<span class="text-danger font-weight-bold">{{ number_format($item->price) }}</span>円</p>
    </div>

    <h2 class="head-gray">{{ $item->item_name }}のクチコミ</h2>
    @forelse ($kuchikomis as $kuchikomi)
        <div class="kuchikomi">
            <table>
                <tr>
                    <th>投稿日：</th>
                    <td>{{ $kuchikomi->created_at->format('Y年m月d日 H時i分') }}</td>
                </tr>
                <tr>
                    <th>投稿者名：</th>
                    <td>{{ $kuchikomi->name }}</td>
                </tr>
                <tr>
                    <th>本文：</th>
                    <td>{{ $kuchikomi->body }}</td>
                </tr>
            </table>
        </div>
    @empty
        <div class="kuchikomi">
            <p>クチコミはありません</p>
        </div>
    @endforelse

    <h2 class="head-gray">クチコミを書く</h2>
    <div class="item">
        <form method="post" action=" {{ action('KuchikomiController@store', 'aaa') }} ">
            @csrf
            <input type="hidden" name="post_id" value="{{ $item->id }}">
            <label for="comment_user_name">名前</label><span class="text-danger ml-2">必須</span>
            <input type="text" name="comment_user_name" id="comment_user_name" class="form-control">
            <label for="comment_body">本文</label><span class="text-danger ml-2">必須</span>
            <textarea name="comment_body" id="comment_body" cols="30" rows="10" class="form-control"></textarea>
            <button type="submit" class="btn btn-primary">コメントする</button>
        </form>
    </div>

    <script src="/js/delete.js"></script>
@endsection