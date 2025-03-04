import '../css/app.css';
import './bootstrap';
import { createPinia } from 'pinia';
import { permissions } from './Plugins/permissions';

import { createInertiaApp } from '@inertiajs/vue3';
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';
import { createApp, h, type App as VueApp } from 'vue';
import { ZiggyVue } from '../../vendor/tightenco/ziggy';

const appName = import.meta.env.VITE_APP_NAME || 'Laravel';

createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: (name) =>
        resolvePageComponent(
            `./Pages/${name}.vue`,
            import.meta.glob('./Pages/**/*.vue')
        ),
    setup({ el, App, props, plugin }) {
        const app = createApp({ render: () => h(App, props) });

        app.use(plugin)
            .use(permissions)
            .use(ZiggyVue)
            .use(createPinia());

        app.mount(el);
        return app;
    },
    progress: {
        color: '#4B5563',
    },
}).catch(error => console.error('Inertia setup failed:', error));
