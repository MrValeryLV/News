@extends('layouts.main')

@section('title', 'Новости')

@section('menu')
    @include('menu')
@endsection

@section('content')
<div style="padding: 0 calc(50% - 570px);">
    <div style="display: flex; flex-wrap: wrap; justify-content: space-around;">
        @forelse($news as $item)
            <div class="card cardBlock" style="width: 20rem; padding: 5px; margin: 5px; text-align: center;">
                <h2>{{ $item->title }}</h2>
                <div class="card-img" style="background-image: url({{$item->image ?? asset('storage/default.jpeg')}})"></div>
                @if (!$item->isPrivate || Auth::check())
                    <div class="card-body">
                        <a class="card-text btn btn-outline-danger" href="{{ route('news.show', $item->id) }}">Подробнее...</a>
                    </div>
                @endif
            </div>
        @empty
            <p>Нет новостей</p>
        @endforelse

    </div>
    <div style="display: flex; place-content: center;">
        {{ $news->onEachSide(0)->links() }}
    </div>
</div>



@endsection

