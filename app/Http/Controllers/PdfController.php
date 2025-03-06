<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Transaction;
use App\Models\Company;
use Barryvdh\DomPDF\Facade\Pdf as PDF;
use Illuminate\Http\Request;

class PdfController extends Controller
{
    
    public function downloadInvoice($orderId)
    {
        $company = Company::first();
        $invoiceTemplates = json_decode($company->invoice_templates, true);
        $activeTemplate = collect($invoiceTemplates)->firstWhere('active', true)['template_name'];
        $profileData = Order::with(['transactions', 'transactions.service'])->findOrFail($orderId);
        $pdf = PDF::loadView('pages.invoices.'.$activeTemplate, compact('profileData'));
        return $pdf->download('invoice_' . $profileData->customer_name . '.pdf');
    }

    
    public function downloadQuotation(Request $request)
    {
        $company = Company::first();
        $customerName = $request->get('customer');
        $servicesData = json_decode($request->get('services_data'), true);
        if (empty($servicesData)) {
            $services = [
                ['name' => 'Service A', 'govt_cost' => 100, 'service_cost' => 200, 'discount' => 5, 'total' => 285],
            ];
        } else {
            $services = $servicesData;
        }
        $grandTotal = collect($services)->sum('total');
        $taxRate = config('app.tax_rate', 0); 
        $pdf = PDF::loadView('pages.orders.quotation', compact(
            'customerName', 
            'services', 
            'grandTotal',
            'company',
            'taxRate'
        ));
        $pdf->setPaper('a4');
        $pdf->setOptions([
            'isHtml5ParserEnabled' => true,
            'isPhpEnabled' => true,
        ]);
        $filename = 'Quotation-' . date('Ymd') . '-' . $customerName . '.pdf';
        return $pdf->download($filename);
    }
    

}
