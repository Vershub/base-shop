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
                            <a :href="route('home')" class="text-2xl font-bold">ShopName</a>
                            <div class="ml-10 flex items-baseline space-x-4">
                                <Link :href="route('dashboard')" class="px-3 py-2 rounded-md text-sm font-medium hover:bg-gray-700 transition duration-200">Dashboard</Link>
                                <a href="#" class="px-3 py-2 rounded-md text-sm font-medium hover:bg-gray-700 transition duration-200">Orders</a>
                                <a href="#" class="px-3 py-2 rounded-md text-sm font-medium hover:bg-gray-700 transition duration-200">Wishlist</a>
                                <Link :href="route('profile.edit')" class="px-3 py-2 rounded-md text-sm font-medium hover:bg-gray-700 transition duration-200">Profile</Link>
                                <a href="#" class="px-3 py-2 rounded-md text-sm font-medium hover:bg-gray-700 transition duration-200">Settings</a>
                            </div>
                        </div>
                        <div class="flex items-center">
                            <span class="text-gray-300 mr-4">{{ $page.props.auth.user.name }}</span>
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
  <footer class="bg-gray-800 text-white mt-auto">
    <div class="container mx-auto px-4 py-8">
      <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        <div>
          <h3 class="text-xl font-semibold mb-4">About Us</h3>
          <p class="text-gray-400">We are dedicated to providing the best shopping experience for our customers.</p>
        </div>
        <div>
          <h3 class="text-xl font-semibold mb-4">Quick Links</h3>
          <ul class="space-y-2">
            <li><a href="#" class="text-gray-400 hover:text-white">Home</a></li>
            <li><a href="#" class="text-gray-400 hover:text-white">Products</a></li>
            <li><a href="#" class="text-gray-400 hover:text-white">About</a></li>
            <li><a href="#" class="text-gray-400 hover:text-white">Contact</a></li>
          </ul>
        </div>
        <div>
          <h3 class="text-xl font-semibold mb-4">Contact Us</h3>
          <p class="text-gray-400">123 Shop Street, City, Country</p>
          <p class="text-gray-400">Email: info@shopname.com</p>
          <p class="text-gray-400">Phone: (123) 456-7890</p>
        </div>
      </div>
      <div class="mt-8 pt-8 border-t border-gray-700 text-center text-gray-400">
        <p>&copy; 2025 ShopName. All rights reserved.</p>
      </div>
    </div>
  </footer>
</template>
