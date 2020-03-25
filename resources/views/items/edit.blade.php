@extends('layouts.app')

@section('title')
    {{ $item->item_name }}の編集ページ
@endsection

@section('content')

    @component('parts.flash_message')
    @endcomponent

    @component(('parts.error_message'))
    @endcomponent

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
                    @foreach(\App\Models\Category::all() as $category)
                        @if(isset($category->id))
                            <option value="{{ $category->id }}"@if(old('category_id')=="$category->id") selected @endif>
                                {{ $category->title }}
                            </option>
                        @endif
                    @endforeach
                </select>
                <label for="price">価格</label>
                <input type="text" name="price" id="price" class="form-control" value="{{ $item->price }}">
                <label for="buying_url">購入URL</label>
                <input type="text" name="buying_url" id="buying_url" class="form-control"
                       value="{{ $item->buying_url }}">
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