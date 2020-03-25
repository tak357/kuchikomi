@extends('layouts.app')

@section('title', 'お問い合わせ内容確認')

@section('content')

    @component('parts.flash_message')
    @endcomponent

    @component(('parts.error_message'))
    @endcomponent

    <h2 class="head-gray">お問い合わせ内容確認</h2>
    <div class="form-group">
        <div class="item">
            <form action="{{ route('form') }}" method="post">
                @csrf
                <label for="item_name">名前</label>
                <p>{{ $form->name }}</p>
                <input type="hidden" name="name" value="{{ $form->name }}">
                <label for="email">Eメールアドレス</label>
                <p>{{ $form->email }}</p>
                <input type="hidden" name="email" value="{{ $form->email }}">
                <label for="buying_url">件名</label>
                <p>{{ $form->subject }}</p>
                <input type="hidden" name="subject" value="{{ $form->subject }}">
                <label for="body">本文</label>
                <p>{{ $form->body }}</p>
                <input type="hidden" name="body" value="{{ $form->body }}">
                <button type="submit" class="btn btn-success" name="action" value="back">修正する</button>
                <button type="submit" class="btn btn-primary" name="action" value="submit">送信する</button>
            </form>
        </div>
    </div>


@endsection