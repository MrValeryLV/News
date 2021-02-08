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
                        <h2>CRUD Новости</h2>
                        @forelse($news as $item)
                            <h3>{{ $item->title }}</h3>
                            <a class="btn btn-success" href="{{ route('admin.edit', $item) }}">Edit</a>
                            <a class="btn btn-danger" href="{{ route('admin.destroy', $item) }}">Destroy</a>
                        @empty
                            Нет новостей
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection




