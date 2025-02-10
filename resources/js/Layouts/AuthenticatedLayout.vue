<script setup>
import { Link } from '@inertiajs/vue3';
</script>

<template>
    <div>
        <div class="min-h-screen bg-gray-100">
            <nav class="bg-gray-800 text-white">
                <div class="container mx-auto px-4">
                    <div class="flex items-center justify-between h-16">
                        <div class="flex items-center">
                            <a href="#" class="text-2xl font-bold">ShopName</a>
                            <div class="ml-10 flex items-baseline space-x-4">
                                <a href="#" class="px-3 py-2 rounded-md text-sm font-medium hover:bg-gray-700 transition duration-200">Dashboard</a>
                                <a href="#" class="px-3 py-2 rounded-md text-sm font-medium hover:bg-gray-700 transition duration-200">Orders</a>
                                <a href="#" class="px-3 py-2 rounded-md text-sm font-medium hover:bg-gray-700 transition duration-200">Wishlist</a>
                                <a href="#" class="px-3 py-2 rounded-md text-sm font-medium hover:bg-gray-700 transition duration-200">Profile</a>
                                <a href="#" class="px-3 py-2 rounded-md text-sm font-medium hover:bg-gray-700 transition duration-200">Settings</a>
                            </div>
                        </div>
                        <div class="flex items-center">
                            <span class="text-gray-300 mr-4">Welcome, John Doe</span>
                            <Link
                                :href="route('logout')"
                                method="post"
                                class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700 transition duration-300"
                            >
                                Logout
                            </Link>
                        </div>
                    </div>
                </div>
            </nav>

            <!-- Page Heading -->
            <header
                class="bg-white shadow"
                v-if="$slots.header"
            >
                <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
                    <slot name="header" />
                </div>
            </header>

            <!-- Page Content -->
            <main class="container mx-auto px-4 py-8">
                <slot />
            </main>
        </div>
    </div>
</template>
