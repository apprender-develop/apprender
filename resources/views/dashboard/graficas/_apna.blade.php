<div class="card shadow-lg mb-5 rounded border-0 pb-3">
    <div class="card-header bg-transparent">
        <h5 class="card-title">Rendimiento</h5>
    </div>
    <div class="card-body">
        <div class="chart-container text-center">
            <canvas id="chart-apna"></canvas>
            <small class="text-muted">Calificación mínima aprobatoria: 6.</small>
        </div>
    </div>
</div>

@push('javascript')
<script>
    var ctx = document.getElementById('chart-apna');
    var myPieChart = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: ['Aprobados', 'No aprobados'],
            datasets: [{
                label: '',
                data: {{$apna}},
                backgroundColor: [
                    // 'rgba(255, 99, 132, 0.2)',
                    // 'rgba(54, 162, 235, 0.2)',
                    // 'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    // 'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    // 'rgba(255, 99, 132, 1)',
                    // 'rgba(54, 162, 235, 1)',
                    // 'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    // 'rgba(255, 159, 64, 1)'
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
