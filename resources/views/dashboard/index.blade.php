@extends('layouts.delta')

@section('style')
    {{-- <link href="{{ asset('css/chart.css') }}" rel="stylesheet"> --}}
    <style>
        canvas {
    /* border: 1px dotted red; */
}

.chart-container {
    position: relative;
    width: auto;
    height: 30vh;
}

.title-charts {
    font-size: 1.5rem;
}
    </style>
@endsection

@section('content')
    <div class="col-12">
        <div class="card-columns">
            {{-- CURSOS MAS VISITADOS --}}
            @include('dashboard.graficas._cursosVisitados')'
            {{-- REGISTRO DE USUARIOS --}}
            @include('dashboard.graficas._registroUsuarios')
            {{-- GRAFICA DE APROBADOS / NO APROBADOS --}}
            @include('dashboard.graficas._apna')
            {{-- Total Usuarios Registrados --}}
            @include('dashboard.datos._tur')
            {{-- Calificacion plataforma --}}
            @include('dashboard.graficas._caliPlataforma')
        </div>
    </div>
@endsection

@section('javascript')
    <script src="{{ asset('js/chart.js') }}"></script>
@endsection
