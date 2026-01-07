import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css', 
                'resources/js/app.js',
                'resources/css/landing.css',
                'resources/js/landing.js',
                'resources/css/enrollment.css',
                'resources/js/enrollment.js',
                'resources/css/admin.css',
                'resources/static-import/style.css'
            ],
            refresh: true,
        }),
    ],
});

