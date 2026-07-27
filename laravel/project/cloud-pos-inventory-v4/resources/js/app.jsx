import '../css/app.css';
import './bootstrap';
import $ from 'jquery';
window.$ = window.jQuery = $;
import 'bootstrap/dist/css/bootstrap.min.css';
import 'slick-carousel/slick/slick.css';
import 'slick-carousel/slick/slick-theme.css';
import 'select2/dist/css/select2.min.css';
import 'select2/dist/js/select2.min.js';
import 'animate.css';

import { createInertiaApp } from '@inertiajs/react';
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';
import { createRoot } from 'react-dom/client';

const appName = import.meta.env.VITE_APP_NAME || 'Laravel';

createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: (name) => {
        const pages = {
            ...import.meta.glob('./Pages/**/*.jsx'),
            ...import.meta.glob('./Customer/Pages/**/*.jsx'),
        };
        const pagePath = `./Pages/${name}.jsx`;
        const customerPagePath = `./Customer/Pages/${name}.jsx`;

        return resolvePageComponent(
            pages[pagePath] ? pagePath : customerPagePath,
            pages,
        );
    },
    setup({ el, App, props }) {
        const root = createRoot(el);

        root.render(<App {...props} />);
    },
    progress: {
        color: '#4B5563',
    },
});
