<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
<<<<<<< HEAD
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
=======
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
>>>>>>> 023abcbfc092666fd811ecc2b6e7e0a49bdf5ac0
    }
}
