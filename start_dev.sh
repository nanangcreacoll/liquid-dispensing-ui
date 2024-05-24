#!/bin/sh

#start in development

# start laravel reverb broadcast
php artisan reverb:start &

# mqtt subscribe to dispensing/status
php artisan app:dispensing-status-subscribe &

# start laravel server
php artisan serve --host 0.0.0.0 --port 8000 &

# start vite server
npm run dev