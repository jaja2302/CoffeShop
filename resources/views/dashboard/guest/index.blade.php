<x-layouts.guest>
    <x-slot name="title">Coffee Shop</x-slot>

    <!-- Main content -->
    <div class="w-full min-h-screen bg-[#f3ebe3]">
        <!-- Navigation Bar -->
        <nav class="bg-transparent py-4">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between items-center">
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
                            <input type="text" placeholder="Search" class="w-64 px-4 py-2 rounded-full bg-white focus:outline-none">
                            <svg class="w-5 h-5 absolute right-3 top-2.5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                            </svg>
                        </div>
                        <a href="#" class="p-2">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </nav>

        <!-- Floating Category Navigation -->
        <div class="fixed right-8 top-1/2 -translate-y-1/2 space-y-4 z-50">
            <a href="#coffee" class="bg-white p-4 rounded-xl shadow-md flex items-center space-x-3 hover:scale-105 transition-transform">
                <div class="w-10 h-10 bg-yellow-100 rounded-full flex items-center justify-center">
                    <svg class="w-6 h-6 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path d="M4 19h16l-1.4-5.6A2 2 0 0016.7 12H7.3a2 2 0 00-1.9 1.4L4 19zm0 0a2 2 0 002 2h12a2 2 0 002-2M6 7h12M6 7a2 2 0 012-2h8a2 2 0 012 2M6 7v3h12V7" />
                    </svg>
                </div>
                <div>
                    <h3 class="font-semibold">Coffee</h3>
                    <p class="text-sm text-gray-500">Our signature drinks</p>
                </div>
            </a>

            <a href="#donuts" class="bg-white p-4 rounded-xl shadow-md flex items-center space-x-3 hover:scale-105 transition-transform">
                <div class="w-10 h-10 bg-green-100 rounded-full flex items-center justify-center">
                    <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8zm0-14c-3.31 0-6 2.69-6 6s2.69 6 6 6 6-2.69 6-6-2.69-6-6-6z" />
                    </svg>
                </div>
                <div>
                    <h3 class="font-semibold">Donuts</h3>
                    <p class="text-sm text-gray-500">Fresh baked daily</p>
                </div>
            </a>

            <a href="#cookies" class="bg-white p-4 rounded-xl shadow-md flex items-center space-x-3 hover:scale-105 transition-transform">
                <div class="w-10 h-10 bg-orange-100 rounded-full flex items-center justify-center">
                    <svg class="w-6 h-6 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8zm0-14c-3.31 0-6 2.69-6 6s2.69 6 6 6 6-2.69 6-6-2.69-6-6-6z" />
                    </svg>
                </div>
                <div>
                    <h3 class="font-semibold">Cookies</h3>
                    <p class="text-sm text-gray-500">Sweet treats</p>
                </div>
            </a>
        </div>

        <!-- Main Content Section -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <div class="grid grid-cols-2 gap-8 items-center">
                <!-- Left Column -->
                <div class="space-y-6">
                    <h1 class="text-6xl font-bold" style="font-family: 'Poppins', sans-serif;">Midnight<br>Frappuccino</h1>
                    <p class="text-gray-600 text-lg">
                        The Midnight Mint Mocha Frappuccino features extra dark cocoa blended with
                        Frappuccino Roast coffee.
                    </p>
                    <div class="text-4xl font-bold">$ 8.60</div>
                    <button class="bg-black text-white px-8 py-3 rounded-full hover:bg-gray-800 transition flex items-center space-x-2">
                        <span>Buy Now</span>
                        <span class="w-2 h-2 bg-orange-500 rounded-full"></span>
                    </button>
                </div>

                <!-- Right Column -->
                <div class="relative">
                    <div class="bg-[#ff9f8d] rounded-full p-12 relative">
                        <img src="https://placehold.co/400x500" alt="Midnight Frappuccino" class="w-full">

                        <!-- Profile Pills -->
                        <div class="absolute bottom-0 left-1/2 -translate-x-1/2 translate-y-1/2 bg-white rounded-full py-2 px-4 flex items-center space-x-2">
                            <div class="w-8 h-8 rounded-full bg-red-500 flex items-center justify-center">
                                <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" />
                                </svg>
                            </div>
                            <img src="https://placehold.co/30x30" class="w-8 h-8 rounded-full">
                            <img src="https://placehold.co/30x30" class="w-8 h-8 rounded-full">
                            <img src="https://placehold.co/30x30" class="w-8 h-8 rounded-full">
                        </div>
                    </div>

                    <!-- Feature Cards -->
                    <div class="absolute right-0 top-1/2 -translate-y-1/2 space-y-4">
                        <div class="bg-white p-4 rounded-xl shadow-md flex items-center space-x-3">
                            <div class="w-10 h-10 bg-yellow-100 rounded-full flex items-center justify-center">
                                <img src="https://placehold.co/20x20" alt="Sippy cup icon">
                            </div>
                            <div>
                                <h3 class="font-semibold">Sippy cups</h3>
                                <p class="text-sm text-gray-500">Are the new norm for iced coffee</p>
                            </div>
                        </div>
                        <div class="bg-white p-4 rounded-xl shadow-md flex items-center space-x-3">
                            <div class="w-10 h-10 bg-green-100 rounded-full flex items-center justify-center">
                                <img src="https://placehold.co/20x20" alt="Donut icon">
                            </div>
                            <div>
                                <h3 class="font-semibold">Donut</h3>
                                <p class="text-sm text-gray-500">Have a donut with the frappuccino</p>
                            </div>
                        </div>
                        <div class="bg-white p-4 rounded-xl shadow-md flex items-center space-x-3">
                            <div class="w-10 h-10 bg-orange-100 rounded-full flex items-center justify-center">
                                <img src="https://placehold.co/20x20" alt="Cookie icon">
                            </div>
                            <div>
                                <h3 class="font-semibold">Cookies</h3>
                                <p class="text-sm text-gray-500">Enjoy our sugar free cookies</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Product Grid -->
            <div class="mt-24 bg-black rounded-3xl p-12">
                <div class="grid grid-cols-3 gap-8">
                    <!-- Product Card 1 -->
                    <div class="text-center">
                        <div class="relative inline-block">
                            <div class="bg-[#f4d03f] rounded-full p-8">
                                <img src="https://placehold.co/200x200" alt="Caramel Ribbon" class="w-48 mx-auto">
                            </div>
                            <span class="absolute bottom-0 right-0 bg-white rounded-full px-3 py-1 flex items-center">
                                4.4 <span class="text-yellow-400 ml-1">★</span>
                            </span>
                        </div>
                        <h3 class="text-xl font-semibold mt-4 text-white">Caramel Ribbon</h3>
                        <button class="mt-2 text-gray-400 hover:text-white flex items-center justify-center space-x-2 mx-auto">
                            <span>Add to order</span>
                            <span class="text-xl">+</span>
                        </button>
                    </div>

                    <!-- Product Card 2 -->
                    <div class="text-center">
                        <div class="relative inline-block">
                            <div class="bg-[#e74c3c] rounded-full p-8">
                                <img src="https://placehold.co/200x200" alt="Strawberry Funnel" class="w-48 mx-auto">
                            </div>
                            <span class="absolute bottom-0 right-0 bg-white rounded-full px-3 py-1 flex items-center">
                                4.5 <span class="text-yellow-400 ml-1">★</span>
                            </span>
                        </div>
                        <h3 class="text-xl font-semibold mt-4 text-white">Strawberry Funnel</h3>
                        <button class="mt-2 text-gray-400 hover:text-white flex items-center justify-center space-x-2 mx-auto">
                            <span>Add to order</span>
                            <span class="text-xl">+</span>
                        </button>
                    </div>

                    <!-- Product Card 3 -->
                    <div class="text-center">
                        <div class="relative inline-block">
                            <div class="bg-[#2ecc71] rounded-full p-8">
                                <img src="https://placehold.co/200x200" alt="Caramel Frappuccino" class="w-48 mx-auto">
                            </div>
                            <span class="absolute bottom-0 right-0 bg-white rounded-full px-3 py-1 flex items-center">
                                5.0 <span class="text-yellow-400 ml-1">★</span>
                            </span>
                        </div>
                        <h3 class="text-xl font-semibold mt-4 text-white">Caramel Frappuccino</h3>
                        <button class="mt-2 text-gray-400 hover:text-white flex items-center justify-center space-x-2 mx-auto">
                            <span>Add to order</span>
                            <span class="text-xl">+</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Product Sections -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Coffee Section -->
            <section id="coffee" class="py-16">
                <h2 class="text-3xl font-bold mb-8">Coffee Drinks</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    <!-- Coffee Item 1 -->
                    <div class="text-center">
                        <div class="relative inline-block">
                            <div class="bg-[#f4d03f] rounded-full p-8">
                                <img src="https://placehold.co/200x200" alt="Caramel Ribbon" class="w-48 mx-auto">
                            </div>
                            <span class="absolute bottom-0 right-0 bg-white rounded-full px-3 py-1 flex items-center">
                                4.4 <span class="text-yellow-400 ml-1">★</span>
                            </span>
                        </div>
                        <h3 class="text-xl font-semibold mt-4">Caramel Ribbon</h3>
                        <p class="text-gray-500">$4.99</p>
                        <button class="mt-2 text-gray-600 hover:text-black flex items-center justify-center space-x-2 mx-auto">
                            <span>Add to order</span>
                            <span class="text-xl">+</span>
                        </button>
                    </div>

                    <!-- Coffee Item 2 -->
                    <div class="text-center">
                        <div class="relative inline-block">
                            <div class="bg-[#e74c3c] rounded-full p-8">
                                <img src="https://placehold.co/200x200" alt="Mocha Frappuccino" class="w-48 mx-auto">
                            </div>
                            <span class="absolute bottom-0 right-0 bg-white rounded-full px-3 py-1 flex items-center">
                                4.7 <span class="text-yellow-400 ml-1">★</span>
                            </span>
                        </div>
                        <h3 class="text-xl font-semibold mt-4">Mocha Frappuccino</h3>
                        <p class="text-gray-500">$5.99</p>
                        <button class="mt-2 text-gray-600 hover:text-black flex items-center justify-center space-x-2 mx-auto">
                            <span>Add to order</span>
                            <span class="text-xl">+</span>
                        </button>
                    </div>

                    <!-- Coffee Item 3 -->
                    <div class="text-center">
                        <div class="relative inline-block">
                            <div class="bg-[#2ecc71] rounded-full p-8">
                                <img src="https://placehold.co/200x200" alt="Vanilla Latte" class="w-48 mx-auto">
                            </div>
                            <span class="absolute bottom-0 right-0 bg-white rounded-full px-3 py-1 flex items-center">
                                4.9 <span class="text-yellow-400 ml-1">★</span>
                            </span>
                        </div>
                        <h3 class="text-xl font-semibold mt-4">Vanilla Latte</h3>
                        <p class="text-gray-500">$4.49</p>
                        <button class="mt-2 text-gray-600 hover:text-black flex items-center justify-center space-x-2 mx-auto">
                            <span>Add to order</span>
                            <span class="text-xl">+</span>
                        </button>
                    </div>
                </div>
            </section>

            <!-- Donuts Section -->
            <section id="donuts" class="py-16">
                <h2 class="text-3xl font-bold mb-8">Fresh Donuts</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    <!-- Donut Item 1 -->
                    <div class="text-center">
                        <div class="relative inline-block">
                            <div class="bg-[#ff9f8d] rounded-full p-8">
                                <img src="https://placehold.co/200x200" alt="Chocolate Glazed" class="w-48 mx-auto">
                            </div>
                            <span class="absolute bottom-0 right-0 bg-white rounded-full px-3 py-1 flex items-center">
                                4.8 <span class="text-yellow-400 ml-1">★</span>
                            </span>
                        </div>
                        <h3 class="text-xl font-semibold mt-4">Chocolate Glazed</h3>
                        <p class="text-gray-500">$2.99</p>
                        <button class="mt-2 text-gray-600 hover:text-black flex items-center justify-center space-x-2 mx-auto">
                            <span>Add to order</span>
                            <span class="text-xl">+</span>
                        </button>
                    </div>

                    <!-- Donut Item 2 -->
                    <div class="text-center">
                        <div class="relative inline-block">
                            <div class="bg-[#a8e6cf] rounded-full p-8">
                                <img src="https://placehold.co/200x200" alt="Strawberry Sprinkle" class="w-48 mx-auto">
                            </div>
                            <span class="absolute bottom-0 right-0 bg-white rounded-full px-3 py-1 flex items-center">
                                4.6 <span class="text-yellow-400 ml-1">★</span>
                            </span>
                        </div>
                        <h3 class="text-xl font-semibold mt-4">Strawberry Sprinkle</h3>
                        <p class="text-gray-500">$3.49</p>
                        <button class="mt-2 text-gray-600 hover:text-black flex items-center justify-center space-x-2 mx-auto">
                            <span>Add to order</span>
                            <span class="text-xl">+</span>
                        </button>
                    </div>

                    <!-- Donut Item 3 -->
                    <div class="text-center">
                        <div class="relative inline-block">
                            <div class="bg-[#ffd3b6] rounded-full p-8">
                                <img src="https://placehold.co/200x200" alt="Boston Cream" class="w-48 mx-auto">
                            </div>
                            <span class="absolute bottom-0 right-0 bg-white rounded-full px-3 py-1 flex items-center">
                                4.9 <span class="text-yellow-400 ml-1">★</span>
                            </span>
                        </div>
                        <h3 class="text-xl font-semibold mt-4">Boston Cream</h3>
                        <p class="text-gray-500">$3.29</p>
                        <button class="mt-2 text-gray-600 hover:text-black flex items-center justify-center space-x-2 mx-auto">
                            <span>Add to order</span>
                            <span class="text-xl">+</span>
                        </button>
                    </div>
                </div>
            </section>

            <!-- Cookies Section -->
            <section id="cookies" class="py-16">
                <h2 class="text-3xl font-bold mb-8">Cookies & Treats</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    <!-- Cookie Item 1 -->
                    <div class="text-center">
                        <div class="relative inline-block">
                            <div class="bg-[#deb887] rounded-full p-8">
                                <img src="https://placehold.co/200x200" alt="Chocolate Chip" class="w-48 mx-auto">
                            </div>
                            <span class="absolute bottom-0 right-0 bg-white rounded-full px-3 py-1 flex items-center">
                                4.7 <span class="text-yellow-400 ml-1">★</span>
                            </span>
                        </div>
                        <h3 class="text-xl font-semibold mt-4">Chocolate Chip</h3>
                        <p class="text-gray-500">$2.49</p>
                        <button class="mt-2 text-gray-600 hover:text-black flex items-center justify-center space-x-2 mx-auto">
                            <span>Add to order</span>
                            <span class="text-xl">+</span>
                        </button>
                    </div>

                    <!-- Cookie Item 2 -->
                    <div class="text-center">
                        <div class="relative inline-block">
                            <div class="bg-[#f5deb3] rounded-full p-8">
                                <img src="https://placehold.co/200x200" alt="Oatmeal Raisin" class="w-48 mx-auto">
                            </div>
                            <span class="absolute bottom-0 right-0 bg-white rounded-full px-3 py-1 flex items-center">
                                4.5 <span class="text-yellow-400 ml-1">★</span>
                            </span>
                        </div>
                        <h3 class="text-xl font-semibold mt-4">Oatmeal Raisin</h3>
                        <p class="text-gray-500">$2.29</p>
                        <button class="mt-2 text-gray-600 hover:text-black flex items-center justify-center space-x-2 mx-auto">
                            <span>Add to order</span>
                            <span class="text-xl">+</span>
                        </button>
                    </div>

                    <!-- Cookie Item 3 -->
                    <div class="text-center">
                        <div class="relative inline-block">
                            <div class="bg-[#d2b48c] rounded-full p-8">
                                <img src="https://placehold.co/200x200" alt="Double Chocolate" class="w-48 mx-auto">
                            </div>
                            <span class="absolute bottom-0 right-0 bg-white rounded-full px-3 py-1 flex items-center">
                                4.8 <span class="text-yellow-400 ml-1">★</span>
                            </span>
                        </div>
                        <h3 class="text-xl font-semibold mt-4">Double Chocolate</h3>
                        <p class="text-gray-500">$2.79</p>
                        <button class="mt-2 text-gray-600 hover:text-black flex items-center justify-center space-x-2 mx-auto">
                            <span>Add to order</span>
                            <span class="text-xl">+</span>
                        </button>
                    </div>
                </div>
            </section>
        </div>
    </div>

    <!-- Add smooth scrolling behavior -->
    <script>
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                const section = document.querySelector(this.getAttribute('href'));
                section.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            });
        });

        // Optional: Highlight active section while scrolling
        window.addEventListener('scroll', () => {
            const sections = document.querySelectorAll('section');
            const navLinks = document.querySelectorAll('.fixed a');

            sections.forEach(section => {
                const sectionTop = section.offsetTop;
                const sectionHeight = section.clientHeight;
                if (window.scrollY >= (sectionTop - sectionHeight / 3)) {
                    navLinks.forEach(link => {
                        if (link.getAttribute('href') === `#${section.id}`) {
                            link.classList.add('scale-105', 'ring-2', 'ring-brown-400');
                        } else {
                            link.classList.remove('scale-105', 'ring-2', 'ring-brown-400');
                        }
                    });
                }
            });
        });
    </script>
</x-layouts.guest>