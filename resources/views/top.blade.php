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

    <h2 class="head-gray">新着アイテム</h2>
    @foreach($items as $item)
        <div class="item">
            <div class="item_img"><img src="{{ asset('storage/ad_sample.png') }}" alt=""></div>
            <p>{{ $item->item_name }}</p>
            <p>参考価格：<span class="text-danger">{{ number_format($item->price) }}</span>円</p>
            <a href="/items/{{ $item->id }}">詳細ページ</a>
        </div>
    @endforeach

    <!-- ページネーション -->
    <div class="paginate">
        {{ $items->links() }}
    </div>

@endsection