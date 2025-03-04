@extends('layouts.app-static')
@section('content')
    <!-- Hero Section -->
    <section class="bg-gray-100">
        <div class="container mx-auto px-4 py-16 flex flex-col md:flex-row items-center">
            <div class="md:w-1/2 mb-8 md:mb-0 text-center">
                <h1 class="text-4xl md:text-5xl font-bold text-gray-800 mb-4">Welcome to Our Shop</h1>
                <p class="text-xl text-gray-600 mb-6">Discover amazing products at great prices.</p>
                <a href="#"
                   class="bg-blue-600 text-white px-6 py-3 rounded-md hover:bg-blue-700 transition duration-300">Shop
                    Now
                </a>
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
                <x-product/>
                <x-product/>
                <x-product/>
                <x-product/>
            </div>
        </div>
    </section>
@endsection
