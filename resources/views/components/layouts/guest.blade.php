<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <meta name="application-name" content="{{ config('app.name') }}" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <title>{{ config('app.name') }} - {{ $title ?? 'Welcome' }}</title>

    <!-- Add Font Awesome for social icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />

    @filamentStyles
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>

<body class="antialiased">
    <!-- Fixed Navigation Bar -->
    <nav class="fixed top-0 left-0 right-0 bg-white/80 backdrop-blur-md shadow-sm z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <div class="flex items-center space-x-2">
                    <!-- Logo -->
                    <img src="{{ asset('images/logo.jpg') }}" alt="Coffee Shop Logo" class="h-10 w-10">
                    <span class="font-bold text-xl">STARBUCKS</span>
                </div>

                <div class="flex space-x-8">
                    <a href="#" class="text-gray-700 hover:text-gray-900">Trending</a>
                    <a href="#" class="text-gray-700 hover:text-gray-900">Rewards</a>
                    <a href="#" class="text-gray-700 hover:text-gray-900">Gift Cards</a>
                    <a href="#" class="text-gray-700 hover:text-gray-900">Reserve</a>
                    <a href="#" class="text-gray-700 hover:text-gray-900">Delivery</a>
                </div>

                <div class="flex items-center space-x-4">
                    <div class="relative">
                        <input type="text" placeholder="Search" class="w-64 px-4 py-2 rounded-full bg-white focus:outline-none border border-gray-200">
                        <svg class="w-5 h-5 absolute right-3 top-2.5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </div>
                </div>
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
                    <h3 class="text-lg font-semibold mb-4">Visit Us</h3>
                    <div class="space-y-3">
                        <p class="text-gray-600">123 Coffee Street</p>
                        <p class="text-gray-600">Jakarta, Indonesia 12345</p>
                        <p class="text-gray-600">Phone: (123) 456-7890</p>
                        <p class="text-gray-600">Email: info@coffeeshop.com</p>
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
                    <h3 class="text-lg font-semibold mb-4">Opening Hours</h3>
                    <div class="space-y-2">
                        <p class="text-gray-600">Monday - Friday</p>
                        <p class="font-medium">7:00 AM - 10:00 PM</p>
                        <p class="text-gray-600 mt-4">Saturday - Sunday</p>
                        <p class="font-medium">8:00 AM - 11:00 PM</p>
                        <p class="text-gray-600 mt-4">Holidays</p>
                        <p class="font-medium">9:00 AM - 9:00 PM</p>
                    </div>
                </div>

                <!-- Quick Links -->
                <div>
                    <h3 class="text-lg font-semibold mb-4">Quick Links</h3>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-gray-600 hover:text-gray-900">About Us</a></li>
                        <li><a href="#" class="text-gray-600 hover:text-gray-900">Menu</a></li>
                        <li><a href="#" class="text-gray-600 hover:text-gray-900">Rewards Program</a></li>
                        <li><a href="#" class="text-gray-600 hover:text-gray-900">Gift Cards</a></li>
                        <li><a href="#" class="text-gray-600 hover:text-gray-900">Careers</a></li>
                        <li><a href="#" class="text-gray-600 hover:text-gray-900">Contact Us</a></li>
                    </ul>
                </div>

                <!-- Newsletter & Social -->
                <div>
                    <h3 class="text-lg font-semibold mb-4">Stay Connected</h3>
                    <div class="mb-6">
                        <p class="text-gray-600 mb-2">Subscribe to our newsletter</p>
                        <form class="flex gap-2">
                            <input
                                type="email"
                                placeholder="Enter your email"
                                class="px-4 py-2 border rounded-lg flex-1 focus:outline-none focus:ring-2 focus:ring-brown-400">
                            <button
                                type="submit"
                                class="px-4 py-2 bg-brown-600 text-white rounded-lg hover:bg-brown-700 transition">
                                Subscribe
                            </button>
                        </form>
                    </div>
                    <div>
                        <p class="text-gray-600 mb-2">Follow us</p>
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
                        © 2024 Coffee Shop. All rights reserved.
                    </div>
                    <div class="flex space-x-6 mt-4 md:mt-0">
                        <a href="#" class="text-gray-500 hover:text-gray-900 text-sm">Privacy Policy</a>
                        <a href="#" class="text-gray-500 hover:text-gray-900 text-sm">Terms of Service</a>
                        <a href="#" class="text-gray-500 hover:text-gray-900 text-sm">Cookie Policy</a>
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