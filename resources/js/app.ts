import './bootstrap';
import '../css/app.css';

import { i18nVue } from 'laravel-vue-i18n';
import {createApp, h} from 'vue';
import type { DefineComponent } from "vue";
import { createInertiaApp } from '@inertiajs/vue3';
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';
import { ZiggyVue } from '../../vendor/tightenco/ziggy/dist/vue.m';
import geoLocation from './Services/Geolocation';

const appName = import.meta.env.VITE_APP_NAME || 'Laravel';

const meta = document.createElement('meta')
meta.name = 'naive-ui-style'
document.head.appendChild(meta)

createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: (name) => resolvePageComponent(`./Pages/${name}.vue`, import.meta.glob<DefineComponent>('./Pages/**/*.vue')),
    setup({ el, App, props, plugin }) {
        return createApp({ render: () => h(App, props) })
            .use(plugin)
            .use(i18nVue, {
                lang: props.initialPage.props.locale,
                resolve: (lang) => import(`../../lang/${lang}.json`)
            })
            .use(ZiggyVue)
            .mount(el)
            .$nextTick(() => {
                delete el.dataset.page
                geoLocation.init();
            });
    },
    progress: {
        color: '#4B5563',
    },
});
