<?php

namespace App\Exports;

use App\Models\Application;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ApplicationsExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return Application::all();
    }

    public function headings(): array
    {
        return [
            'ID',
            'Applicant Name',
            'Application Date',
            'Status',
            'Created At',
            'Updated At',
        ];
    }
}

