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
                '01 Jan 2025',
                '08 Jan 2025',
                '15 Jan 2025',
                '18 Mar 2025',
                '08 Apr 2025',
                '15 Apr 2025',
                '13 May 2025'
            ],
            datasets: [{
                label: 'Weekly Sales',
                data: [600, 800, 750, 900, 1000, 1100, 950],
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
