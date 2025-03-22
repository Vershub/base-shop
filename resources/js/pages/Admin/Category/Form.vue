<template>
  <div
    class="bg-white p-8 rounded-lg shadow-md w-full max-w"
    :class="{'border border-red-600': form.hasErrors}"
  >
    <form @submit.prevent="submit" enctype="multipart/form-data">
      <div class="mb-4 mx-auto bg-white rounded-xl shadow-md overflow-hidden">
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
            <InputText
              label="Name(*)"
              v-model="form.locales[activeLocale].name"
              :error-message="form.errors[`locales.${activeLocale}.name`]"
              @clearError="form.clearErrors(`locales.${activeLocale}.name`)"
            />
          </div>

          <div class="mb-4">
            <InputTextArea
              label="Description(*)"
              v-model="form.locales[activeLocale].description"
              :error-message="form.errors[`locales.${activeLocale}.description`]"
              @clearError="form.clearErrors(`locales.${activeLocale}.description`)"
            />
          </div>

          <div class="mb-4">
            <InputText
              label="Meta Title"
              v-model="form.locales[activeLocale].meta_title"
            />
          </div>

          <div class="mb-6">
            <InputTextArea
              label="Meta Description"
              v-model="form.locales[activeLocale].meta_description"
            />
          </div>
        </div>
      </div>

      <div class="flex gap-4 mb-4">
        <div class="w-[33%]">
          <InputFile
            label="Image"
            @fileSelected="handleFile"
            :preview="form.static.image"
          />
        </div>
        <div class="w-[33%]">
          <InputText
            label="Slug(*)"
            v-model="form.static.slug"
            :error-message="form.errors[`static.slug`]"
            @clearError="form.clearErrors('static.slug')"
          />
        </div>

        <div class="w-[33%]">
          <InputNumber
            label="Sort Order"
            v-model="form.static.sort_order"
          />
        </div>
      </div>

      <div class="mb-4">
        <InputCheckbox
          v-model="form.static.active"
          key-for="active"
          label="Active"
        />
      </div>


      <div class="mb-4">
        <ButtonPrimary
          type="submit"
          :disabled="form.processing"
        />
      </div>
    </form>
  </div>
</template>

<script setup>
import { watch } from "vue";
import { ref } from "vue";
import { useLocaleStore } from "@/stores/localeStore.ts";
import { useEntityForm } from "@/Composables/forms/useEntityForm.ts";
import { useChangeLocaleTab } from "@/Composables/forms/useChangeLocaleTab.ts";
import InputText from "@/Components/Admin/InputText.vue";
import InputTextArea from "@/Components/Admin/InputTextArea.vue";
import InputNumber from "@/Components/Admin/InputNumber.vue";
import InputCheckbox from "@/Components/Admin/InputCheckbox.vue";
import ButtonPrimary from "@/Components/Admin/ButtonPrimary.vue";
import InputFile from "@/Components/Admin/InputFile.vue";

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

const handleFile = (file) => {
  form.static.image = file;
};


const submit = () => {
  if (props.category) {
    form._method = 'PUT';
    form.transform((data) => {
      data._method = 'PUT';
      return data;
    }).post(route('admin.categories.update', props.category.id));
  } else {
    form.post(route('admin.categories.store'));
  }
};
</script>
