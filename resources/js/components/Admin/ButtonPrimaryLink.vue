<template>
  <Link
    :href="linkRoute"
    class="px-4 py-2 bg-blue-500 text-white rounded-lg shadow-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-opacity-75 transition-colors duration-200"
  >{{ linkText }}</Link>
</template>

<script setup>
import { Link } from "@inertiajs/vue3";

defineProps({
  linkRoute: {
    type: String,
    required: true,
  },
  linkText: {
    type: String,
    required: true,
  }
})
</script>