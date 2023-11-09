import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue';

export default defineConfig({
    plugins: [
        vue(),
        laravel({
            input: [
                'resources/css/app.css',
                'public/scss/main.scss',
                'resources/js/app.js',
                'public/js/main.js'
            ],
            refresh: true,
        }),
    ],
});
