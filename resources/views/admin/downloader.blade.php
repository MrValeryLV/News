@extends('layouts.main')

@section('title', 'test 2')

@section('menu')
    @include('admin.menu')
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <h2>test 2</h2>
                </div>
            </div>
        </div>
    </div>
@endsection
