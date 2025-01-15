<?php

namespace App\Exports;

use App\Models\OrderItem;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Carbon\Carbon;

class OrdersDetailSheet implements FromCollection, WithTitle, WithHeadings, WithStyles
{
    protected $startDate;
    protected $endDate;

    public function __construct($startDate, $endDate)
    {
        $this->startDate = $startDate;
        $this->endDate = $endDate;
    }

    public function collection()
    {
        $orders = OrderItem::whereBetween('created_at', [
            Carbon::parse($this->startDate)->startOfDay(),
            Carbon::parse($this->endDate)->endOfDay()
        ])
        ->with('user')
        ->get();

        return $orders->map(function ($order) {
            $items = json_decode($order->items, true);
            $total = 0;
            $itemsList = [];
            
            foreach($items as $item) {
                $itemsList[] = $item['name'] . ' (x' . $item['quantity'] . ')';
                $total += $item['price'] * $item['quantity'];
            }

            return [
                'Tanggal' => $order->created_at->format('d-m-Y H:i'),
                'Customer' => $order->user->name,
                'Items' => implode(', ', $itemsList),
                'Total' => 'Rp ' . number_format($total, 0, ',', '.')
            ];
        });
    }

    public function title(): string
    {
        return 'Detail Pesanan';
    }

    public function headings(): array
    {
        return [
            'Tanggal',
            'Customer',
            'Items',
            'Total'
        ];
    }

    public function styles(Worksheet $sheet)
    {
        return [
            1 => ['font' => ['bold' => true]],
        ];
    }
} 