<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Expense;
use App\Models\Application;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ExpensesExport;
use App\Exports\ApplicationsExport;

class ExcelController extends Controller
{
    public function downloadExpensesExcel()
    {
        return Excel::download(new ExpensesExport, 'expenses.xlsx');
    }

    public function downloadApplicationsExcel()
    {
        return Excel::download(new ApplicationsExport, 'applications.xlsx');
    }
}
