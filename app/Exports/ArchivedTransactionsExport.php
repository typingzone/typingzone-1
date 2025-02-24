<?php

namespace App\Exports;

use App\Models\Service;
use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use Illuminate\Support\Facades\DB;

class ArchivedTransactionsExport implements FromCollection, WithHeadings, WithMapping, WithStyles, ShouldAutoSize, WithColumnFormatting
{
    private $rowNumber = 0;
    protected $tableName;

    public function __construct($tableName)
    {
        $this->tableName = $tableName;
    }

    public function collection()
    {
        $orders = DB::table($this->tableName)
            ->join('users', $this->tableName . '.assign_to', '=', 'users.id')
            ->select(
                DB::raw('ROW_NUMBER() OVER () AS row_num'),
                $this->tableName . '.customer_name',
                $this->tableName . '.phone_number',
                $this->tableName . '.email',
                $this->tableName . '.services',
                $this->tableName . '.description',
                'users.name as assigned_to',
                $this->tableName . '.status',
                $this->tableName . '.created_at'
            )
            ->get();

        $orders->transform(function ($order) {
            $serviceNames = [];
            if ($order->services) {
                $serviceIds = explode(',', $order->services);
                foreach ($serviceIds as $serviceId) {
                    $service = Service::find(trim($serviceId));
                    if ($service) {
                        $serviceNames[] = $service->service_name;
                    }
                }
            }
            $order->services = implode(', ', $serviceNames);
            return $order;
        });

        return $orders;
    }

    public function headings(): array
    {
        return [
            'S. No',
            'Customer Name',
            'Phone Number',
            'Email',
            'Services',
            'Description',
            'Assigned To',
            'Status',
            'Created At',
        ];
    }

    public function map($order): array
    {
        return [
            ++$this->rowNumber,
            $order->customer_name,
            $order->phone_number,
            $order->email,
            $order->services,
            $order->description,
            $order->assigned_to,
            $order->status,
            $order->created_at,
        ];
    }

    public function styles(Worksheet $sheet)
    {
        $sheet->getStyle('A1:I1')->applyFromArray([
            'font' => [
                'bold' => true,
                'color' => ['rgb' => 'FFFFFF'],
            ],
            'fill' => [
                'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                'startColor' => ['rgb' => '4CAF50'],
            ],
        ]);

        $sheet->getStyle('A:I')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
    }

    public function columnFormats(): array
    {
        return [
            'C' => NumberFormat::FORMAT_NUMBER_00, 
            'I' => NumberFormat::FORMAT_DATE_DDMMYYYY, 
        ];
    }
}
