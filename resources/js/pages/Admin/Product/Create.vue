<template>
  <AdminLayout>
    <h1 class="text-center mb-3 uppercase tracking-widest">Create Product</h1>
    <Form :languages="languages"/>
  </AdminLayout>
</template>

<script setup lang="ts">
import AdminLayout from "@/layouts/AdminLayout.vue";
import Form from "@/pages/Admin/Product/Form.vue";

defineProps({
  languages: {
    type: Object,
    required: true,
  },
});
</script>
