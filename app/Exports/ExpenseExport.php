<?php

namespace App\Exports;

use App\Models\Expense;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;

class ExpenseExport implements FromCollection, WithHeadings, WithMapping, WithStyles, ShouldAutoSize, WithColumnFormatting
{
    private $rowNumber = 0;

    public function collection()
    {
        return Expense::with('user')->orderBy('created_at', 'desc')->get(['name', 'amount', 'date', 'description', 'created_at', 'user_id']);
    }

    public function headings(): array
    {
        return [
            'S. No',
            'Expense Name',
            'Amount (AED)',
            'Date',
            'Description',
            'Added By',
            'Created At',
        ];
    }

    public function map($expense): array
    {
        return [
            ++$this->rowNumber,
            $expense->name,
            number_format($expense->amount, 2),
            $expense->date,
            $expense->description,
            $expense->user->name,
            $expense->created_at->format('Y-m-d H:i:s'),
        ];
    }

    public function styles(Worksheet $sheet)
    {
        $sheet->getStyle('A1:G1')->applyFromArray([
            'font' => [
                'bold' => true,
                'color' => ['rgb' => 'FFFFFF'],
            ],
            'fill' => [
                'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                'startColor' => ['rgb' => '4CAF50'],
            ],
        ]);

        $sheet->getStyle('A:G')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
    }

    public function columnFormats(): array
    {
        return [
            'C' => NumberFormat::FORMAT_NUMBER_00, // Amount
            'D' => NumberFormat::FORMAT_DATE_DDMMYYYY, // Date
        ];
    }
}
