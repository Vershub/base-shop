<template>
  <AdminLayout>
    <h1 class="text-center mb-3 uppercase tracking-widest">Edit Category</h1>
    <Form :category="category" :languages="languages" :errors="errors" />
  </AdminLayout>
</template>

<script setup lang="ts">
import Form from "@/pages/Admin/Category/Form.vue";
import AdminLayout from "@/layouts/AdminLayout.vue";

defineProps({
    languages: {
        type: Object,
        required: true,
    },
    errors: Object,
    category: {
        type: Object,
        required: true
    }
});

</script>
