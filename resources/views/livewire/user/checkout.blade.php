<div class="min-h-screen bg-gray-100 pt-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-white rounded-lg shadow-lg p-6">
            <h2 class="text-2xl font-bold mb-6">Checkout</h2>
            
            <!-- Order Summary -->
            <div class="mb-8">
                <h3 class="text-lg font-semibold mb-4">Order Summary</h3>
                <div class="space-y-4">
                    @foreach($cartItems as $id => $item)
                        <div class="flex justify-between items-center">
                            <div>
                                <h4 class="font-medium">{{ $item['name'] }}</h4>
                                <p class="text-sm text-gray-500">Qty: {{ $item['quantity'] }}</p>
                            </div>
                            <p class="font-medium">Rp {{ number_format($item['price'] * $item['quantity'], 0, ',', '.') }}</p>
                        </div>
                    @endforeach
                </div>
                <div class="mt-6 pt-6 border-t">
                    <div class="flex justify-between items-center font-bold">
                        <p>Total</p>
                        <p>Rp {{ number_format($total, 0, ',', '.') }}</p>
                    </div>
                </div>
            </div>

            <!-- Checkout Button -->
            <div class="mt-8">
                <button
                    wire:click="processCheckout"
                    class="w-full bg-black text-white py-3 px-4 rounded-md hover:bg-gray-800 transition-colors duration-200"
                >
                    Confirm Order
                </button>
            </div>
        </div>
    </div>
</div> 