@extends('layouts.app')

@section('title')
    カテゴリー一覧
@endsection

@section('content')

    <h2 class="head-gray">カテゴリー一覧</h2>
    @foreach($categories as $category)
        <div class="item">
            <a href="categories/{{ $category->id }}">{{ $category->title }}</a>
        </div>
    @endforeach

@endsection