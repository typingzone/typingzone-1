<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<div class="card-body">
    <canvas id="sales_charts"></canvas>
</div>

<script>
    var ctx = document.getElementById('sales_charts').getContext('2d');
    var salesChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: ['January', 'February', 'March', 'April', 'May'],
            datasets: [{
                label: 'Sales',
                data: [120, 90, 150, 180, 110], // Fake data
                borderColor: 'rgba(75, 192, 192, 1)',
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                borderWidth: 2,
                fill: true, // Area below the line will be filled
                tension: 0.3, // Smoothness of the curve
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
