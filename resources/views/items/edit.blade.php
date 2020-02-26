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

    <h2 class="head-gray">{{ $item->item_name }}の編集ページ</h2>
    <div class="item">
        <div class="form-group">
            <form action="/items/{{ $item->id }}" method="post">
                @csrf
                {{ method_field(('patch')) }}
                <input type="hidden" name="user_id" id="user_id" value="$item->user_id">
                <label for="item_name">商品名</label>
                <input type="text" name="item_name" id="item_name" class="form-control" value="{{ $item->item_name }}">
                <label for="category">カテゴリー</label>
                <input type="text" name="category_id" id="category_id" class="form-control" value="{{ $item->category_id }}">
                <label for="price">価格</label>
                <input type="text" name="price" id="price" class="form-control" value="{{ $item->price }}">
                <label for="tag">タグ</label>
                <input type="text" name="tag" id="tag" class="form-control" value="{{ $item->tag }}">
                {{-- TODO: 画像登録機能の追加--}}
                {{--<label for="item_image">商品イメージ画像</label>--}}
                <button type="submit" class="btn btn-primary">登録する</button>
            </form>
        </div>
    </div>
@endsection