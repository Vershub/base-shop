<template>
<AdminLayout>
  <Form :languages="languages"/>
</AdminLayout>
</template>

<script setup>
import AdminLayout from "@/Layouts/AdminLayout.vue";
import Form from "@/Pages/Admin/Product/Bundle/Form.vue";

defineProps({
  languages: {
    type: Object,
    required: true,
  },
});
</script>
