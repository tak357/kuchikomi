@extends('layouts.app')

@section('title', 'カテゴリー編集')

@section('content')

    @component('parts.flash_message')
    @endcomponent

    @component(('parts.error_message'))
    @endcomponent

    <h2 class="head-gray">カテゴリー新規作成</h2>
    <div class="form-group">
        <form action="{{ url('/categories') }}" method="post">
            @csrf
            <input type="text" name="new_category_title" value="{{ old('new_category_title') }}"
                   class="form-control">
            <button type="submit" class="btn btn-success">カテゴリー作成</button>
        </form>
    </div>
@endsection