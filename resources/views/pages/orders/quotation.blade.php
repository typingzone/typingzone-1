<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quotation PDF</title>
    <style>
        body { 
            font-family: 'Arial', sans-serif; 
            margin: 0;
            padding: 0;
            color: #333;
            line-height: 1.5;
        }
        .container {
            width: 100%;
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }
        .header {
            position: relative;
            padding-bottom: 20px;
            border-bottom: 2px solid #2c3e50;
            margin-bottom: 30px;
        }
        .logo {
            max-width: 200px;
            max-height: 80px;
        }
        .company-info {
            position: absolute;
            top: 0;
            right: 0;
            text-align: right;
        }
        .company-name {
            font-size: 22px;
            font-weight: bold;
            color: #2c3e50;
            margin-bottom: 5px;
        }
        .company-address {
            margin-top: 5px;
            font-size: 14px;
            color: #7f8c8d;
        }
        .document-title {
            font-size: 28px;
            font-weight: bold;
            color: #2c3e50;
            margin: 30px 0 20px 0;
            text-align: center;
        }
        .quotation-info {
            background-color: #f9f9f9;
            padding: 15px;
            border-radius: 5px;
            margin-bottom: 25px;
        }
        .section-title {
            font-size: 18px;
            font-weight: bold;
            color: #2c3e50;
            margin-bottom: 10px;
        }
        .table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            margin-bottom: 30px;
        }
        .table th {
            background-color: #2c3e50;
            color: white;
            text-align: left;
            padding: 12px;
            font-size: 14px;
        }
        .table td {
            padding: 12px;
            border-bottom: 1px solid #ddd;
            font-size: 14px;
        }
        .table tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        .table tfoot th, .table tfoot td {
            font-weight: bold;
            background: white;
            color: black;
        }
        .text-right {
            text-align: right;
        }
        .text-center {
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
        <img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path($company->company_logo ?? '/build/img/logo.png'))) }}" alt="Company Logo" class="logo">
            <div class="company-info">
                <div class="company-name">{{ $company->company_name }}</div>
                <div class="company-address"><br>
                {{ $company->address }}<br>
                    Tel: {{ $company->phone }}<br>
                    Email: {{ $company->email }}
                </div>
            </div>
        </div>
        <div class="document-title">QUOTATION</div>
        <div class="quotation-info">
            <div>Date: {{ now()->format('F d, Y') }}</div>
            <div>Valid until: {{ now()->addDays(7)->format('F d, Y') }}</div>
            <div><strong>Name:</strong> {{ $customerName }}</div>
        </div>
        <div class="section-title">Service Details</div>
        <table class="table">
            <thead>
                <tr>
                    <th width="40%">Service</th>
                    <th class="text-right">Govt Cost</th>
                    <th class="text-right">Service Fee</th>
                    <th class="text-right">Discount</th>
                    <th class="text-right">Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach($services as $index => $service)
                    <tr>
                        <td>{{ $service['name'] }}</td>
                        <td class="text-right">{{ number_format($service['govt_cost'], 2) }}</td>
                        <td class="text-right">{{ number_format($service['service_cost'], 2) }}</td>
                        <td class="text-right">{{ $service['discount'] }}%</td>
                        <td class="text-right">{{ number_format($service['total'], 2) }}</td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th colspan="4" class="text-right">Subtotal</th>
                    <td class="text-right">{{ number_format($grandTotal, 2) }}</td>
                </tr>
                @if(isset($taxRate) && $taxRate > 0)
                <tr>
                    <th colspan="4" class="text-right">Tax ({{ $taxRate }}%)</th>
                    <td class="text-right">{{ number_format($grandTotal * $taxRate / 100, 2) }}</td>
                </tr>
                <tr>
                    <th colspan="4" class="text-right">Grand Total</th>
                    <td class="text-right">{{ number_format($grandTotal * (1 + $taxRate / 100), 2) }}</td>
                </tr>
                @else
                <tr>
                    <th colspan="4" class="text-right">Grand Total</th>
                    <td class="text-right">{{ number_format($grandTotal, 2) }}</td>
                </tr>
                @endif
            </tfoot>
        </table>        
    </div>
</body>
</html>