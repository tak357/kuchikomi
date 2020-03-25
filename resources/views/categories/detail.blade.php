@extends('layouts.app')

@section('title')
    {{ $categories->title }}の登録アイテム
@endsection

@section('content')

    <h2 class="head-gray">{{ $categories->title }}の登録アイテム</h2>
    @forelse($items as $item)
        <div class="item">
            <div class="item_img">
                <a href="/items/{{ $item->id }}">
                    <img src="{{ asset('storage/' . $item->item_image) }}" alt="{{ $item->item_name }}の画像">
                </a>
            </div>
            <p>{{ $item->item_name }}</p>
            <p>参考価格：<span class="text-danger">{{ number_format($item->price) }}</span>円</p>
            @if ($item->kuchikomi_avg_score != 0)
                <p>クチコミ平均点：<span class="text-danger"> {{ number_format($item->kuchikomi_avg_score,2) }} </span>点</p>
            @else
                <p>クチコミ平均点：なし</p>
            @endif
            <a class="detail_link" href="/items/{{ $item->id }}">詳細ページ</a>
        </div>
    @empty
        <div class="item">
            <p>このカテゴリーに登録されている商品はありません</p>
        </div>
    @endforelse
    <div class="paginate">
        {{ $items->links() }}
    </div>

@endsection