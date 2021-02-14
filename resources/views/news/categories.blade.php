@extends('layouts.main')

@section('title', 'Категории')

@section ('menu')
    @include('menu')
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="list-group">
    @forelse($categories as $category)
                            <a class="list-group-item list-group-item-action" href="{{ route('news.category.show', $category['slug']) }}">{{ $category['title'] }}</a>
    @empty
        Нет категорий
    @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
