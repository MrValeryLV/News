@extends('layouts.main')

@section('title', 'Новость')

@section('menu')
    @include('menu')
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-body">
                        <div class="card-img" style="background-image: url({{ $news->image ?? asset('storage/default.jpeg')}})"></div>
                            @if ($news)
                                @if (!$news->isPrivate || Auth::check())
                                    <h2>{{ $news->title }}</h2>
                                    <p>{!! $news->text !!}</p>
                                @else
                                    Зарегистрируйтесь для просмотра
                                @endif
                            @else
                                Нет новости с таким id
                            @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
