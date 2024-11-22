#!/bin/bash

# Wait for MySQL to be ready
echo "Waiting for the database to be ready..."
sleep 2

echo "Database is ready!"

# Run migrations
echo "Running migrations..."

php artisan migrate --force
echo "Running as $(whoami)"

# Start PHP-FPM
echo "Starting PHP-FPM..."
exec php-fpm
