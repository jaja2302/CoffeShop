<div class="py-4">
    <x-slot name="header">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between">
            <h2 class="text-xl font-semibold text-gray-800">Manajemen Menu</h2>
        </div>
    </x-slot>

    <div class="bg-white rounded-lg shadow-sm overflow-hidden">
        <div class="p-4 sm:p-6">
            <!-- Table Section -->
            <div class="overflow-x-auto">
                {{ $this->table }}
            </div>
        </div>
    </div>
</div>
