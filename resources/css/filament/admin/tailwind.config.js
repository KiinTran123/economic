import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import preset from '../../../../vendor/filament/filament/tailwind.config.preset';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
                'resources/css/filament/admin/theme.css',
            ],
            refresh: true,
        }),
    ],
    css: {
        preprocessorOptions: {
            scss: {
                // Nếu cần SCSS, thêm ở đây
            },
        },
    },
    build: {
        rollupOptions: {
            // Tùy chọn build nếu cần
        },
    },
    // Tailwind config được xử lý qua preset, không cần content trực tiếp ở đây
});
