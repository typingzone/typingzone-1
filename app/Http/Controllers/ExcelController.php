<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\TransactionExport;
use App\Exports\ExpenseExport;

class ExcelController extends Controller
{
    public function downloadTransactions()
    {
        return Excel::download(new TransactionExport, 'Transactions.xlsx');
    }

    public function downloadExpenses()
    {
        return Excel::download(new ExpenseExport, 'Expenses.xlsx');
    }
}
