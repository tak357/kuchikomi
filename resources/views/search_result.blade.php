@extends('layouts.app')

@section('content')

    <h2 class="head-gray">検索結果</h2>
    @forelse ($items as $item)
        <div class="item">
            <a href="/items/{{$item->id}}">{{ $item->item_name }}</a>
        </div>
    @empty
        <div class="item">
            <p>検索結果はありませんでした。</p>
        </div>
    @endforelse

    <div class="paginate">
        {{ $items->appends(['search_keyword' => $search_keyword])->links() }}
    </div>

@endsection