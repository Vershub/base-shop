import { defineStore } from "pinia";

export const useLocaleStore = defineStore('defaultLocale', () => {
    const defaultLocale = 'de'

    return {
        defaultLocale,
    };
})