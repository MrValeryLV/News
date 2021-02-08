@extends('layouts.main')

@section('title', 'Новости')

@section('menu')
    @include('menu')
@endsection

@section('content')
    <ul class="container">
        <ul class="row justify-content-center">
            <ul class="col-md-12">
                <ul class="card">
                    <ul class="card-body">
                        <h1>Новости</h1>
                        @forelse($news as $item)
                            <h2>{{ $item->title }}</h2>
                            <div class="card-img" style="background-image: url({{$item->image ?? asset('storage/default.jpeg')}})"></div>
                            @if (!$item->isPrivate)
                                <a href="{{ route('news.show', $item->id) }}">Подробнее...</a><br>
                            @endif
                            <hr>
                        @empty
                            <p>Нет новостей</p>
                        @endforelse
                            {{ $news->links() }}
                    </ul>
                </ul>
            </ul>
        </ul>
    </ul>
@endsection

