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
                </div>
            </div>

            <div class="flex gap-4 mb-4">
                <div class="w-[35%]">
                    <InputFile
                        label="Image(*)"
                        @fileSelected="handleFile"
                        :preview="form.static.image"
                    />
                </div>

                <div class="w-[35%]">
                    <InputText
                        label="SKU(*)"
                        v-model="form.static.sku"
                        :error-message="form.errors[`static.sku`]"
                        @clearError="form.clearErrors('static.sku')"
                    />
                </div>

                <div class="w-[15%]">
                    <InputNumber
                        label="Price(*)"
                        v-model="form.static.price"
                    />
                </div>

                <div class="w-[15%]">
                    <InputNumber
                        label="In Stock(*)"
                        v-model="form.static.in_stock"
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

<script lang="ts" setup>
import { route } from "ziggy-js";
import { watch } from "vue";
import { ref } from "vue";
import { useLocaleStore } from "@/stores/localeStore";
import { useEntityForm } from "@/composables/forms/useEntityForm";
import { useChangeLocaleTab } from "@/composables/forms/useChangeLocaleTab";
import InputText from "@/components/Admin/InputText.vue";
import InputTextArea from "@/components/Admin/InputTextArea.vue";
import InputNumber from "@/components/Admin/InputNumber.vue";
import InputCheckbox from "@/components/Admin/InputCheckbox.vue";
import ButtonPrimary from "@/components/Admin/ButtonPrimary.vue";
import InputFile from "@/components/Admin/InputFile.vue";

const props = defineProps({
    product: {
        type: Object,
        required: false
    },
    languages: {
        type: Object,
        required: true
    }
});

const activeLocale = ref(useLocaleStore().defaultLocale);
const { form } = useEntityForm(activeLocale.value, props.product ?? {active: true, in_stock: true})
useChangeLocaleTab(form, activeLocale);

watch(() => form.errors, (newErrors) => {
    if (Object.keys(newErrors).length > 0) {
        activeLocale.value = useLocaleStore().defaultLocale;
    }
}, { deep: true });

const handleFile = (file: File) => {
    form.static.image = file;
};

const submit = () => {
    if (props.product) {
        form._method = 'PUT';
        form.transform((data) => {
            data._method = 'PUT';
            return data;
        }).post(route('admin.products.update', props.product.id));
    } else {
        form.post(route('admin.products.store'));
    }
};
</script>
