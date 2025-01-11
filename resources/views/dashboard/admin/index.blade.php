<x-layouts.admin>
    <x-slot name="title">Admin Dashboard</x-slot>
    <x-slot name="header">Admin Control Panel</x-slot>

    <x-slot name="sidebar">
        <div class="px-4 py-2">
            <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-brown-100 rounded">Orders</a>
            <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-brown-100 rounded">Menu Management</a>
            <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-brown-100 rounded">Users</a>
            <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-brown-100 rounded">Reports</a>
            <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-brown-100 rounded">Settings</a>
        </div>
    </x-slot>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        <div class="bg-white p-6 rounded-lg shadow">
            <h3 class="text-lg font-semibold mb-4">Today's Orders</h3>
            <!-- Add orders statistics -->
        </div>
        <div class="bg-white p-6 rounded-lg shadow">
            <h3 class="text-lg font-semibold mb-4">Revenue</h3>
            <!-- Add revenue statistics -->
        </div>
        <div class="bg-white p-6 rounded-lg shadow">
            <h3 class="text-lg font-semibold mb-4">Popular Items</h3>
            <!-- Add popular items statistics -->
        </div>
        <div class="bg-white p-6 rounded-lg shadow">
            <h3 class="text-lg font-semibold mb-4">Inventory Status</h3>
            <!-- Add inventory statistics -->
        </div>
    </div>
</x-layouts.admin>