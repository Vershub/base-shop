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
          <li><a href="#" class="block py-2 px-4 rounded hover:bg-gray-700">Products</a></li>
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
</script>