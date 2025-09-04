import {defineConfig} from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
          input: ['resources/css/welcom.css', 'resources/js/welcom.js','resources/sass/tabler.scss'],
            refresh: true,
        }),
    ],
    server: {
        hmr: {
            host: 'localhost',
            protocol: 'ws',
            port: 3000
        }
    },
    build: {
        commonjsOptions: {
            transformMixedEsModules: true
        }
    }
});
