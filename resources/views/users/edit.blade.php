@extends('layouts.app')

@section('title')
    管理者情報修正ページ
@endsection

@section('content')

    @component('parts.flash_message')
    @endcomponent

    <h2 class="head-gray">管理者情報修正</h2>
    <div class="item">
        <div class="form-group">
            <form action="{{ action('UserController@confirm', ['user' => $user]) }}" method="get">
                @csrf
                <label for="id">ID（変更不可）</label>
                <input type="hidden" name="id" id="id" value="{{ $user->id }}">
                <p class="form-control bg-secondary">{{ $user->id }}</p>
                <label for="name">名前</label>
                <input type="text" name="name" id="name" value="{{ $user->name }}" class="form-control">
                <label for="email">Eメールアドレス</label>
                <input type="email" name="email" id="email" value="{{ $user->email }}" class="form-control">
                <button type="submit" class="btn btn-primary">確認</button>
            </form>
        </div>
    </div>

@endsection