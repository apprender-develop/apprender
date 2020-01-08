@extends('layouts.delta')

@section('style')

@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            Lista de usuarios que se registraron
        </div>
        <div class="card-body">
            @include('dashboard.usuarios._list')
        </div>
    </div>
@endsection

@section('javascript')

@endsection
