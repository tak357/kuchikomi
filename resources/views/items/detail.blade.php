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

    <!--ログイン中のみ記事編集・記事削除メニューを表示する-->
    @auth
        @if (Auth::user()->id === $item->user_id)
            <a class="del item_detail_menu" href="#" data-id="{{ $item->id }}">[記事削除]</a>
            <form method="post" action="/items/{{ $item->id }}/" id="form_{{$item->id}}">
                @csrf
                {{ method_field('delete') }}
            </form>
            <a class="item_detail_menu" href="/items/{{ $item->id }}/edit">[記事編集]</a>
        @endif
    @endauth
    <div class="clearfix"></div>
    <h2 class="head-gray">{{ $item->item_name }}の詳細</h2>
    <div class="item">
        <p>{{ $item->item_name }}</p>
        <p>参考価格：{{ $item->price }}</p>
    </div>

    <h2 class="head-gray">{{ $item->item_name }}のクチコミ</h2>
    <div class="item">
        <p>準備中</p>
    </div>

    <script src="/js/delete.js"></script>
@endsection