@extends('layouts.app')

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


    <h2 class="head-gray">商品登録</h2>
    <div class="form-group">
        <div class="item">
            <form action="/items" method="post" enctype="multipart/form-data">
                @csrf
                <label for="item_name">商品名</label><span class="text-danger ml-2">必須</span>
                <input type="text" name="item_name" id="itemName" class="form-control" value="{{ old('item_name') }}">
                <label for="category">カテゴリー</label><span class="text-danger ml-2">必須</span>
                <select name="category" id="category" class="form-control">
                    <option value="0" selected @if(old('category')=='0') selected @endif>※選択してください</option>
                    <option value="1" @if(old('category')=='1') selected @endif>ノートパソコン(Windows)</option>
                    <option value="2" @if(old('category')=='2') selected @endif>ノートパソコン(Mac)</option>
                    <option value="3" @if(old('category')=='3') selected @endif>デスクトップパソコン(Windows)</option>
                    <option value="4" @if(old('category')=='4') selected @endif>デスクトップパソコン(Mac)</option>
                </select>
                <label for="price">参考価格</label><span class="text-danger ml-2">必須</span>
                <input type="text" name="price" id="price" class="form-control" value="{{ old('price') }}">
                <label for="tag">タグ</label><span class="ml-2">任意</span>
                <input type="text" name="tag" id="tag" class="form-control" value="{{ old('tag') }}">
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