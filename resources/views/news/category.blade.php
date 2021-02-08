@extends('layouts.main')

@section('title')
    @parent Категории
@endsection

@section ('menu')
    @include('menu')
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
    @if ($news)
        <h1>Новости категории {{ $category->title }}</h1>
        @forelse($news as $item)
            <h2>{{ $item['title'] }}</h2>
            @if (!$item['isPrivate'])
                <a href="{{ route('news.show', $item['id']) }}">Подробнее..</a>
            @endif
        @empty
            Нет новостей
        @endforelse
    @else
        Нет такой категории
    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
