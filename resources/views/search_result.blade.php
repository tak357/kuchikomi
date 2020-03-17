@extends('layouts.app')

@section('title')
    {{ $search_keyword }} の検索結果
@endsection

@section('content')

    <h2 class="head-gray">{{ $search_keyword }}の検索結果</h2>
    @forelse ($items as $item)
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
    @empty
        <div class="item">
            <p>検索結果はありませんでした。</p>
        </div>
    @endforelse

    <div class="paginate">
        {{ $items->appends(['search_keyword' => $search_keyword])->links() }}
    </div>

@endsection