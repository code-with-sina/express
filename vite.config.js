import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import path from 'path'

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/js/adminchats.js',
                'resources/js/newchat.js',
                'resources/js/newchatmobile.js',
                'resources/js/client-express-chat.js',
                'resources/js/client-chat-notification.js',
                'resources/js/adminsecchats.js',
                'resources/sass/app.scss',
                'resources/js/app.js',
            ],
            refresh: true,
        }), 
    ],
    resolve: {
        alias: {
            '~bootstrap': path.resolve(__dirname, 'node_modules/bootstrap'),
        }
    },
});
