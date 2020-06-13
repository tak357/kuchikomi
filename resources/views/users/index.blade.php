@extends('layouts.app')

@section('title')
    管理者一覧
@endsection

@section('content')

    @component('parts.flash_message')
    @endcomponent

    <h2 class="head-gray">管理者一覧</h2>
    <table class="table table-sm table-hover">
        <thead class="thead-light">
        <tr>
            <th>ID</th>
            <th>名前</th>
            <th>Eメールアドレス</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>
                    <div class="item_detail_menu mt-1">
                        {{-- TODO:ユーザーの修正、削除ボタン --}}
                        {{-- <a href="{{ action('UserController@edit', ['user' => $user]) }}">[修正]</a>
                        <a class="del" href="#">[削除]</a> --}}
                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

@endsection