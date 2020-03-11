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

    <!-- エラーメッセージ -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    <h2 class="head-gray">商品登録</h2>
    <div class="form-group">
        <div class="item">
            <form action="/items" method="post" enctype="multipart/form-data">
                @csrf
                <label for="item_name">商品名</label><span class="text-danger ml-2">必須</span>
                <input type="text" name="item_name" id="itemName" class="form-control">
                <label for="category">カテゴリー</label><span class="text-danger ml-2">必須</span>
                <select name="category" id="category" class="form-control">
                    <option value="0">※選択してください</option>
                    <option value="1">ノートパソコン(Windows)</option>
                    <option value="2">ノートパソコン(Mac)</option>
                    <option value="3">デスクトップパソコン(Windows)</option>
                    <option value="4">デスクトップパソコン(Mac)</option>
                </select>
                <label for="price">参考価格</label><span class="text-danger ml-2">必須</span>
                <input type="text" name="price" id="price" class="form-control">
                <label for="tag">タグ</label><span class="ml-2">任意</span>
                <input type="text" name="tag" id="tag" class="form-control">
                {{--TODO: 画像アップロード機能の追加--}}
                {{--<label for="itemImage">商品画像</label><span class="ml-2">任意</span>--}}
                {{--<input type="text" name="itemImage" id="itemImage" class="form-control">--}}
                {{-- TODO: デフォルト画像URLの修正--}}
                <label for="item_image">商品画像　任意</label><br>
                <input type="file" onchange="previewFile()" name="item_image" id="item_image">
                <br><br>
                <img src="{{ asset('storage/item_images/no_image.png') }}" width="200" alt="Image preview..."> <br><br>

{{--                <input type="hidden" name="itemImage" value="1234">--}}
                <button type="submit" class="btn btn-primary">登録する</button>
            </form>
        </div>
    </div>
    <script src="/js/image_preview.js"></script>
@endsection