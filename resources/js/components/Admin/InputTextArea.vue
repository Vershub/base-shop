<template>
  <label class="block text-sm font-medium text-gray-700 mb-1">{{ label }}</label>
  <textarea
    v-model="model"
    @focus="clearError()"
    :rows="rows"
    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 text-black"
  ></textarea>
  <div v-if="errorMessage" class="text-sm text-red-500 mt-1 mb-3">
    {{ errorMessage }}
  </div>
</template>

<script setup>
const props = defineProps({
  label: {
    type: String,
    required: true,
  },
  rows: {
    type: Number,
    default: 3,
  },
  errorMessage: {
    type: String,
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
