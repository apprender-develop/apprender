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

@push('javascript')

<script>
var ctx = document.getElementById('myChart');
// let labelsData = {!!json_encode($cmv)!!}
// console.log(labelsData);

var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: {!!json_encode($cmv['labels'])!!},
        datasets: [{
            label: '',
            data: {!!json_encode($cmv['data'])!!},
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
@endpush
