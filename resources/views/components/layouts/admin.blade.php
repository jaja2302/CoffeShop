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
    <div class="min-h-screen flex">
        <!-- Sidebar -->
        <div class="w-64 bg-white shadow-lg">
            <div class="p-4">
                <h1 class="text-2xl font-bold text-brown-600">Coffee Shop</h1>
            </div>
            <nav class="mt-4">
            <div class="px-4 py-2">
                    <a href="{{ route('admin.menu') }}" class="block px-4 py-2 text-gray-700 hover:bg-brown-100 rounded">Menu Management</a>
                    <a href="{{ route('admin.order') }}" class="block px-4 py-2 text-gray-700 hover:bg-brown-100 rounded">Orders</a>
            
                </div>     
                @auth('admin')
                <div class="px-4 py-2 mt-4">
                    <form method="POST" action="{{ route('admin.logout') }}">
                        @csrf
                        <button type="submit" class="block w-full px-4 py-2 text-left text-gray-700 hover:bg-brown-100 rounded">
                            Logout
                        </button>
                    </form>
                </div>
                @endauth
            </nav>
        </div>

        <!-- Main Content -->
        <div class="flex-1">
            <header class="bg-white shadow">
                <div class="px-4 py-6">
                    <h2 class="text-xl font-semibold text-gray-800">{{ $header ?? 'Admin Dashboard' }}</h2>
                </div>
            </header>

            <main class="p-6">
                {{ $slot }}
            </main>
        </div>
    </div>

    @livewire('notifications')
    @filamentScripts
    @vite('resources/js/app.js')
</body>

</html>