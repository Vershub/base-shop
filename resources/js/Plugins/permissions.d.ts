import { Plugin } from 'vue'

declare module '@vue/runtime-core' {
    interface ComponentCustomProperties {
        $can: (permission: string | string[]) => boolean
    }
}

export const permissions: Plugin
