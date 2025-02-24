<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice</title>
    <style>
        body {
            font-family: 'Helvetica Neue', sans-serif;
            background-color: #f0f3f5;
            margin: 0;
            padding: 0;
        }

        .invoice-container {
            max-width: 900px;
            margin: 40px auto;
            background-color: #fff;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
            border-top: 8px solid #3498db;
        }

        .invoice-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding-bottom: 15px;
            border-bottom: 1px solid #e0e0e0;
        }

        .invoice-header img {
            width: 150px;
        }

        .invoice-title {
            font-size: 12px;
            font-weight: 700;
            color: #34495e;
        }

        .invoice-details {
            margin: 25px 0;
            display: flex;
            justify-content: space-between;
            font-size: 12px;
        }

        .invoice-details div {
            width: 48%;
        }

        .invoice-details p {
            margin: 6px 0;
            color: #555;
        }

        .invoice-details strong {
            color: #2c3e50;
        }

        .invoice-table {
            width: 100%;
            margin-top: 20px;
            border-collapse: collapse;
        }

        .invoice-table th, .invoice-table td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        .invoice-table th {
            background-color: #3498db;
            color: #fff;
            text-transform: uppercase;
            font-weight: bold;
            font-size: 10px;
        }

        .invoice-table tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        .invoice-table td {
            color: #555;
            font-size: 10px;
        }

        .invoice-footer {
            margin-top: 30px;
            text-align: right;
            font-size: 12px;
            font-weight: bold;
            color: #34495e;
        }

        .invoice-footer .total-amount {
            font-size: 12px;
            color: #e74c3c;
        }

        .highlight {
            color: #e67e22;
            font-weight: 600;
        }

        @media (max-width: 768px) {
            .invoice-details {
                flex-direction: column;
            }

            .invoice-details div {
                width: 100%;
                margin-bottom: 20px;
            }

            .invoice-header {
                flex-direction: column;
                align-items: flex-start;
            }

            .invoice-title {
                margin-top: 20px;
            }
        }
    </style>
</head>
<body>

    <div class="invoice-container">
        <!-- Invoice Header -->
        <div class="invoice-header">
            @php $company = \App\Models\Company::first(); @endphp
            <img src="{{ public_path($company->company_logo) }}" alt="Company Logo">
            <h1 class="invoice-title">Invoice</h1>
        </div>

        <!-- Customer Details -->
        <div class="invoice-details">
            <div>
                <p><strong>Customer Name:</strong> {{ $profileData->customer_name }}</p>
                <p><strong>Email:</strong> {{ $profileData->email }}</p>
                <p><strong>Phone:</strong> {{ $profileData->phone_number }}</p>
            </div>
            <div style="text-align: left;">
                <p><strong>Invoice Date:</strong> {{ now()->format('Y-m-d') }}</p>
                <p><strong>Due Date:</strong> <span class="highlight">{{ now()->addDays(30)->format('Y-m-d') }}</span></p>
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
                        <td>{{ $transaction->total_cost }} AED</td>
                        <td>{{ $transaction->paid_by }}</td>
                        <td>{{ $transaction->pay_status }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Total Due -->
        <div class="invoice-footer">
            <p>Total Due:</p>
            <p class="total-amount">{{ $profileData->transactions->where('pay_status', 'unpaid')->sum('total_cost') }} AED</p>
        </div>
    </div>

</body>
</html>
