<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Carbon\Carbon;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;
use Illuminate\Contracts\View\View;
use App\Models\Category;
use App\Models\Menu;
use App\Models\OrderItem;
use Filament\Tables\Actions\CreateAction;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Radio;
class AdminOrders extends Component implements HasTable,HasForms
{
    use InteractsWithTable;
    use InteractsWithForms;
    
    public $todayOrders = 0;
    public $todayRevenue = 0;
    public $popularItems = [];
    public $startDate;
    public $endDate;

    public function mount()
    {
        // Default to today
        $this->startDate = Carbon::today()->format('Y-m-d');
        $this->endDate = Carbon::today()->format('Y-m-d');
        $this->loadStatistics();
    }

    public function loadStatistics()
    {
        $start = Carbon::parse($this->startDate)->startOfDay();
        $end = Carbon::parse($this->endDate)->endOfDay();
        
        $orders = OrderItem::whereBetween('created_at', [$start, $end])->get();
        
        $this->todayOrders = $orders->count();
        
        // Calculate revenue and popular items
        $itemCounts = [];
        $totalRevenue = 0;

        foreach ($orders as $order) {
            $items = json_decode($order->items, true);
            
            foreach ($items as $itemId => $item) {
                // Sum up revenue
                $totalRevenue += $item['price'] * $item['quantity'];
                
                // Count item popularity
                if (!isset($itemCounts[$item['name']])) {
                    $itemCounts[$item['name']] = 0;
                }
                $itemCounts[$item['name']] += $item['quantity'];
            }
        }

        $this->todayRevenue = $totalRevenue;
        
        // Get top 5 popular items
        arsort($itemCounts);
        $this->popularItems = array_slice($itemCounts, 0, 5, true);
    }

    public function updatedStartDate()
    {
        $this->loadStatistics();
    }

    public function updatedEndDate()
    {
        $this->loadStatistics();
    }

    public function setDateRange($range)
    {
        switch ($range) {
            case 'today':
                $this->startDate = Carbon::today()->format('Y-m-d');
                $this->endDate = Carbon::today()->format('Y-m-d');
                break;
            case 'yesterday':
                $this->startDate = Carbon::yesterday()->format('Y-m-d');
                $this->endDate = Carbon::yesterday()->format('Y-m-d');
                break;
            case 'this_week':
                $this->startDate = Carbon::now()->startOfWeek()->format('Y-m-d');
                $this->endDate = Carbon::now()->endOfWeek()->format('Y-m-d');
                break;
            case 'this_month':
                $this->startDate = Carbon::now()->startOfMonth()->format('Y-m-d');
                $this->endDate = Carbon::now()->endOfMonth()->format('Y-m-d');
                break;
        }

        $this->loadStatistics();
    }


    public function table(Table $table): Table
    {
        return $table
            ->query(OrderItem::query())
            ->columns([
                TextColumn::make('items')
                ->label('Order')
                ->state(function(OrderItem $record){
                    $items = json_decode($record->items, true);
                    $itemNames = array_map(function($item) {
                        return $item['name'];
                    }, $items);
                    // dd(implode(', ', $itemNames));
                    return implode(',', $itemNames);
                })
                ->badge()
                ->separator(','),
                TextColumn::make('created_at')
                ->state(function(OrderItem $record){
                    return Carbon::parse($record->created_at)->format('d-m-Y');
                })
                ->label('Order Date'),
                TextColumn::make('user.name'),
            ]);
    }
    public function render()
    {
        return view('livewire.admin.admin-orders', [
            'todayOrders' => $this->todayOrders,
            'todayRevenue' => $this->todayRevenue,
            'popularItems' => $this->popularItems,
        ])->layout('components.layouts.admin');
    }
}
