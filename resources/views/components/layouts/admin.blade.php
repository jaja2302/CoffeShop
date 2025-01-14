<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <meta name="application-name" content="{{ config('app.name') }}" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <title>{{ config('app.name') }} - {{ $title ?? 'Admin' }}</title>

    @filamentStyles
    @vite('resources/css/app.css')
</head>

<body class="antialiased">
    <div x-data="{ mobileMenuOpen: false }" class="min-h-screen">
        <!-- Navbar Mobile -->
        <div class="lg:hidden bg-white shadow-lg">
            <div class="flex items-center justify-between p-4">
                <h1 class="text-xl font-bold text-brown-600">Coffee Shop</h1>
                <button @click="mobileMenuOpen = !mobileMenuOpen" class="text-gray-500 hover:text-gray-700">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path x-show="!mobileMenuOpen" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                        <path x-show="mobileMenuOpen" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
        </div>

        <div class="flex">
            <!-- Sidebar Desktop -->
            <div class="hidden lg:block w-64 bg-white shadow-lg min-h-screen">
                <div class="p-4">
                    <h1 class="text-2xl font-bold text-brown-600">Coffee Shop</h1>
                </div>
                <nav class="mt-4">
                    <!-- Desktop Navigation Items -->
                    @include('components.layouts.admin-nav-items')
                </nav>
            </div>

            <!-- Mobile Menu -->
            <div x-show="mobileMenuOpen" 
                 x-transition:enter="transition ease-out duration-200"
                 x-transition:enter-start="opacity-0 transform -translate-x-full"
                 x-transition:enter-end="opacity-100 transform translate-x-0"
                 x-transition:leave="transition ease-in duration-200"
                 x-transition:leave-start="opacity-100 transform translate-x-0"
                 x-transition:leave-end="opacity-0 transform -translate-x-full"
                 class="lg:hidden fixed inset-0 z-50 bg-white">
                <nav class="p-4">
                    <!-- Mobile Navigation Items -->
                    @include('components.layouts.admin-nav-items')
                </nav>
            </div>

            <!-- Main Content -->
            <div class="flex-1 bg-gray-50 overflow-x-hidden">
                <header class="bg-white shadow-sm">
                    <div class="px-4 py-4 sm:px-6 lg:px-8">
                        {{ $header ?? '' }}
                    </div>
                </header>

                <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
                    {{ $slot }}
                </main>
            </div>
        </div>
    </div>

    @livewire('notifications')
    @filamentScripts
    @vite('resources/js/app.js')
</body>

</html>