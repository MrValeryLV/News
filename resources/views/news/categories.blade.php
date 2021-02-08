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
    @forelse($categories as $category)
        <a href="{{ route('news.category.show', $category['slug']) }}">
            <h2>{{ $category['title'] }}</h2>
        </a>
    @empty
        Нет категорий
    @endforelse
                </div>
            </div>
        </div>
    </div>
@endsection
