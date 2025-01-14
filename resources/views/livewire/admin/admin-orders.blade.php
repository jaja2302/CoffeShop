<div>
  
    <!-- Date Filter -->
    <div class="bg-white p-4 rounded-lg shadow mb-6">
        <div class="flex flex-wrap items-center gap-4">
            <div class="flex items-center gap-2">
                <button wire:click="setDateRange('today')" 
                    class="px-4 py-2 text-sm rounded-md {{ $startDate == Carbon\Carbon::today()->format('Y-m-d') ? 'bg-blue-500 text-white' : 'bg-gray-100' }}">
                    Today
                </button>
                <button wire:click="setDateRange('yesterday')"
                    class="px-4 py-2 text-sm rounded-md {{ $startDate == Carbon\Carbon::yesterday()->format('Y-m-d') ? 'bg-blue-500 text-white' : 'bg-gray-100' }}">
                    Yesterday
                </button>
                <button wire:click="setDateRange('this_week')"
                    class="px-4 py-2 text-sm rounded-md {{ $startDate == Carbon\Carbon::now()->startOfWeek()->format('Y-m-d') ? 'bg-blue-500 text-white' : 'bg-gray-100' }}">
                    This Week
                </button>
                <button wire:click="setDateRange('this_month')"
                    class="px-4 py-2 text-sm rounded-md {{ $startDate == Carbon\Carbon::now()->startOfMonth()->format('Y-m-d') ? 'bg-blue-500 text-white' : 'bg-gray-100' }}">
                    This Month
                </button>
            </div>
            <div class="flex items-center gap-2">
                <input type="date" wire:model="startDate" class="rounded-md border-gray-300">
                <span class="text-gray-500">to</span>
                <input type="date" wire:model="endDate" class="rounded-md border-gray-300">
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
        <!-- Orders Count -->
        <div class="bg-white rounded-lg shadow p-6">
            <h3 class="text-lg font-semibold text-gray-700">Orders</h3>
            <p class="text-3xl font-bold text-blue-600">{{ $todayOrders }}</p>
        </div>

        <!-- Revenue -->
        <div class="bg-white rounded-lg shadow p-6">
            <h3 class="text-lg font-semibold text-gray-700">Revenue</h3>
            <p class="text-3xl font-bold text-green-600">Rp {{ number_format($todayRevenue, 0, ',', '.') }}</p>
        </div>

        <!-- Popular Items -->
        <div class="bg-white rounded-lg shadow p-6">
            <h3 class="text-lg font-semibold text-gray-700">Popular Items</h3>
            <ul class="mt-2">
                @foreach($popularItems as $item => $count)
                    <li class="text-gray-600">{{ $item }} - {{ $count }} orders</li>
                @endforeach
            </ul>
        </div>
    </div>

    <div class="mt-6">
        {{ $this->table }}
    </div>

    <!-- You can add order table or other order management features here -->
</div>
