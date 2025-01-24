<?php

namespace App\Http\Controllers;

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

}
