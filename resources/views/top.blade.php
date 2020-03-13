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

    <h2 class="head-gray">登録アイテム</h2>
    @foreach($items as $item)
        <div class="item">
            <div class="item_img">
                <a href="/items/{{ $item->id }}">
                    <img src="{{ asset('storage/' . $item->item_image) }}" alt="{{ $item->item_name }}の画像">
                </a>
            </div>
            <p>{{ $item->item_name }}</p>
            <p>参考価格：<span class="text-danger">{{ number_format($item->price) }}</span>円</p>
            @if ($item->kuchikomi_avg_score != 0)
                <p>クチコミ平均点：<span class="text-danger"> {{ $item->kuchikomi_avg_score }} </span></p>
            @else
                <p>クチコミ平均点：なし</p>
            @endif
            <a href="/items/{{ $item->id }}">詳細ページ</a>

        </div>
    @endforeach

    <!-- ページネーション -->
    <div class="paginate">
        {{ $items->links() }}
    </div>

@endsection