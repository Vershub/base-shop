<template>
    <AdminLayout>
        <div class="mt-8">
            <h3 class="text-xl font-semibold text-gray-800 mb-4">Categories</h3>
            <div class="mb-3 text-right">
                <Link
                    :href="route('admin.categories.create')"
                    class="px-4 py-2 bg-blue-500 text-white rounded-lg shadow-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-opacity-75 transition-colors duration-200"
                >Create</Link>
            </div>
            <div class="bg-white shadow-md rounded-lg overflow-hidden">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Category ID</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Sort Order</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
                    </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                    <tr v-for="category in categories" :key="category.id">
                        <td class="px-6 py-4 whitespace-nowrap">#{{ category.id }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ category?.translation.name }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{  category.sort_order }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                          <ActiveBadge :status="category.active" />
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ category.created_at }}</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </AdminLayout>
</template>

<script setup>
import {Link} from "@inertiajs/vue3";
import AdminLayout from "@/Layouts/AdminLayout.vue";
import ActiveBadge from "@/Components/Admin/ActiveBadge.vue";

defineProps({
    categories: Array,
});

</script>
