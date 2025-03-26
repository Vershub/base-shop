<template>
  <AdminLayout>
    <div class="mt-8">
      <h3 class="text-center mb-3 uppercase tracking-widest">Products</h3>
      <div class="mb-3 text-right">
        <ButtonPrimaryLink title="Create" :link-route="route('admin.products.create')" link-text="Create"/>
      </div>
      <div class="bg-white shadow-md rounded-lg overflow-hidden">
        <table class="min-w-full divide-y divide-gray-200">
          <thead class="bg-gray-50">
          <tr>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Sort Order</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Create Date</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
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
          </tbody>
        </table>
      </div>
    </div>
  </AdminLayout>
</template>

<script setup lang="ts">
import AdminLayout from "@/layouts/AdminLayout.vue";
import ButtonPrimaryLink from "@/components/Admin/ButtonPrimaryLink.vue";

defineProps({
  bundles: Array,
});

</script>
