<div class="card shadow-lg mb-5 rounded border-0 pb-3">
    <div class="card-header bg-transparent">
        <h5 class="card-title">Calificación Plataforma</h5>
    </div>
    <div class="card-body">
        <div class="chart-container text-center">
            <canvas id="chart-califPlataforma"></canvas>
        </div>
    </div>
</div>
@push('javascript')
<script>
    var ctx = document.getElementById('chart-califPlataforma');
    var myChart = new Chart(ctx, {
        type: 'radar',
        data: {
            labels: [
                'Contenido', 'Fácil', 'Gráficos', 'Interactivo', 'Intuitivo'
            ],
            datasets: [{
                label: 'Promedio',
                data: {{$caliPlataforma}},
                backgroundColor: [
                    'rgba(115, 207, 92, 0.8)',
                ],
                borderColor: [
                    'rgba(115, 207, 92, 1)',
                ],
                borderWidth: 1
            }]
        },
        options: {
            maintainAspectRatio: false,
        }
    });
</script>
@endpush
