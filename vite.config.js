import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue';

export default defineConfig({
    plugins: [
        laravel(['resources/js/app.js',
            'resources/assets/admin/plugins/fontawesome-free/css/all.min.css',
            'resources/assets/admin/css/adminlte.css',
            'resources/assets/admin/plugins/jquery/jquery.min.js',
            'resources/assets/admin/plugins/bootstrap/js/bootstrap.bundle.min.js',
            'resources/assets/admin/js/adminlte.min.js',
            'resources/assets/admin/js/demo.js',

        ]),
        vue({
            template: {
                transformAssetUrls: {
                    // The Vue plugin will re-write asset URLs, when referenced
                    // in Single File Components, to point to the Laravel web
                    // server. Setting this to `null` allows the Laravel plugin
                    // to instead re-write asset URLs to point to the Vite
                    // server instead.
                    base: null,

                    // The Vue plugin will parse absolute URLs and treat them
                    // as absolute paths to files on disk. Setting this to
                    // `false` will leave absolute URLs un-touched so they can
                    // reference assets in the public directory as expected.
                    includeAbsolute: false,
                },
            },
        }),
    ],
});
