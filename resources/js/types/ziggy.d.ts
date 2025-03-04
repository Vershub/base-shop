declare module '@vue/runtime-core' {
    interface ComponentCustomProperties {
        route: (
            name: string,
            params?: Record<string, any> | Array<any>,
            absolute?: boolean,
            config?: Record<string, any>
        ) => string
    }
}
