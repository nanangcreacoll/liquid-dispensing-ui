#!/bin/bash

# start laravel server
php artisan serve &

# start laravelreverb broadcast
php artisan reverb:start &

# mqtt subscribe to dispensing/status
php artisan app:dispensing-status-subscribe
