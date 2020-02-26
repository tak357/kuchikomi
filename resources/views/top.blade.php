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
            <p>{{ $item->item_name }}</p>
            <p>参考価格：{{ $item->price }}円</p>
            <a href="/items/{{ $item->id }}">詳細ページ</a>
        </div>
    @endforeach

    <!-- ページネーション -->
    <div class="paginate">
        {{ $items->links() }}
    </div>

@endsection