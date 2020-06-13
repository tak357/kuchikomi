@extends('layouts.app')

@section('title')
    管理者情報修正ページ
@endsection

@section('content')

    @component('parts.flash_message')
    @endcomponent

    <h2 class="head-gray">管理者情報修正確認</h2>
    <div class="form-group">
        <div class="item">
            {{-- <form action="{{ route('users.patch') }}" method="post"> --}}
            {{-- <form action="{{ action('UserController@update', ['user' => $user]) }}" method="post"> --}}
            <form action="/" method="post">
                @method('PATCH')
                @csrf
                <label>ID</label>
                <p>{{ $request->id }}</p>
                <label>名前</label>
                <p>{{ $request->name }}</p>
                <label>Eメールアドレス</label>
                <p>{{ $request->email }}</p>
                {{-- TODO:formのactionを修正する --}}
                {{-- <button type="submit" class="btn btn-success" name="action" value="back">修正する</button>
                <button type="submit" class="btn btn-primary" name="action" value="submit">登録する</button> --}}
            </form>
        </div>
    </div>

@endsection