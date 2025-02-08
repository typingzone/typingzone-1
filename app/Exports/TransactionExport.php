<?php

namespace App\Exports;

use App\Models\Transaction;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;


class TransactionExport implements FromCollection, WithHeadings, WithMapping, WithStyles, ShouldAutoSize, WithColumnFormatting
{
    public function collection()
    {
        return Transaction::with(['service', 'order'])->orderBy('created_at', 'desc')->get();
    }

    public function headings(): array
    {
        return [
            'S/N',
            'Customer Name',
            'Customer Email',
            'Customer Phone',
            'Service Name',
            'Application No',
            'Govt Cost',
            'Service Cost',
            'Total Cost',
            'Paid By',
            'Created Time'
        ];
    }

    public function map($transaction): array
    {
        static $rowNumber = 0;
        $rowNumber++;

        return [
            $rowNumber,
            $transaction->order->customer_name ?? '',
            $transaction->order->email ?? '',
            $transaction->order->phone_number ?? '',
            $transaction->service->service_name ?? '',
            $transaction->application_no,
            $transaction->govt_cost,
            $transaction->service_cost,
            $transaction->total_cost,
            $transaction->paid_by,
            $transaction->created_at->format('Y-m-d H:i:s'),
        ];
    }

    public function styles(Worksheet $sheet)
    {
        $sheet->getStyle('A1:K1')->applyFromArray([
            'font' => [
                'bold' => true,
                'color' => ['rgb' => 'FFFFFF'],
            ],
            'fill' => [
                'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                'startColor' => ['rgb' => '4CAF50'],
            ],
        ]);

        $sheet->getStyle('A:K')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
    }

    public function columnFormats(): array
    {
        return [
            'G' => NumberFormat::FORMAT_NUMBER_00, // Govt Cost
            'H' => NumberFormat::FORMAT_NUMBER_00, // Service Cost
            'I' => NumberFormat::FORMAT_NUMBER_00, // Total Cost
        ];
    }
}
