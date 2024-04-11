#!/bin/bash

# Start Laravel development server
php artisan serve &

# Start Reverb service
php artisan reverb:start &

# Subscribe to dispensing status
php artisan app:dispensing-status-subscribe
