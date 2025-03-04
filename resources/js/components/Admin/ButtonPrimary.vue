<template>
  <button
    :type="buttonType"
    :disabled="disabled"
    class="bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-colors duration-300"
    :class="{'disabled:bg-gray-400 disabled:cursor-not-allowed' : disabled}"
  >{{ buttonLabel }}
  </button>
</template>

<script setup>
defineProps({
  buttonType: {
    type: String,
    default: 'button',
  },
  buttonLabel: {
    type: String,
    default: 'Submit',
  },
  disabled: {
    type: Boolean,
    default: false,
  }
});
</script>