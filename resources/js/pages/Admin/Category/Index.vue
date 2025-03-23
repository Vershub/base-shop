<template>
  <AdminLayout>
    <div class="mt-8">
      <h3 class="text-center mb-3 uppercase tracking-widest">Categories</h3>
      <div class="mb-3 text-right">
        <ButtonPrimaryLink v-if="$can('create_categories')" title="Create" :link-route="route('admin.categories.create')" link-text="Create"/>
      </div>
      <div class="bg-white shadow-md rounded-lg overflow-hidden">
        <table v-if="$can('view_categories')" class="min-w-full divide-y divide-gray-200">
          <thead class="bg-gray-50">
          <tr>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Sort Order</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Create Date</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
          </tr>
          </thead>
          <tbody class="bg-white divide-y divide-gray-200">
          <tr v-for="category in categories" :key="category.id">
            <td class="px-6 py-4 whitespace-nowrap">{{ category.id }}</td>
            <td class="px-6 py-4 whitespace-nowrap">{{ category?.translation.name }}</td>
            <td class="px-6 py-4 whitespace-nowrap">#{{ category.sort_order }}</td>
            <td class="px-6 py-4 whitespace-nowrap">
              <ActiveBadge :status="category.active" />
            </td>
            <td class="px-6 py-4 whitespace-nowrap">{{ category.created_at }}</td>
            <td class="px-6 py-4 whitespace-nowrap">
              <div class="flex gap-2">
                <EditLink v-if="$can('edit_categories')" :edit-route="route('admin.categories.edit', category.id)" />
                <DeleteLink v-if="$can('delete_categories')" :delete-route="route('admin.categories.destroy', category.id)"/>
              </div>
            </td>
          </tr>
          </tbody>
        </table>
      </div>
    </div>
  </AdminLayout>
</template>

<script setup lang="ts">
import { PropType } from "vue";
import AdminLayout from "@/layouts/AdminLayout.vue";
import ActiveBadge from "@/components/Admin/ActiveBadge.vue";
import DeleteLink from "@/components/Admin/DeleteLink.vue";
import EditLink from "@/components/Admin/EditLink.vue";
import ButtonPrimaryLink from "@/components/Admin/ButtonPrimaryLink.vue";

interface CategoryTranslation {
    name: string;
    locale_code: string;
    category_id: number;
    id: number;
}

interface Category {
    id: number;
    slug: string;
    sort_order: number;
    active: boolean;
    created_at: string;
    translation: CategoryTranslation;
}

defineProps({
    categories: Array as PropType<Category[]>,
});

</script>
