<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Transaction;
use Barryvdh\DomPDF\Facade\Pdf as PDF;
use Illuminate\Http\Request;

class PdfController extends Controller
{
    
    public function downloadInvoice($orderId)
    {
        $profileData = Order::with(['transactions', 'transactions.service'])->findOrFail($orderId);
        $pdf = PDF::loadView('pages.invoices.invoice-template', compact('profileData'));
        return $pdf->download('invoice_' . $profileData->customer_name . '.pdf');
    }



}
