@extends('layouts.delta')

@section('style')

@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            Detalles historial usuario
        </div>
        <div class="card-body">
            <ul class="nav nav-pills flex-column flex-sm-row mb-3" id="pills-tab" role="tablist">
                <li class="nav-item">
                    <a class="flex-sm-fill text-center nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-perfil" role="tab"
                        aria-controls="pills-home" aria-selected="true">Perfil</a>
                </li>
                <li class="nav-item">
                    <a class="flex-sm-fill text-center nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-historial" role="tab"
                        aria-controls="pills-profile" aria-selected="false">Historial de navegacion</a>
                </li>
                <li class="nav-item">
                    <a class="flex-sm-fill text-center nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab"
                        aria-controls="pills-contact" aria-selected="false">Otros</a>
                </li>
            </ul>
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-perfil" role="tabpanel" aria-labelledby="pills-home-tab">
                    @include('dashboard.usuarios.detalles._perfil')
                </div>
                <div class="tab-pane fade" id="pills-historial" role="tabpanel" aria-labelledby="pills-profile-tab">
                    @include('dashboard.usuarios.detalles._historial')
                </div>
                <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">...</div>
            </div>
        </div>
    </div>
@endsection

@section('javascript')

@endsection
