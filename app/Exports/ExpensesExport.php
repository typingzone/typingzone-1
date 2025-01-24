<?php

namespace App\Exports;

use App\Models\Expense;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ExpensesExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return Expense::all();
    }

    public function headings(): array
    {
        return [
            'ID',
            'Title',
            'Amount',
            'Date',
            'Description',
            'Created At',
            'Updated At',
        ];
    }
}
