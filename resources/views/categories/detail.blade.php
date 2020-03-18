@extends('layouts.app')

@section('title')
    {{ $categories->title }}の登録アイテム
@endsection

@section('content')

    <h2 class="head-gray">{{ $categories->title }}の登録アイテム</h2>
    @foreach($items as $item)
        <div class="item">
            <div class="item_img">
                <a href="/items/{{ $item->id }}">
                    <img src="{{ asset('storage/' . $item->item_image) }}" alt="{{ $item->item_name }}の画像">
                </a>
            </div>
            <p>{{ $item->item_name }}</p>
            <p>参考価格：<span class="text-danger">{{ number_format($item->price) }}</span>円</p>
            <a href="/items/{{ $item->id }}">詳細ページ</a>
        </div>
    @endforeach

    <div class="paginate">
        {{ $items->links() }}
    </div>

@endsection