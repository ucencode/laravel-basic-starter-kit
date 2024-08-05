#!/bin/sh

# Wait for MySQL
while ! nc -z db 3306; do
  echo "Waiting for MySQL..."
  sleep 3
done

# Run Laravel commands
php artisan migrate

# Start PHP-FPM
php-fpm
