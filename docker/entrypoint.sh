#!/bin/sh

# Check if vendor directory exists
if [ ! -d "vendor" ]; then
  echo "Vendor directory not found. Running composer install..."
  composer install
else
  echo "Vendor directory found. Skipping composer install."
fi

# Wait for MySQL
while ! nc -z db 3306; do
  echo "Waiting for MySQL..."
  sleep 3
done

# Generate application key if not set
if grep -q "APP_KEY=" .env && [ -z "$(grep "APP_KEY=" .env | cut -d '=' -f2)" ]; then
  php artisan key:generate
fi

# Create symbolic link for storage if it doesn't exist
if [ ! -L /var/www/public/storage ]; then
  php artisan storage:link
fi

# Run Laravel commands
php artisan migrate

# Start PHP-FPM
php-fpm
