<x-layouts.guest>
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gradient-to-b from-[#f3ebe3] to-white">
        <div class="w-full sm:max-w-md mt-6 px-8 py-8 bg-white/80 backdrop-blur-md shadow-xl rounded-2xl">
            <div class="text-center mb-8">
                <h2 class="text-3xl font-bold text-gray-900">Selamat Datang Kembali</h2>
                <p class="text-gray-600 mt-2">Masuk ke akun Anda</p>
            </div>

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email Address -->
                <div class="mb-6">
                    <label class="block text-gray-700 font-medium mb-2" for="email">Alamat Email</label>
                    <div class="relative">
                        <input 
                            class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-brown-400 focus:border-transparent transition-all @error('email') border-red-500 @enderror"
                            id="email" 
                            type="email" 
                            name="email" 
                            value="{{ old('email') }}" 
                            required 
                            autofocus 
                            placeholder="Masukkan email Anda"
                        />
                        @error('email')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Password -->
                <div class="mb-6">
                    <label class="block text-gray-700 font-medium mb-2" for="password">Kata Sandi</label>
                    <div class="relative">
                        <input 
                            class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-brown-400 focus:border-transparent transition-all @error('password') border-red-500 @enderror"
                            id="password" 
                            type="password" 
                            name="password" 
                            required 
                            placeholder="Masukkan kata sandi Anda"
                        />
                        @error('password')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Remember Me -->
                <div class="flex items-center justify-between mb-6">
                    <div class="flex items-center">
                        <input 
                            type="checkbox" 
                            id="remember_me" 
                            name="remember" 
                            class="rounded border-gray-300 text-brown-600 shadow-sm focus:border-brown-300 focus:ring focus:ring-brown-200 focus:ring-opacity-50"
                        >
                        <label for="remember_me" class="ml-2 text-sm text-gray-600">Ingat saya</label>
                    </div>
                </div>

                <div class="flex flex-col space-y-4">
                    <button 
                        type="submit"
                        class="!bg-brown-600 !text-white py-3 rounded-lg font-semibold hover:!bg-brown-700 focus:outline-none focus:ring-2 focus:ring-brown-400 focus:ring-offset-2 transform transition-all duration-300 hover:scale-[1.02] w-full"
                    >
                        Masuk
                    </button>
                    
                    <div class="text-center">
                        <span class="text-gray-600 text-sm">Belum punya akun?</span>
                        <a href="{{ route('register') }}" class="text-sm !text-brown-600 hover:!text-brown-800 transition-colors ml-1">
                            Buat akun sekarang
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-layouts.guest> 