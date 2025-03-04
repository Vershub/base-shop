import { watch, Ref } from 'vue';

interface useForm {
    locales: {
        [key: string]: {
            name?: string;
            description?: string;
            meta_title?: string;
            meta_description?: string;
        }
    };
    static: {
        slug?: string;
        active?: boolean;
        sort_order?: number;
    }
}

export function useChangeLocaleTab(form: useForm, activeLocale: Ref<string>) {
    const handleLocaleChange = (newLocale: string, oldLocale: string) => {
        const ensureLocaleExists = (locale: string) => {
            if (!form.locales[locale]) {
                form.locales[locale] = {};
            }
        };

        const removeEmptyLocale = (locale: string) => {
            const isLocaleEmpty = Object.keys(form.locales[locale]).length === 0;
            if (isLocaleEmpty) {
                delete form.locales[locale];
            }
        };

        ensureLocaleExists(newLocale);
        removeEmptyLocale(oldLocale);
    };

    // Watch the .value of the ref
    watch(activeLocale, handleLocaleChange);

    return {
        handleLocaleChange
    }
}
