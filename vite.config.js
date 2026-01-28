import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from '@tailwindcss/vite';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
            hotFile: 'storage/vite.hot', // En prod, ce fichier n'existe pas
        }),
        tailwindcss(),
    ],
    build: {
        outDir: 'public/build',
        manifest: 'manifest.json',
        minify: 'terser',
    },
    server: {
        watch: {
            ignored: ['**/storage/framework/views/**'],
        },
    },
});