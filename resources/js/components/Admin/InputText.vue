<template>
  <label class="block text-sm font-medium text-gray-700 mb-1">{{ label }}</label>
  <input
    v-model="model"
    @focus="clearError()"
    type="text"
    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
  />
  <div v-if="errorMessage" class="text-sm text-red-500 mt-1 mb-3">
    {{ errorMessage }}
  </div>
</template>

<script setup lang="ts">
const props = defineProps({
  errorMessage: {
    type: String,
  },
  label: {
    type: String,
    required: true,
  }
});

const model = defineModel({
  type: String,
});

const emit = defineEmits(['clearError']);

const clearError = () => {
  if (props.errorMessage) {
    emit('clearError', props.errorMessage);
  }
};
</script>
