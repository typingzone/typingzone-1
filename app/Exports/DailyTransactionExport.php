<?php

namespace App\Exports;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class DailyTransactionExport
{
    protected $transactions;

    public function __construct($transactions)
    {
        $this->transactions = $transactions;
    }

    public function handle(): string
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $sheet->fromArray([[
            'Application No',
            'Customer Name',
            'Service Name',
            'Government Cost',
            'Service Cost',
            'Total Cost',
            'Status',
            'Payment Status',
            'Date'
        ]], null, 'A1');

        $sheet->getStyle('A1:K1')->getFont()->setBold(true);

        $row = 2;
        foreach ($this->transactions as $transaction) {
            $sheet->fromArray([[
                $transaction->application_no,
                $transaction->order->customer_name,
                $transaction->service->service_name,
                $transaction->govt_cost,
                $transaction->service_cost,
                $transaction->total_cost,
                $transaction->status,
                $transaction->pay_status,
                $transaction->created_at->format('Y-m-d H:i:s')
            ]], null, "A{$row}");
            $row++;
        }

        foreach (range('A', 'K') as $column) {
            $sheet->getColumnDimension($column)->setAutoSize(true);
        }

        $fileName = 'transactions-' . now()->format('Y-m-d') . '.xlsx';
        $filePath = storage_path('app/temp/' . $fileName);

        if (!file_exists(storage_path('app/temp'))) {
            mkdir(storage_path('app/temp'), 0755, true);
        }

        $writer = new Xlsx($spreadsheet);
        $writer->save($filePath);

        return $filePath;
    }
}