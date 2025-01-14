<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <meta name="application-name" content="{{ config('app.name') }}" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <title>{{ config('app.name') }} - {{ $title ?? 'Selamat Datang' }}</title>

    <!-- Add Font Awesome for social icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @filamentStyles
    @livewireStyles
</head>

<body class="antialiased">
    <!-- Navigation -->
    <nav x-data="{ mobileMenuOpen: false }" class="fixed top-0 left-0 right-0 bg-white/80 backdrop-blur-md shadow-sm z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <!-- Logo -->
                <div class="flex items-center space-x-2">
                    <img src="{{ asset('images/logo.jpg') }}" alt="Coffee Shop Logo" class="h-10 w-10">
                    <span class="font-bold text-xl">KEDAI KOPI</span>
                </div>

                <!-- Desktop Navigation -->
                <div class="hidden md:flex space-x-8">
                    <a href="/" class="text-gray-700 hover:text-brown-600 transition">Beranda</a>
                    <a href="#featured" class="text-gray-700 hover:text-brown-600 transition">Unggulan</a>
                    <a href="#categories" class="text-gray-700 hover:text-brown-600 transition">Kategori</a>
                    <a href="#contact" class="text-gray-700 hover:text-brown-600 transition">Kontak</a>
                </div>

                <!-- Mobile Menu Button -->
                <div class="md:hidden">
                    <button @click="mobileMenuOpen = !mobileMenuOpen" class="text-gray-500 hover:text-gray-700">
                        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path x-show="!mobileMenuOpen" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                            <path x-show="mobileMenuOpen" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>

                <!-- Auth Buttons -->
                <div class="hidden md:flex items-center space-x-4">
                    @auth
                        <span class="text-gray-700">{{ Auth::user()->name }}</span>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="text-gray-700 hover:text-brown-600 transition">Keluar</button>
                        </form>
                    @else
                        <a href="{{ route('login') }}" class="text-gray-700 hover:text-brown-600 transition">Masuk</a>
                        <a href="{{ route('register') }}" class="bg-brown-600 text-white px-4 py-2 rounded-full hover:bg-brown-700 transition">
                            Daftar
                        </a>
                    @endauth
                </div>
            </div>
        </div>

        <!-- Mobile Menu -->
        <div x-show="mobileMenuOpen" 
             x-transition:enter="transition ease-out duration-200"
             x-transition:enter-start="opacity-0 transform -translate-y-2"
             x-transition:enter-end="opacity-100 transform translate-y-0"
             x-transition:leave="transition ease-in duration-150"
             x-transition:leave-start="opacity-100 transform translate-y-0"
             x-transition:leave-end="opacity-0 transform -translate-y-2"
             class="md:hidden bg-white shadow-lg">
            <div class="px-4 pt-2 pb-3 space-y-1">
                <a href="/" class="block px-3 py-2 text-gray-700 hover:bg-brown-50 rounded-md">Beranda</a>
                <a href="#featured" class="block px-3 py-2 text-gray-700 hover:bg-brown-50 rounded-md">Unggulan</a>
                <a href="#categories" class="block px-3 py-2 text-gray-700 hover:bg-brown-50 rounded-md">Kategori</a>
                <a href="#contact" class="block px-3 py-2 text-gray-700 hover:bg-brown-50 rounded-md">Kontak</a>
                
                @guest
                    <div class="mt-4 pt-4 border-t border-gray-200">
                        <a href="{{ route('login') }}" class="block px-3 py-2 text-gray-700 hover:bg-brown-50 rounded-md">Masuk</a>
                        <a href="{{ route('register') }}" class="block px-3 py-2 text-gray-700 hover:bg-brown-50 rounded-md">Daftar</a>
                    </div>
                @endguest
            </div>
        </div>
    </nav>

    <!-- Main Content with top padding to account for fixed navbar -->
    <div class="pt-16">
        {{ $slot }}
    </div>

    <!-- Footer -->
    <footer class="bg-white">
        <!-- Main Footer Content -->
        <div class="max-w-7xl mx-auto pt-16 pb-8 px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <!-- Location & Contact -->
                <div>
                    <h3 class="text-lg font-semibold mb-4">Kunjungi Kami</h3>
                    <div class="space-y-3">
                        <p class="text-gray-600">Jalan Kopi 123</p>
                        <p class="text-gray-600">Jakarta, Indonesia 12345</p>
                        <p class="text-gray-600">Telepon: (123) 456-7890</p>
                        <p class="text-gray-600">Email: info@kedaikopi.com</p>
                    </div>
                    <!-- Map -->
                    <div class="mt-4 h-48 bg-gray-200 rounded-lg overflow-hidden">
                        <iframe
                            class="w-full h-full"
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d126915.06709645538!2d106.7891577726465!3d-6.229728025009608!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f3e945e34b9d%3A0x5371bf0fdad786a2!2sJakarta%2C%20Daerah%20Khusus%20Ibukota%20Jakarta!5e0!3m2!1sid!2sid!4v1696235655917!5m2!1sid!2sid"
                            style="border:0;"
                            allowfullscreen=""
                            loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade">
                        </iframe>
                    </div>
                </div>

                <!-- Opening Hours -->
                <div>
                    <h3 class="text-lg font-semibold mb-4">Jam Operasional</h3>
                    <div class="space-y-2">
                        <p class="text-gray-600">Senin - Jumat</p>
                        <p class="font-medium">07:00 - 22:00</p>
                        <p class="text-gray-600 mt-4">Sabtu - Minggu</p>
                        <p class="font-medium">08:00 - 23:00</p>
                        <p class="text-gray-600 mt-4">Hari Libur</p>
                        <p class="font-medium">09:00 - 21:00</p>
                    </div>
                </div>

                <!-- Quick Links -->
                <div>
                    <h3 class="text-lg font-semibold mb-4">Tautan Cepat</h3>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-gray-600 hover:text-gray-900">Tentang Kami</a></li>
                        <li><a href="#" class="text-gray-600 hover:text-gray-900">Menu</a></li>
                        <li><a href="#" class="text-gray-600 hover:text-gray-900">Program Rewards</a></li>
                        <li><a href="#" class="text-gray-600 hover:text-gray-900">Kartu Hadiah</a></li>
                        <li><a href="#" class="text-gray-600 hover:text-gray-900">Karir</a></li>
                        <li><a href="#" class="text-gray-600 hover:text-gray-900">Hubungi Kami</a></li>
                    </ul>
                </div>

                <!-- Newsletter & Social -->
                <div>
                    <h3 class="text-lg font-semibold mb-4">Tetap Terhubung</h3>
                    <div class="mb-6">
                        <p class="text-gray-600 mb-2">Berlangganan newsletter kami</p>
                        <form class="flex gap-2">
                            <input
                                type="email"
                                placeholder="Masukkan email Anda"
                                class="px-4 py-2 border rounded-lg flex-1 focus:outline-none focus:ring-2 focus:ring-brown-400">
                            <button
                                type="submit"
                                class="px-4 py-2 bg-brown-600 text-white rounded-lg hover:bg-brown-700 transition">
                                Langganan
                            </button>
                        </form>
                    </div>
                    <div>
                        <p class="text-gray-600 mb-2">Ikuti kami</p>
                        <div class="flex space-x-4">
                            <a href="#" class="text-gray-600 hover:text-blue-600">
                                <i class="fab fa-facebook-f text-xl"></i>
                            </a>
                            <a href="#" class="text-gray-600 hover:text-pink-600">
                                <i class="fab fa-instagram text-xl"></i>
                            </a>
                            <a href="#" class="text-gray-600 hover:text-blue-400">
                                <i class="fab fa-twitter text-xl"></i>
                            </a>
                            <a href="#" class="text-gray-600 hover:text-red-600">
                                <i class="fab fa-youtube text-xl"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Bottom Footer -->
            <div class="mt-12 pt-8 border-t border-gray-200">
                <div class="flex flex-col md:flex-row justify-between items-center">
                    <div class="text-gray-500 text-sm">
                        © 2024 Kedai Kopi. Hak cipta dilindungi.
                    </div>
                    <div class="flex space-x-6 mt-4 md:mt-0">
                        <a href="#" class="text-gray-500 hover:text-gray-900 text-sm">Kebijakan Privasi</a>
                        <a href="#" class="text-gray-500 hover:text-gray-900 text-sm">Syarat Layanan</a>
                        <a href="#" class="text-gray-500 hover:text-gray-900 text-sm">Kebijakan Cookie</a>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    @livewire('notifications')
    @filamentScripts
    @vite('resources/js/app.js')
    @livewireScripts
    <!-- Alpine.js setelah Livewire scripts -->
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
</body>

</html>