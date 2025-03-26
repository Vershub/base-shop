<template>
  <AdminLayout>
    <h1 class="text-center mb-3 uppercase tracking-widest">Create Category</h1>
    <Form :languages="languages" :errors="errors" />
  </AdminLayout>
</template>

<script setup lang="ts">
import AdminLayout from "@/layouts/AdminLayout.vue";
import Form from "./Form.vue";

defineProps({
  languages: {
      type: Object,
      required: true,
  },
  errors: Object
});
</script>
