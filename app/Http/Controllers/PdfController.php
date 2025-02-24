<?php

namespace App\Http\Controllers;

<<<<<<< HEAD
use Illuminate\Http\Request;
use App\Models\Expense;
use App\Models\Application;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ExpensesExport;
use App\Exports\ApplicationsExport;

class PdfController extends Controller
{
    public function downloadExpensesPdf()
    {
       
    }

    public function downloadApplicationsPdf()
    {
        
    }
=======
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
        $activeTemplate = collect($company->invoice_templates)->firstWhere('active', true)['template_name'];
        $profileData = Order::with(['transactions', 'transactions.service'])->findOrFail($orderId);
        $pdf = PDF::loadView('pages.invoices.'.$activeTemplate, compact('profileData'));
        return $pdf->download('invoice_' . $profileData->customer_name . '.pdf');
    }
    

>>>>>>> 023abcbfc092666fd811ecc2b6e7e0a49bdf5ac0

}
