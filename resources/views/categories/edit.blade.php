@extends('layouts.app')

@section('title', 'カテゴリー編集')

@section('content')

    @component('parts.flash_message')
    @endcomponent

    @component(('parts.error_message'))
    @endcomponent

    <h2 class="head-gray">カテゴリー修正</h2>
    <div class="form-group">
        <form action="{{ url('/categories/edit') }}" method="post">
            @method('PATCH')
            @csrf
            <p>修正するカテゴリー名</p>
            <p class="form-control">{{ $category->title }}</p>
            <input type="hidden" name="old_category_title" value="{{ $category->id }}">
            <p>新しいカテゴリー名</p>
            <input type="text" name="new_category_title" value="{{ old('new_category_title') }}"
                   class="form-control" placeholder="新しいカテゴリー名を入力してください">
            <button type="submit" class="btn btn-success">カテゴリー修正</button>
        </form>
    </div>
@endsection