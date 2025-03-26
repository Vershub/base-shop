<template>
  <AdminLayout>
    <h2 class="text-2xl font-semibold text-gray-800 mb-4">Dashboard</h2>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
      <!-- Dashboard Cards -->
      <div class="bg-white p-4 rounded-lg shadow">
        <h3 class="text-lg font-semibold text-gray-700">Total Orders</h3>
        <p class="text-3xl font-bold text-gray-800 mt-2">1,234</p>
      </div>
      <div class="bg-white p-4 rounded-lg shadow">
        <h3 class="text-lg font-semibold text-gray-700">Total Revenue</h3>
        <p class="text-3xl font-bold text-gray-800 mt-2">$45,678</p>
      </div>
      <div class="bg-white p-4 rounded-lg shadow">
        <h3 class="text-lg font-semibold text-gray-700">Total Products</h3>
        <p class="text-3xl font-bold text-gray-800 mt-2">567</p>
      </div>
      <div class="bg-white p-4 rounded-lg shadow">
        <h3 class="text-lg font-semibold text-gray-700">Total Customers</h3>
        <p class="text-3xl font-bold text-gray-800 mt-2">890</p>
      </div>
    </div>

    <!-- Recent Orders Table -->
    <div class="mt-8">
      <h3 class="text-xl font-semibold text-gray-800 mb-4">Recent Orders</h3>
      <div class="bg-white shadow-md rounded-lg overflow-hidden">
        <table class="min-w-full divide-y divide-gray-200">
          <thead class="bg-gray-50">
          <tr>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Order ID</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Customer</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Total</th>
          </tr>
          </thead>
          <tbody class="bg-white divide-y divide-gray-200">
          <tr>
            <td class="px-6 py-4 whitespace-nowrap">#12345</td>
            <td class="px-6 py-4 whitespace-nowrap">John Doe</td>
            <td class="px-6 py-4 whitespace-nowrap">2023-05-01</td>
            <td class="px-6 py-4 whitespace-nowrap"><span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Completed</span></td>
            <td class="px-6 py-4 whitespace-nowrap">$123.45</td>
          </tr>
          <tr>
            <td class="px-6 py-4 whitespace-nowrap">#12346</td>
            <td class="px-6 py-4 whitespace-nowrap">Jane Smith</td>
            <td class="px-6 py-4 whitespace-nowrap">2023-05-02</td>
            <td class="px-6 py-4 whitespace-nowrap"><span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">Pending</span></td>
            <td class="px-6 py-4 whitespace-nowrap">$67.89</td>
          </tr>
          </tbody>
        </table>
      </div>
    </div>
  </AdminLayout>
</template>

<script setup lang="ts">
import AdminLayout from "@/layouts/AdminLayout.vue";
</script>
