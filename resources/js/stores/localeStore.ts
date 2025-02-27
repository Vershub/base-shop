import { defineStore } from "pinia";

export const useLocaleStore = defineStore('defaultLocale', {
    state: () => {
        return { defaultLocale: 'de' }
    },
})