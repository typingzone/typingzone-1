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
                @php
                    use App\Models\Transaction;
                    use Carbon\Carbon;

                    $transactions = Transaction::selectRaw('YEAR(created_at) as year, WEEK(created_at) as week, SUM(total_cost) as total')
                        ->groupBy('year', 'week')
                        ->orderBy('year', 'asc')  
                        ->orderBy('week', 'asc')  
                        ->get();

                    $labels = [];
                    $salesData = [];

                    foreach ($transactions as $transaction) {
                        $startOfWeek = Carbon::now()->setISODate($transaction->year, $transaction->week)->startOfWeek()->format('d M Y');
                        $endOfWeek = Carbon::now()->setISODate($transaction->year, $transaction->week)->endOfWeek()->format('d M Y');
                        $labels[] = "$startOfWeek - $endOfWeek";
                        $salesData[] = $transaction->total;
                    }

                    echo '"' . implode('", "', $labels) . '"';
                @endphp
            ],
            datasets: [{
                label: 'Weekly Sales',
                data: [
                    @php
                        echo implode(', ', $salesData);
                    @endphp
                ],
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
