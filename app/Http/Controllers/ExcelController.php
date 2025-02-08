<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\TransactionExport;

class ExcelController extends Controller
{
    public function downloadTransactions()
    {
        return Excel::download(new TransactionExport, 'Transactions.xlsx');
    }
}
