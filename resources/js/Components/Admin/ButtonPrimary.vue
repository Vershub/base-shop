<template>
  <button
    :type="buttonType"
    class="bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-colors duration-300"
  >Submit
  </button>
</template>

<script setup>
defineProps({
  buttonType: {
    type: String,
    default: 'button',
  },
});
</script>