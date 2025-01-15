<?php

namespace App\Exports;

use App\Models\OrderItem;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Carbon\Carbon;

class OrdersExport implements WithMultipleSheets
{
    protected $startDate;
    protected $endDate;
    protected $summary;

    public function __construct($startDate, $endDate)
    {
        $this->startDate = $startDate;
        $this->endDate = $endDate;
        $this->calculateSummary();
    }

    protected function calculateSummary()
    {
        $orders = OrderItem::whereBetween('created_at', [
            Carbon::parse($this->startDate)->startOfDay(),
            Carbon::parse($this->endDate)->endOfDay()
        ])->get();

        $totalRevenue = 0;
        $itemStats = [];

        foreach ($orders as $order) {
            $items = json_decode($order->items, true);
            foreach ($items as $item) {
                $revenue = $item['price'] * $item['quantity'];
                $totalRevenue += $revenue;

                if (!isset($itemStats[$item['name']])) {
                    $itemStats[$item['name']] = [
                        'quantity' => 0,
                        'revenue' => 0
                    ];
                }
                $itemStats[$item['name']]['quantity'] += $item['quantity'];
                $itemStats[$item['name']]['revenue'] += $revenue;
            }
        }

        $days = Carbon::parse($this->startDate)->diffInDays(Carbon::parse($this->endDate)) + 1;

        $this->summary = [
            'total_orders' => $orders->count(),
            'total_revenue' => $totalRevenue,
            'avg_orders_per_day' => $orders->count() / $days,
            'popular_items' => collect($itemStats)->map(function ($stats, $name) {
                return [
                    'name' => $name,
                    'quantity' => $stats['quantity'],
                    'revenue' => $stats['revenue']
                ];
            })->sortByDesc('quantity')->take(5)
        ];
    }

    public function sheets(): array
    {
        return [
            'Ringkasan' => new OrdersSummarySheet($this->summary),
            'Detail Pesanan' => new OrdersDetailSheet($this->startDate, $this->endDate)
        ];
    }
} 