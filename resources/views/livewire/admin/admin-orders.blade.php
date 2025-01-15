<div class="py-4">
    <x-slot name="header">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between">
            <h2 class="text-xl font-semibold text-gray-800">Pesanan</h2>
        </div>
    </x-slot>
    <!-- Date Filter -->
    <div class="bg-white p-4 rounded-lg shadow mb-6">
        <div class="flex flex-wrap items-center gap-4">
            <div class="flex items-center gap-2">
                <button wire:click="setDateRange('today')" 
                    class="px-4 py-2 text-sm rounded-md {{ $startDate == Carbon\Carbon::today()->format('Y-m-d') ? 'bg-blue-500 text-white' : 'bg-gray-100' }}">
                    Hari Ini
                </button>
                <button wire:click="setDateRange('yesterday')"
                    class="px-4 py-2 text-sm rounded-md {{ $startDate == Carbon\Carbon::yesterday()->format('Y-m-d') ? 'bg-blue-500 text-white' : 'bg-gray-100' }}">
                    Kemarin
                </button>
                <button wire:click="setDateRange('this_week')"
                    class="px-4 py-2 text-sm rounded-md {{ $startDate == Carbon\Carbon::now()->startOfWeek()->format('Y-m-d') ? 'bg-blue-500 text-white' : 'bg-gray-100' }}">
                    Minggu Ini
                </button>
                <button wire:click="setDateRange('this_month')"
                    class="px-4 py-2 text-sm rounded-md {{ $startDate == Carbon\Carbon::now()->startOfMonth()->format('Y-m-d') ? 'bg-blue-500 text-white' : 'bg-gray-100' }}">
                    Bulan Ini
                </button>
            </div>
            <div class="flex items-center gap-2">
                <input type="date" wire:model.live="startDate" class="rounded-md border-gray-300">
                <span class="text-gray-500">sampai</span>
                <input type="date" wire:model.live="endDate" class="rounded-md border-gray-300">
            </div>

            <!-- Export Buttons -->
            <div class="flex items-center gap-2 ml-auto">
                <button wire:click="exportPdf" class="px-4 py-2 text-sm bg-red-500 text-white rounded-md hover:bg-red-600 flex items-center gap-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                    Export PDF
                </button>
                <button wire:click="exportExcel" class="px-4 py-2 text-sm bg-green-500 text-white rounded-md hover:bg-green-600 flex items-center gap-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                    Export Excel
                </button>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
        <!-- Orders Count -->
        <div class="bg-white rounded-lg shadow p-6">
            <h3 class="text-lg font-semibold text-gray-700">Pesanan</h3>
            <p class="text-3xl font-bold text-blue-600">{{ $todayOrders }}</p>
        </div>

        <!-- Revenue -->
        <div class="bg-white rounded-lg shadow p-6">
            <h3 class="text-lg font-semibold text-gray-700">Pendapatan</h3>
            <p class="text-3xl font-bold text-green-600">Rp {{ number_format($todayRevenue, 0, ',', '.') }}</p>
        </div>

        <!-- Popular Items -->
        <div class="bg-white rounded-lg shadow p-6">
            <h3 class="text-lg font-semibold text-gray-700">Menu Terpopuler</h3>
            <ul class="mt-2">
                @foreach($popularItems as $item => $count)
                    <li class="text-gray-600">{{ $item }} - {{ $count }} pesanan</li>
                @endforeach
            </ul>
        </div>
    </div>

    <div class="mt-6">
        {{ $this->table }}
    </div>

    <!-- You can add order table or other order management features here -->
</div>
