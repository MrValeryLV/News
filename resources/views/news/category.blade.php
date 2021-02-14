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
            <div class="col-md-10">
                <div class="card">
    @if ($news)
        <h3 class="textHead">Новости категории <strong>{{ $category->title }}</strong></h3>
        @forelse($news as $item)
                            <div class="card cardBlockCategory">
                                <p class="lead">{{ $item['title'] }}</p>
                                @if (!$item['isPrivate'])
                                    <div class="card-img" style="background-image: url({{$item->image ?? asset('storage/default.jpeg')}})"></div>
                                    <a class="btn btn-outline-info" style="margin: 10px" href="{{ route('news.show', $item['id']) }}">Подробнее..</a>
                                @endif
                            </div>
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
