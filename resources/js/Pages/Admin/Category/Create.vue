<template>
    <AdminLayout>

        <Form :languages="languages" />
    </AdminLayout>
</template>

<script setup>
import AdminLayout from "@/Layouts/AdminLayout.vue";
import Form from "./Form.vue";

defineProps(['languages']);
</script>
