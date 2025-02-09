@extends('layouts.app-static')
@section('content')
    <!-- Hero Section -->
    <section class="bg-gray-100">
        <div class="container mx-auto px-4 py-16 flex flex-col md:flex-row items-center">
            <div class="md:w-1/2 mb-8 md:mb-0">
                <h1 class="text-4xl md:text-5xl font-bold text-gray-800 mb-4">Welcome to Our Shop</h1>
                <p class="text-xl text-gray-600 mb-6">Discover amazing products at great prices.</p>
                <a href="#"
                   class="bg-blue-600 text-white px-6 py-3 rounded-md hover:bg-blue-700 transition duration-300">Shop
                    Now</a>
            </div>
            <div class="md:w-1/2">
                <img src="{{ asset('images/default/no-image.svg') }}" alt="Hero Image"
                     class="rounded-lg shadow-md w-full h-auto">
            </div>
        </div>
    </section>

    <!-- Featured Products -->
    <section class="py-16">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-gray-800 mb-8 text-center">Featured Products</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
                <!-- Product 1 -->
                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <img src="{{ asset('images/default/no-image.svg') }}" alt="Product 1" class="w-full h-64 object-cover">
                    <div class="p-4">
                        <h3 class="text-xl font-semibold text-gray-800 mb-2">Product Name</h3>
                        <p class="text-gray-600 mb-4">Short product description goes here.</p>
                        <div class="flex items-center justify-between">
                            <span class="text-xl font-bold text-gray-800">$99.99</span>
                            <button class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700 transition duration-300">
                                Add to Cart
                            </button>
                        </div>
                    </div>
                </div>
                <!-- Product 2 -->
                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <img src="{{ asset('images/default/no-image.svg') }}" alt="Product 2" class="w-full h-64 object-cover">
                    <div class="p-4">
                        <h3 class="text-xl font-semibold text-gray-800 mb-2">Product Name</h3>
                        <p class="text-gray-600 mb-4">Short product description goes here.</p>
                        <div class="flex items-center justify-between">
                            <span class="text-xl font-bold text-gray-800">$79.99</span>
                            <button class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700 transition duration-300">
                                Add to Cart
                            </button>
                        </div>
                    </div>
                </div>
                <!-- Product 3 -->
                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <img src="{{ asset('images/default/no-image.svg') }}" alt="Product 3" class="w-full h-64 object-cover">
                    <div class="p-4">
                        <h3 class="text-xl font-semibold text-gray-800 mb-2">Product Name</h3>
                        <p class="text-gray-600 mb-4">Short product description goes here.</p>
                        <div class="flex items-center justify-between">
                            <span class="text-xl font-bold text-gray-800">$129.99</span>
                            <button class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700 transition duration-300">
                                Add to Cart
                            </button>
                        </div>
                    </div>
                </div>
                <!-- Product 4 -->
                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <img src="{{ asset('images/default/no-image.svg') }}" alt="Product 4" class="w-full h-64 object-cover">
                    <div class="p-4">
                        <h3 class="text-xl font-semibold text-gray-800 mb-2">Product Name</h3>
                        <p class="text-gray-600 mb-4">Short product description goes here.</p>
                        <div class="flex items-center justify-between">
                            <span class="text-xl font-bold text-gray-800">$149.99</span>
                            <button class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700 transition duration-300">
                                Add to Cart
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection