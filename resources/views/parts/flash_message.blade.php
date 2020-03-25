{{--フラッシュメッセージ--}}
@if (session('flash_message'))
    <div class="flash_message">
        <div class="alert alert-success">
            {{ session('flash_message') }}
        </div>
    </div>
@endif
