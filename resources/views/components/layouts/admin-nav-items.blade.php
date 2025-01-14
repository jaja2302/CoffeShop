<div class="px-4 py-2">
    <a href="{{ route('admin.menu') }}" 
       class="block px-4 py-2 text-gray-700 hover:bg-brown-100 rounded transition duration-150 ease-in-out">
        <div class="flex items-center space-x-2">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
            </svg>
            <span>Menu Management</span>
        </div>
    </a>
    <a href="{{ route('admin.order') }}" 
       class="block px-4 py-2 text-gray-700 hover:bg-brown-100 rounded transition duration-150 ease-in-out">
        <div class="flex items-center space-x-2">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/>
            </svg>
            <span>Orders</span>
        </div>
    </a>
</div>

@auth('admin')
<div class="px-4 py-2 mt-4">
    <form method="POST" action="{{ route('admin.logout') }}">
        @csrf
        <button type="submit" 
                class="block w-full px-4 py-2 text-left text-gray-700 hover:bg-brown-100 rounded transition duration-150 ease-in-out">
            <div class="flex items-center space-x-2">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                </svg>
                <span>Logout</span>
            </div>
        </button>
    </form>
</div>
@endauth 