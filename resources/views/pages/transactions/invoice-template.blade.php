<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f6f9;
        }

        .invoice-container {
            max-width: 800px;
            margin: 30px auto;
            padding: 30px;
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        }

        .invoice-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
            border-bottom: 2px solid #f0f0f0;
            padding-bottom: 20px;
        }

        .invoice-logo {
            width: 120px;
            height: auto;
        }

        .invoice-title {
            font-size: 28px;
            font-weight: bold;
            color: #333;
        }

        .invoice-details {
            margin-top: 30px;
            display: flex;
            justify-content: space-between;
            font-size: 16px;
        }

        .invoice-details div {
            width: 48%;
        }

        .invoice-details p {
            margin: 10px 0;
        }

        .invoice-table {
            width: 100%;
            margin-top: 30px;
            border-collapse: collapse;
            border: 1px solid #ddd;
        }

        .invoice-table th, .invoice-table td {
            padding: 12px;
            text-align: left;
            border: 1px solid #ddd;
            font-size: 14px;
        }

        .invoice-table th {
            background-color: #f9f9f9;
            font-weight: bold;
        }

        .invoice-footer {
            text-align: right;
            margin-top: 40px;
            font-size: 18px;
            font-weight: bold;
        }

        .invoice-footer p {
            margin: 5px 0;
        }

        .btn-download {
            display: inline-block;
            margin-top: 30px;
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            font-size: 16px;
        }

        .btn-download:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>

    <div class="invoice-container">
        <!-- Invoice Header -->
        <div class="invoice-header">
            <img src="{{ public_path('images/company_logo.png') }}" alt="Company Logo" class="invoice-logo">
            <h2 class="invoice-title">Invoice</h2>
        </div>

        <!-- Customer Details -->
        <div class="invoice-details">
            <div>
                <p><strong>Customer Name:</strong> {{ $profileData->customer_name }}</p>
                <p><strong>Email:</strong> {{ $profileData->email }}</p>
                <p><strong>Phone:</strong> {{ $profileData->phone_number }}</p>
            </div>
            <div style="text-align: right;">
                <p><strong>Invoice Date:</strong> {{ now()->format('Y-m-d') }}</p>
                <p><strong>Due Date:</strong> {{ now()->addDays(30)->format('Y-m-d') }}</p>
            </div>
        </div>

        <!-- Transaction Table -->
        <table class="invoice-table">
            <thead>
                <tr>
                    <th>Service</th>
                    <th>Application No</th>
                    <th>Total Cost</th>
                    <th>Paid By</th>
                    <th>Pay Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach($profileData->transactions as $transaction)
                    <tr>
                        <td>{{ $transaction->service->service_name ?? 'N/A' }}</td>
                        <td>{{ $transaction->application_no }}</td>
                        <td>{{ $transaction->total_cost }}</td>
                        <td>{{ $transaction->paid_by }}</td>
                        <td>{{ $transaction->pay_status }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Total Due -->
        <div class="invoice-footer">
            <p><strong>Total Due:</strong> {{ $profileData->transactions->where('pay_status', 'unpaid')->sum('total_cost') }}</p>
        </div>

        <!-- Download Button -->
    </div>

</body>
</html>
