<template>
  <AdminLayout>
    <h1 class="text-center mb-3 uppercase tracking-widest">Create Product</h1>
    <Form :languages="languages"/>
  </AdminLayout>
</template>

<script setup>
import AdminLayout from "@/Layouts/AdminLayout.vue";
import Form from "@/Pages/Admin/Product/Form.vue";

defineProps({
  languages: {
    type: Object,
    required: true,
  },
});
</script>
