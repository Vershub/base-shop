declare module '@/Layouts/AdminLayout.vue' {
    import type { DefineComponent } from 'vue'
    const component: DefineComponent<{}, {}, any>
    export default component
}

declare module '*.vue' {
    import type { DefineComponent } from 'vue'
    const component: DefineComponent<{}, {}, any>
    export default component
}

declare module '@vue/runtime-core' {
    interface ComponentCustomProperties {
        $can: (ability: string) => boolean
    }
}

// For all Vue files in Layouts directory
declare module '@/Layouts/*.vue' {
    import type { DefineComponent } from 'vue'
    const component: DefineComponent<{}, {}, any>
    export default component
}

export {}
