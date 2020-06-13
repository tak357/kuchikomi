@extends('layouts.app')

@section('title')
    カテゴリー一覧
@endsection

@section('content')

    @component('parts.flash_message')
    @endcomponent

    <h2 class="head-gray">カテゴリー一覧</h2>
    @forelse($categories as $category)
        <div class="item">
            <a href="categories/{{ $category->id }}">{{ $category->title }}
                @auth
                    <div class="item_detail_menu mt-1">
                        <a href="/categories/{{ $category->id }}/edit">[編集]</a>
                        <a class="del" href="#" data-id="{{ $category->id }}">[削除]</a>
                        <form method="post" action="/categories/{{ $category->id }}" id="form_{{$category->id}}">
                            @method('DELETE')
                            @csrf
                        </form>
                    </div>
                @endauth
            </a>
        </div>
    @empty
        <p>カテゴリーがありません</p>
    @endforelse

    <script src="/js/delete_category.js"></script>
@endsection