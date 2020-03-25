@extends('layouts.app')

@section('title', '商品登録ページ')

@section('content')

    @component('parts.flash_message')
    @endcomponent

    @component(('parts.error_message'))
    @endcomponent

    <h2 class="head-gray">商品登録</h2>
    <div class="form-group">
        <div class="item">
            <form action="/items" method="post" enctype="multipart/form-data">
                @csrf
                <label for="item_name">商品名</label><span class="text-danger ml-2">必須</span>
                <input type="text" name="item_name" class="form-control" value="{{ old('item_name') }}">
                <label for="category_id">カテゴリー</label><span class="text-danger ml-2">必須</span>
                <select name="category_id" class="form-control">
                    <option value="0" @if(old('category_id')=='0') selected @endif>※選択してください</option>
                    @foreach(\App\Models\Category::all() as $category)
                        @if(isset($category->id))
                            <option value="{{ $category->id }}" @if(old('category_id')=="$category->id") selected @endif>
                                {{ $category->title }}
                            </option>
                        @endif
                    @endforeach
                </select>
                <label for="price">参考価格</label><span class="text-danger ml-2">必須</span>
                <input type="text" name="price" class="form-control" value="{{ old('price') }}">
                <label for="buying_url">購入URL</label><span class="text-danger ml-2">必須</span>
                <input type="text" name="buying_url" class="form-control"
                       value="{{ old('buying_url') }}">
                <label for="tag">タグ</label><span class="ml-2">任意</span>
                <input type="text" name="tag" class="form-control" value="{{ old('tag') }}">
                {{--TODO:アップロードした画像にOLDヘルパーがきかない--}}
                <label for="item_image">商品画像　任意</label><br>
                <input type="file" onchange="previewFile()" name="item_image" id="item_image"
                       value="{{ old('item_image') }}">
                <br><br>
                <img src="{{ asset('storage/item_images/no_image.png') }}" width="200" alt="Image preview..."> <br><br>

                <button type="submit" class="btn btn-primary">登録する</button>
            </form>
        </div>
    </div>
    <script src="/js/image_preview.js"></script>
@endsection