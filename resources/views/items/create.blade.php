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

    <h2>商品登録</h2>
    <div class="form-group">
        <div class="item">
            <form action="/items" method="post">
                @csrf
                <label for="itemName">商品名</label><span class="text-danger ml-2">必須</span>
                <input type="text" name="itemName" id="itemName" class="form-control">
                <label for="category">カテゴリー</label><span class="text-danger ml-2">必須</span>
                <input type="text" name="category" id="category" class="form-control">
                <label for="price">参考価格</label><span class="text-danger ml-2">必須</span>
                <input type="text" name="price" id="price" class="form-control">
                <label for="tag">タグ</label><span class="ml-2">任意</span>
                <input type="text" name="tag" id="tag" class="form-control">
                <label for="itemImage">商品画像</label><span class="ml-2">任意</span>
                <input type="text" name="itemImage" id="itemImage" class="form-control">
                <button type="submit" class="btn btn-primary"">登録する</button>
            </form>
        </div>
    </div>
@endsection