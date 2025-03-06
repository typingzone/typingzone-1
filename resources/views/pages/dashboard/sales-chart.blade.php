<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<div class="card-body">
    <canvas id="sales_charts"></canvas>
</div>

<script>
    var ctx = document.getElementById('sales_charts').getContext('2d');
    var salesChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: [
                '01 Jan 2024 - 07 Jan 2024',
                '08 Jan 2024 - 14 Jan 2024',
                '15 Jan 2024 - 21 Jan 2024',
                '22 Jan 2024 - 28 Jan 2024'
            ],
            datasets: [{
                label: 'Weekly Sales',
                data: [500, 700, 800, 650],
                borderColor: 'rgba(75, 192, 192, 1)',
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                borderWidth: 2,
                fill: true,
                tension: 0.3,
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            },
            responsive: true,
            maintainAspectRatio: false
        }
    });
</script>
