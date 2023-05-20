import "./bootstrap";
import "../css/app.css";

import { createApp, h } from "vue";
import { createPinia } from 'pinia'
import { createInertiaApp } from "@inertiajs/vue3";
import { resolvePageComponent } from "laravel-vite-plugin/inertia-helpers";
import { ZiggyVue } from "../../vendor/tightenco/ziggy/dist/vue.m";


const appName =
    window.document.getElementsByTagName("title")[0]?.innerText || "Cafe Purr";

createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: (name) =>
        resolvePageComponent(
            `./Pages/${name}.vue`,
            import.meta.glob("./Pages/**/*.vue")
        ),
    setup({ el, App, props, plugin }) {
        const app = createApp({ render: () => h(App, props) })
            .use(plugin)
            .use(ZiggyVue, Ziggy);
        app.use(createPinia()); // Use Pinia
        app.mount(el);
    },
    progress: {
        color: "#4B5563",
    },
});
