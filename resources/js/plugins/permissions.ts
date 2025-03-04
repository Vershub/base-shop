import { Plugin } from 'vue'
import { usePage } from "@inertiajs/vue3"
import { PageProps } from '@inertiajs/core'

interface User {
    permissions: string[]
}

interface AuthUser extends PageProps {
    auth: {
        user: User
    }
}

export const permissions: Plugin = {
    install: (app) => {
        app.config.globalProperties.$can = (permission: string | string[]): boolean => {
            const { auth } = usePage<AuthUser>().props
            const permissions = auth?.user?.permissions || []

            if (Array.isArray(permission)) {
                return permission.some(p => permissions.includes(p))
            }
            return permissions.includes(permission)
        }
    }
}
