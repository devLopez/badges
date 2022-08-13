import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/scss/portrait.scss', 'resources/scss/landscape.scss']
        }),
    ],
    build: {
        outDir: 'resources/css',
        rollupOptions: {
            output: {
                assetFileNames: '[name][extname]'
            }
        }
    }
})
