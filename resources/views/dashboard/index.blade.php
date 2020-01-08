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
            <div class="card shadow-lg mb-5 rounded border-0">
                <div class="card-header bg-transparent">
                    <h5 class="card-title">Cursos</h5>
                </div>
                <div class="card-body p-0">
                    <div class="chart-container">
                        <canvas id="myChart"></canvas>
                    </div>
                </div>
                {{-- <div class="card-footer"> --}}
                    {{-- <small class="text-muted">Last updated 3 mins ago</small> --}}
                {{-- </div> --}}
            </div>
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
<script>
var ctx = document.getElementById('myChart');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
        datasets: [{
            label: '# of Votes',
            data: [12, 19, 3, 5, 2, 3],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        maintainAspectRatio: false,
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
});
</script>
@endsection
