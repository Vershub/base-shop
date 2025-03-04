
interface ImportMetaEnv {
    readonly VITE_APP_NAME: string
}

interface ImportMeta {
    readonly env: ImportMetaEnv
    glob: <T>(pattern: string) => Record<string, () => Promise<T>>
    readonly hot?: {
        accept: Function
        dispose: Function
    }
}

/// <reference types="vite/client" />

declare module '@/Layouts/*.vue' {
    import type { DefineComponent } from 'vue'
    const component: DefineComponent<{}, {}, any>
    export default component
}

declare module '*.vue' {
    import type { DefineComponent } from 'vue'
    const component: DefineComponent<{}, {}, any>
    export default component
}
