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
                                <div class="bg-brown-100 rounded-full p-3">
                                    <svg class="w-6 h-6 text-brown-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path d="M4 19h16l-1.4-5.6A2 2 0 0016.7 12H7.3a2 2 0 00-1.9 1.4L4 19zm0 0a2 2 0 002 2h12a2 2 0 002-2M6 7h12M6 7a2 2 0 012-2h8a2 2 0 012 2M6 7v3h12V7" />
                                    </svg>
                                </div>
                                <div>
                                    <h4 class="font-medium text-gray-900">{{ $item['name'] }}</h4>
                                    <p class="text-sm text-gray-500">Quantity: {{ $item['quantity'] }}</p>
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