<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class OrdersSummarySheet implements FromCollection, WithTitle, WithHeadings, WithStyles
{
    protected $summary;

    public function __construct($summary)
    {
        $this->summary = $summary;
    }

    public function collection()
    {
        $data = [
            ['Ringkasan Penjualan'],
            [''],
            ['Total Pesanan', $this->summary['total_orders']],
            ['Total Pendapatan', 'Rp ' . number_format($this->summary['total_revenue'], 0, ',', '.')],
            ['Rata-rata Pesanan/Hari', number_format($this->summary['avg_orders_per_day'], 1)],
            [''],
            ['Menu Terpopuler'],
            ['Menu', 'Jumlah Terjual', 'Total Pendapatan']
        ];

        foreach ($this->summary['popular_items'] as $item) {
            $data[] = [
                $item['name'],
                $item['quantity'],
                'Rp ' . number_format($item['revenue'], 0, ',', '.')
            ];
        }

        return collect($data);
    }

    public function title(): string
    {
        return 'Ringkasan';
    }

    public function headings(): array
    {
        return [];
    }

    public function styles(Worksheet $sheet)
    {
        return [
            1 => ['font' => ['bold' => true, 'size' => 14]],
            7 => ['font' => ['bold' => true]],
            8 => ['font' => ['bold' => true]],
        ];
    }
} 