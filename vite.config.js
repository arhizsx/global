import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/css/tau.css',
                'resources/css/jquery.signature.css',
                'resources/js/app.js',
                'resources/js/tau.js',
                'resources/js/jquery.signature.js',
            ],
            refresh: true,
        }),
    ],
});
