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
            background-color: #eef2f7;
        }

        .invoice-container {
            max-width: 800px;
            margin: 30px auto;
            padding: 30px;
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            border-left: 6px solid #4CAF50;
        }

        .invoice-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
            padding-bottom: 20px;
            border-bottom: 3px solid #f0f0f0;
        }

        .invoice-logo {
            width: 120px;
            height: auto;
        }

        .invoice-title {
            font-size: 12px;
            font-weight: bold;
            color: #333;
            text-transform: uppercase;
            letter-spacing: 2px;
        }

        .invoice-details {
            margin-top: 30px;
            display: flex;
            justify-content: space-between;
            font-size: 12px;
            color: #555;
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
            background-color: #f9f9f9;
            color: #444;
            font-size: 12px;
        }

        .invoice-table th {
            background-color: #4CAF50;
            color: white;
            padding: 15px;
            text-align: left;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .invoice-table td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        .invoice-table tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .invoice-footer {
            text-align: right;
            margin-top: 40px;
            font-size: 12px;
            font-weight: bold;
            color: #333;
        }

        .invoice-footer p {
            margin: 5px 0;
        }

        .highlight {
            color: #FF5722;
        }
    </style>
</head>
<body>

    <div class="invoice-container">
        <!-- Invoice Header -->
        <div class="invoice-header">
            @php $company = \App\Models\Company::first(); @endphp
            <img src="{{ public_path($company->company_logo) }}" alt="Company Logo" class="invoice-logo">
            <h2 class="invoice-title">Invoice</h2>
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
            <p><strong>Total Due:</strong> <span class="highlight">{{ $profileData->transactions->where('pay_status', 'unpaid')->sum('total_cost') }} AED</span></p>
        </div>

    </div>

</body>
</html>
