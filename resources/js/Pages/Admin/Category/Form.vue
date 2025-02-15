<template>
  <div
    class="bg-white p-8 rounded-lg shadow-md w-full max-w"
    :class="{'border border-red-600': form.hasErrors}"
  >
    <form @submit.prevent="submit">
      <div class="mb-3 mx-auto bg-white rounded-xl shadow-md overflow-hidden">
        <div class="flex border-b">
          <button v-for="(value, key) in languages"
                  @click="activeLocale = key"
                  :class="{ 'bg-gray-200': activeLocale === key }"
                  :key="key"
                  type="button"
                  class="px-4 py-2 text-sm font-medium text-gray-600 hover:text-gray-800 hover:bg-gray-100 uppercase"
          >{{ value.name }}
          </button>
        </div>

        <div class="p-6">
          <div class="mb-4">
            <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Name(*)</label>
            <input
              v-model="form.locales[activeLocale].name"
              @focus="form.clearErrors(`locales.${activeLocale}.name`)"
              type="text"
              name="name"
              class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
            />
            <div v-if="form.errors[`locales.${activeLocale}.name`]" class="text-sm text-red-500 mt-1 mb-3">
              {{ form.errors[`locales.${activeLocale}.name`] }}
            </div>
          </div>

          <div class="mb-4">
            <label for="description" class="block text-sm font-medium text-gray-700 mb-1">Description(*)</label>
            <textarea
              v-model="form.locales[activeLocale].description"
              @focus="form.clearErrors(`locales.${activeLocale}.description`)"
              name="description"
              rows="3"
              class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
            ></textarea>
            <div v-if="form.errors[`locales.${activeLocale}.description`]" class="text-sm text-red-500 mt-1 mb-3">
              {{ form.errors[`locales.${activeLocale}.description`] }}
            </div>
          </div>

          <div class="mb-4">
            <label for="meta_title" class="block text-sm font-medium text-gray-700 mb-1">Meta Title</label>
            <input
              v-model="form.locales[activeLocale].meta_title"
              type="text"
              name="meta_title"
              class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
            />
          </div>

          <div class="mb-6">
            <label for="meta_description" class="block text-sm font-medium text-gray-700 mb-1">Meta Description</label>
            <textarea
              v-model="form.locales[activeLocale].meta_description"
              name="meta_description"
              rows="3"
              class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
            ></textarea>
          </div>
        </div>
      </div>

      <div class="flex gap-4 mb-3">
        <div class="w-[50%]">
          <label for="slug" class="block text-sm font-medium text-gray-700 mb-1">Slug(*)</label>
          <input
            v-model="form.static.slug"
            @focus="form.clearErrors('static.slug')"
            type="text"
            id="slug"
            name="slug"
            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
          />
          <div v-if="form.errors[`static.slug`]" class="text-sm text-red-500 mt-1 mb-3">
            {{ form.errors[`static.slug`] }}
          </div>
        </div>

        <div class="w-[50%]">
          <label for="sort_order" class="block text-sm font-medium text-gray-700 mb-1">Sort Order</label>
          <input
            v-model="form.static.sort_order"
            type="number"
            step="1"
            id="sort_order"
            name="sort_order"
            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
          />
        </div>
      </div>

      <div class="mb-3 flex items-center">
        <input
          v-model="form.static.active"
          type="checkbox"
          id="active"
          name="active"
          class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded"
        />
        <label for="active" class="ml-2 block text-sm text-gray-700">Active</label>
      </div>

      <div class="mb-3">
        <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-colors duration-300">Submit</button>
      </div>
    </form>
  </div>
</template>

<script setup>
import { watch } from "vue";
import { ref } from "vue";
import { useLocaleStore } from "@/stores/localeStore.js";
import { useEntityForm } from "@/Composables/forms/useEntityForm.js";
import { useChangeLocaleTab } from "@/Composables/forms/useChangeLocaleTab.js";

const props = defineProps({
  category: {
    type: Object,
    required: false
  },
  languages: {
    type: Object,
    required: true
  }
});

const activeLocale = ref(useLocaleStore().defaultLocale);
const { form } = useEntityForm(activeLocale.value, props.category ?? {active: true, sort_order: 1})
useChangeLocaleTab(form, activeLocale);

watch(() => form.errors, (newErrors) => {
  if (Object.keys(newErrors).length > 0) {
    activeLocale.value = useLocaleStore().defaultLocale;
  }
}, { deep: true });

const submit = () => {
  if (props.category) {
    form.put(route('admin.categories.update', props.category.id));
  } else {
    form.post(route('admin.categories.store'));
  }
};
</script>
