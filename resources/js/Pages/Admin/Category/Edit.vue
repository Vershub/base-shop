<template>
  <AdminLayout>
    <h1 class="text-center mb-3 uppercase">Create Category</h1>
    <Form :category="category" :languages="languages" :errors="errors" />
  </AdminLayout>
</template>

<script setup>
import Form from "@/Pages/Admin/Category/Form.vue";
import AdminLayout from "@/Layouts/AdminLayout.vue";

defineProps({
    languages: Object,
    errors: Object,
    category: Object
});

</script>