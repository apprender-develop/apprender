<div class="card shadow-lg mb-5 rounded border-0">
    <div class="card-header bg-transparent">
        <h5 class="card-title">Registro de usuarios</h5>
    </div>
    <div class="card-body p-0">
        <div class="chart-container">
            <canvas id="myChart2"></canvas>
        </div>
    </div>
    {{-- <div class="card-footer"> --}}
        {{-- <small class="text-muted">Last updated 3 mins ago</small> --}}
    {{-- </div> --}}
</div>

@push('javascript')
    <script>
        var ctx = document.getElementById('myChart2');
        let jsonnubm = {{json_encode($nubm_data[2020])}}
        var myLineChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
                datasets: [{
                    label: '2020',
                    data: jsonnubm,
                    fill: false,
                    pointHitRadius: 20,
                    borderColor: 'rgba(255, 159, 64, 1)',
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
@endpush
