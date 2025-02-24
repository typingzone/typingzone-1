@include('emails.partials.header')
<body>
    <div class="email-container">
        <div class="email-body">
            <p>Dear User,</p>

            <p>Please find attached the daily transaction report for {{ now()->format('F j, Y') }}.</p>
            
            <p><strong>Summary of today's transactions:</strong></p>
            <ul>
                <li><strong>Total Transactions:</strong> {{ $transactionCount }}</li>
                <li><strong>Total Amount:</strong> AED {{ number_format($totalAmount, 2) }}</li>
            </ul>

            <p>The detailed transaction data is available in the attached Excel file.</p>
        </div>
    </div>
</body>
@include('emails.partials.footer')
