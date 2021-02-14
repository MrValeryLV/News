@extends('layouts.main')

@section('title', 'Админка')

@section('menu')
    @include('admin.menu')
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h2 class="textHead">CRUD Новости</h2>
                        @forelse($news as $item)
                            <div class="textHead">
                                <h5>{{ $item->title }}</h5>
                                <a class="btn btn-success" href="{{ route('admin.edit', $item) }}">Редактировать новость</a>
                                <a class="btn btn-danger" href="{{ route('admin.destroy', $item) }}">Удалить новость</a>
                            </div>
                        @empty
                            Нет новостей
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection




