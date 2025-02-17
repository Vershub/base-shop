<template>
  <div class="flex items-center">
    <input
      v-model="model"
      type="checkbox"
      :id="keyFor"
      class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded"
    />
    <label :for="keyFor" class="ml-2 block text-sm text-gray-700">{{ label }}</label>
  </div>
</template>

<script setup>
const props = defineProps({
  label: {
    type: String,
    required: true,
  },
  keyFor: {
    type: String,
    required: true,
  },
});

const model = defineModel({
  type: Boolean,
});
</script>