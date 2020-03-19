@extends('layouts.app')

@section('title')
    {{ $item->item_name }}の編集ページ
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

    {{--エラーメッセージ--}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <h2 class="head-gray">{{ $item->item_name }}の編集ページ</h2>
    <div class="item">
        <div class="form-group">
            <form action="/items/{{ $item->id }}" method="post" enctype="multipart/form-data">
                @method('PATCH')
                @csrf
                <input type="hidden" name="user_id" id="user_id" value="{{ $item->user_id }}">
                <label for="item_name">商品名</label>
                <input type="text" name="item_name" id="item_name" class="form-control" value="{{ $item->item_name }}">
                <label for="category_id">カテゴリー</label>
                <select name="category_id" id="category_id" class="form-control">
                    <option value="0">※選択してください</option>
                    <option value="1" @if( $item->category_id === 1)selected @endif>ノートパソコン(Windows)</option>
                    <option value="2" @if( $item->category_id === 2) selected @endif>ノートパソコン(Mac)</option>
                    <option value="3" @if( $item->category_id === 3) selected @endif>デスクトップパソコン(Windows)</option>
                    <option value="4" @if( $item->category_id === 4) selected @endif>デスクトップパソコン(Mac)</option>
                </select>
                <label for="price">価格</label>
                <input type="text" name="price" id="price" class="form-control" value="{{ $item->price }}">
                <label for="buying_url">購入URL</label>
                <input type="text" name="buying_url" id="buying_url" class="form-control" value="{{ $item->buying_url }}">
                <label for="tag">タグ</label>
                <input type="text" name="tag" id="tag" class="form-control" value="{{ $item->tag }}">
                <label for="item_image">商品画像</label><br>
                <img src="{{ asset('storage/' . $item->item_image) }}"
                     width="200" alt="Image preview..."> <br><br>
                <br>
                <input type="file" onchange="previewFile()" name="item_image" id="item_image">
                <br>
                <button type="submit" class="btn btn-primary mt-3">更新する</button>
            </form>
        </div>
    </div>
    <script src="/js/image_preview.js"></script>

@endsection