<template>
  <label class="block text-sm font-medium text-gray-700 mb-1">{{ label }}</label>
  <input
    @change="handleFileChange"
    @focus="clearError()"
    type="file"
    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
  />
  <div v-if="errorMessage" class="text-sm text-red-500 mt-1 mb-3">
    {{ errorMessage }}
  </div>
  <div v-if="previewUrl" class="mt-2">
    <img :src="previewUrl" alt="">
  </div>
</template>

<script setup>
import { ref } from "vue";
const previewUrl = ref(null);

const props = defineProps({
  errorMessage: {
    type: String,
  },
  label: {
    type: String,
    required: true,
  }
});

const handleFileChange = (event) => {
  const file = event.target.files[0];
  if (file) {
    if (file.type.startsWith('image/')) {
      previewUrl.value = URL.createObjectURL(file);
    }
    emit('fileSelected', file);
  }
};


const emit = defineEmits(['clearError', 'fileSelected']);

const clearError = () => {
  if (props.errorMessage) {
    emit('clearError', props.errorMessage);
  }
};
</script>
