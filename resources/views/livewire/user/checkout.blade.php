<div class="min-h-screen bg-gradient-to-b from-[#f3ebe3] to-white pt-20">
    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-white rounded-2xl shadow-xl p-8">
            <h2 class="text-3xl font-bold mb-8 text-gray-900">Checkout</h2>
            
            <!-- Order Summary -->
            <div class="space-y-6">
                <h3 class="text-xl font-semibold text-gray-900">Order Summary</h3>
                <div class="divide-y divide-gray-200">
                    @foreach($cartItems as $id => $item)
                        <div class="py-6 flex justify-between items-center">
                            <div class="flex items-center space-x-4">
                                <div class="h-20 w-20 flex-shrink-0 overflow-hidden rounded-md border border-gray-200">
                                    <img src="{{ asset('storage/' . $item['image']) }}" 
                                         alt="{{ $item['name'] }}"
                                         class="h-full w-full object-cover object-center">
                                </div>
                                <div>
                                    <h4 class="font-medium text-gray-900">{{ $item['name'] }}</h4>
                                    <div class="mt-2 flex items-center space-x-2">
                                        <button wire:click="decrementItem({{ $id }})"
                                                class="text-gray-500 hover:text-gray-700">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4"/>
                                            </svg>
                                        </button>
                                        <span class="text-gray-900">{{ $item['quantity'] }}</span>
                                        <button wire:click="incrementItem({{ $id }})"
                                                class="text-gray-500 hover:text-gray-700">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                                            </svg>
                                        </button>
                                        <button wire:click="removeItem({{ $id }})" 
                                                class="ml-4 text-red-500 hover:text-red-700">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                                      d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <p class="font-medium text-gray-900">Rp {{ number_format($item['price'] * $item['quantity'], 0, ',', '.') }}</p>
                        </div>
                    @endforeach
                </div>

                <!-- Total -->
                <div class="pt-6 border-t border-gray-200">
                    <div class="flex justify-between items-center">
                        <div>
                            <p class="text-2xl font-bold text-gray-900">Total</p>
                            <p class="text-sm text-gray-500">Including tax</p>
                        </div>
                        <p class="text-2xl font-bold text-brown-600">Rp {{ number_format($total, 0, ',', '.') }}</p>
                    </div>
                </div>
            </div>

            <!-- Checkout Button -->
            <div class="mt-12">
                <button wire:click="processCheckout"
                        class="w-full bg-brown-600 text-white py-4 px-6 rounded-xl font-semibold hover:bg-brown-700 transform hover:scale-105 transition-all duration-300 flex items-center justify-center space-x-2">
                    <span>Confirm Order</span>
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                    </svg>
                </button>
            </div>
        </div>
    </div>
</div> 