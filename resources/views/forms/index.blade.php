@extends('layouts.app')

@section('title', 'お問い合わせページ')

@section('content')

    @component('parts.flash_message')
    @endcomponent

    @component(('parts.error_message'))
    @endcomponent

    <h2 class="head-gray">お問い合わせフォーム</h2>
    <div class="form-group">
        <div class="item">
            <form action="{{ route('form.confirm') }}" method="get">
                @csrf
                <label for="item_name">名前</label><span class="text-danger ml-2">必須</span>
                <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}">
                <label for="email">Eメールアドレス</label><span class="text-danger ml-2">必須</span>
                <input type="text" name="email" id="email" class="form-control" value="{{ old('email') }}">
                <label for="buying_url">件名</label><span class="text-danger ml-2">必須</span>
                <input type="text" name="subject" id="subject" class="form-control" value="{{ old('subject') }}">
                <label for="body">本文</label><span class="text-danger ml-2">必須</span>
                <textarea name="body" id="body" cols="30" rows="10"
                          class="form-control">{{ old('body') }}</textarea>

                <button type="submit" class="btn btn-primary">確認</button>
            </form>
        </div>
    </div>


@endsection