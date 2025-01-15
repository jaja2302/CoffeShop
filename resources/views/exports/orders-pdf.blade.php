<!DOCTYPE html>
<html>
<head>
    <title>Laporan Penjualan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .header {
            text-align: center;
            margin-bottom: 30px;
        }
        .company-name {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 5px;
        }
        .report-title {
            font-size: 18px;
            margin-bottom: 5px;
        }
        .period {
            font-size: 14px;
            color: #666;
            margin-bottom: 20px;
        }
        .summary-box {
            border: 1px solid #ddd;
            padding: 15px;
            margin-bottom: 20px;
            background-color: #f9f9f9;
        }
        .summary-grid {
            display: grid;
            grid-template-columns: 1fr 1fr 1fr;
            gap: 15px;
            margin-bottom: 20px;
        }
        .summary-item {
            padding: 10px;
        }
        .summary-label {
            font-size: 12px;
            color: #666;
        }
        .summary-value {
            font-size: 16px;
            font-weight: bold;
            color: #000;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
            font-size: 12px;
        }
        th {
            background-color: #f2f2f2;
            font-weight: bold;
        }
        .popular-items {
            margin-top: 20px;
            padding: 15px;
            border: 1px solid #ddd;
        }
        .footer {
            margin-top: 30px;
            text-align: center;
            font-size: 12px;
            color: #666;
        }
    </style>
</head>
<body>
    <div class="header">
        <div class="company-name">{{ config('app.name') }}</div>
        <div class="report-title">Laporan Penjualan</div>
        <div class="period">Periode: {{ \Carbon\Carbon::parse($startDate)->format('d F Y') }} - {{ \Carbon\Carbon::parse($endDate)->format('d F Y') }}</div>
    </div>

    <div class="summary-box">
        <div class="summary-grid">
            <div class="summary-item">
                <div class="summary-label">Total Pesanan</div>
                <div class="summary-value">{{ $summary['total_orders'] }}</div>
            </div>
            <div class="summary-item">
                <div class="summary-label">Total Pendapatan</div>
                <div class="summary-value">Rp {{ number_format($summary['total_revenue'], 0, ',', '.') }}</div>
            </div>
            <div class="summary-item">
                <div class="summary-label">Rata-rata Pesanan/Hari</div>
                <div class="summary-value">{{ number_format($summary['avg_orders_per_day'], 1) }}</div>
            </div>
        </div>
    </div>

    <div class="popular-items">
        <h3>Menu Terpopuler</h3>
        <table>
            <thead>
                <tr>
                    <th>Menu</th>
                    <th>Jumlah Terjual</th>
                    <th>Total Pendapatan</th>
                </tr>
            </thead>
            <tbody>
                @foreach($summary['popular_items'] as $item)
                    <tr>
                        <td>{{ $item['name'] }}</td>
                        <td>{{ $item['quantity'] }}</td>
                        <td>Rp {{ number_format($item['revenue'], 0, ',', '.') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <h3>Detail Pesanan</h3>
    <table>
        <thead>
            <tr>
                <th>Tanggal</th>
                <th>Customer</th>
                <th>Items</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach($orders as $order)
                <tr>
                    <td>{{ $order->created_at->format('d-m-Y H:i') }}</td>
                    <td>{{ $order->user->name }}</td>
                    <td>
                        @php
                            $items = json_decode($order->items, true);
                            $total = 0;
                            $itemsList = [];
                            foreach($items as $item) {
                                $itemsList[] = $item['name'] . ' (x' . $item['quantity'] . ')';
                                $total += $item['price'] * $item['quantity'];
                            }
                        @endphp
                        {{ implode(', ', $itemsList) }}
                    </td>
                    <td>Rp {{ number_format($total, 0, ',', '.') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="footer">
        <p>Laporan dibuat pada: {{ now()->format('d F Y H:i') }}</p>
    </div>
</body>
</html> 