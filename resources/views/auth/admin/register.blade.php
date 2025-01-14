<x-layouts.guest>
    <x-slot name="title">Daftar Admin</x-slot>

    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gradient-to-b from-[#f3ebe3] to-white">
        <div class="w-full sm:max-w-md mt-6 px-8 py-8 bg-white/80 backdrop-blur-md shadow-xl rounded-2xl">
            <div class="text-center mb-8">
                <h2 class="text-3xl font-bold text-gray-900">Pendaftaran Admin</h2>
                <p class="text-gray-600 mt-2">Buat akun admin Anda</p>
            </div>

            <form method="POST" action="{{ route('admin.register') }}" class="space-y-6">
                @csrf

                <!-- Name -->
                <div>
                    <label class="block text-gray-700 font-medium mb-2" for="name">Nama Lengkap</label>
                    <input 
                        type="text" 
                        name="name" 
                        id="name" 
                        value="{{ old('name') }}" 
                        required 
                        autofocus
                        class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-brown-400 focus:border-transparent transition-all"
                        placeholder="Masukkan nama lengkap Anda"
                    >
                    @error('name')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Email -->
                <div>
                    <label class="block text-gray-700 font-medium mb-2" for="email">Alamat Email</label>
                    <input 
                        type="email" 
                        name="email" 
                        id="email" 
                        value="{{ old('email') }}" 
                        required
                        class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-brown-400 focus:border-transparent transition-all"
                        placeholder="Masukkan email Anda"
                    >
                    @error('email')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Password -->
                <div>
                    <label class="block text-gray-700 font-medium mb-2" for="password">Kata Sandi</label>
                    <input 
                        type="password" 
                        name="password" 
                        id="password" 
                        required
                        class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-brown-400 focus:border-transparent transition-all"
                        placeholder="Buat kata sandi"
                    >
                    @error('password')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Confirm Password -->
                <div>
                    <label class="block text-gray-700 font-medium mb-2" for="password_confirmation">Konfirmasi Kata Sandi</label>
                    <input 
                        type="password" 
                        name="password_confirmation" 
                        id="password_confirmation" 
                        required
                        class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-brown-400 focus:border-transparent transition-all"
                        placeholder="Konfirmasi kata sandi Anda"
                    >
                </div>

                <div class="flex items-center justify-between pt-4">
                    <a href="{{ route('admin.login') }}" 
                       class="text-sm text-brown-600 hover:text-brown-800 transition-colors">
                        Sudah punya akun?
                    </a>
                    <button type="submit"
                            class="bg-brown-600 text-white px-6 py-3 rounded-lg font-semibold hover:bg-brown-700 focus:outline-none focus:ring-2 focus:ring-brown-400 focus:ring-offset-2 transform transition-all duration-300 hover:scale-[1.02]">
                        Buat Akun
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-layouts.guest> 