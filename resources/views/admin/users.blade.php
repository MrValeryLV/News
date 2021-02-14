@extends('layouts.main')

@section('title', 'Админка')

@section ('menu')
    @include('admin.menu')
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <h3 class="textHead">Пользователи</h3>
                <div class="card">
                    <div class="list-group">
                    @forelse($users as $user)
                        <div class="list-group-item list-group-item-action">
                            {{ $user->name }}
                            <div>
                                <a class="btn btn-danger" href="{{ route('admin.destroyUser', $user) }}">Удалить пользователя</a>
                                @if ($user->is_admin)
                                    <a href="{{ route('admin.toggleAdmin', $user) }}" type="button" class="btn btn-warning">Снять админа</a>
                                @else
                                    <a href="{{ route('admin.toggleAdmin', $user) }}" type="button" class="btn btn-success">Назначить админом</a>
                                @endif
                            </div>
                        </div>
                    @empty
                        <p>нет пользователей</p>
                    @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
