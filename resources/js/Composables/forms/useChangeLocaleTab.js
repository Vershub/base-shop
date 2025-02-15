import { watch } from 'vue'

export function useChangeLocaleTab(form, activeLocale) {
    const handleLocaleChange = (newLocale, oldLocale) => {
        const ensureLocaleExists = (locale) => {
            if (!form.locales[locale]) {
                form.locales[locale] = {};
            }
        };

        const removeEmptyLocale = (locale) => {
            const isLocaleEmpty = Object.keys(form.locales[locale]).length === 0;
            if (isLocaleEmpty) {
                delete form.locales[locale];
            }
        };

        ensureLocaleExists(newLocale);
        removeEmptyLocale(oldLocale);

    };

    watch(activeLocale, handleLocaleChange);

    return {
        handleLocaleChange
    }
}
