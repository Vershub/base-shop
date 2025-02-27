import { usePage } from "@inertiajs/vue3";

export const permissions = {
    install: (app) => {
        app.config.globalProperties.$can = (permission) => {
            const permissions = usePage().props.auth.user?.permissions || [];
            if (Array.isArray(permission)) {
                return permission.some(p => permissions.includes(p));
            }
            return permissions.includes(permission);
        };
    },
};
