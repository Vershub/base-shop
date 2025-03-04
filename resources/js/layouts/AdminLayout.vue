<template>
  <header class="bg-white shadow-md">
    <div class="mx-auto px-4 py-4 flex justify-between items-center">
      <h1 class="text-xl uppercase font-bold text-gray-800">E-Shop
        <span v-for="role in $page.props.auth.user.roles">
          {{ role.name }}
        </span>
      </h1>
      <nav>
        <ul class="flex space-x-4">
          <li>
            <Link :href="route('logout')"
                  method="post"
                  class="text-gray-600 hover:text-gray-800"
            >Logout
            </Link>
          </li>
        </ul>
      </nav>
    </div>
  </header>
  <div class="h-screen flex flex-1">
    <!-- Sidebar -->
    <aside class="bg-gray-800 text-white w-64 p-4">
      <nav>
        <ul class="space-y-2">
          <li>
            <Link
              :href="route('admin.dashboard')"
              class="block py-2 px-4 rounded hover:bg-gray-700"
            >Dashboard
            </Link>
          </li>
          <li>
            <Link
              :href="route('admin.categories.index')"
              class="block py-2 px-4 rounded hover:bg-gray-700"
            >Categories
            </Link>
          </li>
          <li>
            <button
              @click="isOpen = !isOpen"
              class="flex items-center justify-between w-full py-2 px-4 rounded hover:bg-gray-700"
            >
              <span>Products</span>
              <svg
                class="w-4 h-4 ml-2 transition-transform duration-200"
                :class="{ 'rotate-180': isOpen }"
                fill="none"
                stroke="currentColor"
                viewBox="0 0 24 24"
              >
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
              </svg>
            </button>
            <div
              v-show="isOpen"
              class="left-0 mt-1 w-100 py-2 bg-gray-500 rounded-md shadow-xl z-20"
            >
              <Link
                :href="route('admin.products.index')"
                class="block px-4 py-2 text-sm hover:bg-gray-700"
                :class="{'bg-gray-600': route().current('admin.products.*')}"
              >
                Products
              </Link>
              <Link
                :href="route('admin.bundles.index')"
                class="block px-4 py-2 text-sm hover:bg-gray-700"
                :class="{'bg-gray-600': route().current('admin.bundles.*')}"
              >Bundles
              </Link>
            </div>

          </li>
          <li><a href="#" class="block py-2 px-4 rounded hover:bg-gray-700">Orders</a></li>
          <li><a href="#" class="block py-2 px-4 rounded hover:bg-gray-700">Customers</a></li>
          <li><a href="#" class="block py-2 px-4 rounded hover:bg-gray-700">Analytics</a></li>
          <li><a href="#" class="block py-2 px-4 rounded hover:bg-gray-700">Settings</a></li>
        </ul>
      </nav>
    </aside>
    <!-- Content Area -->
    <main class="flex-1 p-8">
      <slot/>
    </main>
  </div>
</template>

<script setup>
import {Link} from "@inertiajs/vue3";
import { ref } from 'vue'

const isOpen = ref(false)

</script>