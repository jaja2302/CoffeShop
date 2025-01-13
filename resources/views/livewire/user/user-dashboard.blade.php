<div>
    <x-slot name="title">Coffee Shop</x-slot>

    <!-- Main content -->
    <div class="w-full min-h-screen bg-[#f3ebe3]">
        <!-- Cart Button (Floating) -->
        <div class="fixed bottom-8 right-8 z-[60]">
            <button wire:click="toggleCart" class="bg-black text-white p-4 rounded-full shadow-lg hover:bg-gray-800 transition-all">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                </svg>
                @if(session()->has('cart') && count(session('cart')) > 0)
                    <span class="absolute -top-2 -right-2 bg-red-500 text-white rounded-full w-6 h-6 flex items-center justify-center text-xs">
                        {{ count(session('cart')) }}
                    </span>
                @endif
            </button>
        </div>

        <!-- Floating Category Navigation -->
        <div class="fixed right-8 top-1/2 -translate-y-1/2 space-y-4 z-50">
            @foreach($categories as $category)
            <a href="#{{ Str::slug($category->name) }}" class="bg-white p-4 rounded-xl shadow-md flex items-center space-x-3 hover:scale-105 transition-transform">
                <div class="w-10 h-10 bg-yellow-100 rounded-full flex items-center justify-center">
                    <svg class="w-6 h-6 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path d="M4 19h16l-1.4-5.6A2 2 0 0016.7 12H7.3a2 2 0 00-1.9 1.4L4 19zm0 0a2 2 0 002 2h12a2 2 0 002-2M6 7h12M6 7a2 2 0 012-2h8a2 2 0 012 2M6 7v3h12V7" />
                    </svg>
                </div>
                <div>
                    <h3 class="font-semibold">{{ $category->name }}</h3>
                    <p class="text-sm text-gray-500">Our signature items</p>
                </div>
            </a>
            @endforeach
        </div>

        <!-- Main Content Section -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <!-- Hero Section with Featured Item -->
            <div class="grid grid-cols-2 gap-8 items-center">
                <!-- Left Column -->
                <div class="space-y-6">
                    @if($featuredItems->isNotEmpty())
                        @php $mainProduct = $featuredItems->first(); @endphp
                        <h1 class="text-6xl font-bold" style="font-family: 'Poppins', sans-serif;">{{ $mainProduct->name }}</h1>
                        <p class="text-gray-600 text-lg">
                            {{ $mainProduct->description }}
                        </p>
                        <div class="text-4xl font-bold">Rp {{ number_format($mainProduct->price, 0, ',', '.') }}</div>
                        <button 
                            wire:click="addToCart({{ $mainProduct->id }})" 
                            class="bg-black text-white px-8 py-3 rounded-full hover:bg-gray-800 transition flex items-center space-x-2"
                        >
                            <span>Buy Now</span>
                            <span class="w-2 h-2 bg-orange-500 rounded-full"></span>
                        </button>
                    @endif
                </div>

                <!-- Right Column -->
                <div class="relative">
                    <div class="bg-[#ff9f8d] rounded-full p-12 relative">
                        <img src="{{ asset('storage/' . ($mainProduct->image ?? 'placeholder.jpg')) }}" 
                             alt="{{ $mainProduct->name ?? 'Featured Product' }}" 
                             class="w-full">
                    </div>

                    <!-- Feature Cards -->
                    <div class="absolute right-0 top-1/2 -translate-y-1/2 space-y-4">
                        <!-- Feature cards here -->
                    </div>
                </div>
            </div>

            <!-- Featured Products Grid -->
            <div class="mt-24 bg-black rounded-3xl p-12">
                <div class="grid grid-cols-3 gap-8">
                    @foreach($featuredItems as $item)
                    <div class="text-center">
                        <div class="relative inline-block">
                            <div class="bg-[#f4d03f] rounded-full p-8">
                                <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->name }}" class="w-48 mx-auto">
                            </div>
                            <span class="absolute bottom-0 right-0 bg-white rounded-full px-3 py-1 flex items-center">
                                {{ $item->rating ?? '5.0' }} <span class="text-yellow-400 ml-1">★</span>
                            </span>
                        </div>
                        <h3 class="text-xl font-semibold mt-4 text-white">{{ $item->name }}</h3>
                        <button 
                            wire:click="addToCart({{ $item->id }})"
                            class="mt-2 text-gray-400 hover:text-white flex items-center justify-center space-x-2 mx-auto"
                        >
                            <span>Add to order</span>
                            <span class="text-xl">+</span>
                        </button>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>

        <!-- Product Sections by Category -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            @foreach($categories as $category)
            <section id="{{ Str::slug($category->name) }}" class="py-16">
                <h2 class="text-3xl font-bold mb-8">{{ $category->name }}</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach($category->menuItems as $item)
                    <div class="text-center">
                        <div class="relative inline-block">
                            <div class="bg-[#f4d03f] rounded-full p-8">
                                <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->name }}" class="w-48 mx-auto">
                            </div>
                            <span class="absolute bottom-0 right-0 bg-white rounded-full px-3 py-1 flex items-center">
                                {{ $item->rating ?? '5.0' }} <span class="text-yellow-400 ml-1">★</span>
                            </span>
                        </div>
                        <h3 class="text-xl font-semibold mt-4">{{ $item->name }}</h3>
                        <p class="text-gray-500">Rp {{ number_format($item->price, 0, ',', '.') }}</p>
                        <button 
                            wire:click="addToCart({{ $item->id }})"
                            class="mt-2 text-gray-600 hover:text-black flex items-center justify-center space-x-2 mx-auto"
                        >
                            <span>Add to order</span>
                            <span class="text-xl">+</span>
                        </button>
                    </div>
                    @endforeach
                </div>
            </section>
            @endforeach
        </div>

        <!-- Cart Modal -->
        @if($showCartModal)
        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity z-[70]">
            <div class="fixed inset-0 overflow-hidden">
                <div class="absolute inset-0 overflow-hidden">
                    <div class="fixed inset-y-0 right-0 pl-10 max-w-full flex">
                        <div class="w-screen max-w-md">
                            <div class="h-full flex flex-col bg-white shadow-xl">
                                <!-- Header -->
                                <div class="flex items-start justify-between p-4 border-b border-gray-200">
                                    <h2 class="text-lg font-medium text-gray-900">Shopping Cart</h2>
                                    <button wire:click="toggleCart" class="text-gray-400 hover:text-gray-500">
                                        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                        </svg>
                                    </button>
                                </div>

                                <!-- Cart Items -->
                                <div class="flex-1 overflow-y-auto p-4">
                                    @if(count($cartItems) > 0)
                                        <div class="flow-root">
                                            <ul role="list" class="-my-6 divide-y divide-gray-200">
                                                @foreach($cartItems as $id => $item)
                                                    <li class="py-6 flex">
                                                        <div class="flex-1 ml-4">
                                                            <div class="flex justify-between">
                                                                <div>
                                                                    <h3 class="text-base font-medium text-gray-900">
                                                                        {{ $item['name'] }}
                                                                    </h3>
                                                                    <p class="mt-1 text-sm text-gray-500">
                                                                        Qty: {{ $item['quantity'] }}
                                                                    </p>
                                                                </div>
                                                                <p class="text-base font-medium text-gray-900">
                                                                    Rp {{ number_format($item['price'], 0, ',', '.') }}
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @else
                                        <p class="text-gray-500 text-center py-8">Your cart is empty</p>
                                    @endif
                                </div>

                                <!-- Footer with Total and Buttons -->
                                <div class="border-t border-gray-200 p-4">
                                    @if(count($cartItems) > 0)
                                        <div class="flex justify-between text-base font-medium text-gray-900 mb-4">
                                            <p>Total</p>
                                            <p>Rp {{ number_format(collect($cartItems)->sum(function($item) {
                                                return $item['price'] * $item['quantity'];
                                            }), 0, ',', '.') }}</p>
                                        </div>
                                        <div class="flex space-x-4">
                                            <button
                                                wire:click="clearCart"
                                                class="flex-1 px-6 py-3 border border-transparent text-base font-medium rounded-md text-red-700 bg-red-100 hover:bg-red-200"
                                            >
                                                Clear Cart
                                            </button>
                                            <button
                                                wire:click="checkout"
                                                class="flex-1 px-6 py-3 border border-transparent text-base font-medium rounded-md text-white bg-black hover:bg-gray-800"
                                            >
                                                Checkout
                                            </button>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif
    </div>
</div>