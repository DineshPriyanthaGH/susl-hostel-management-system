#!/bin/bash

# SUSL Hostel Management System - Docker Startup Script
echo "🚀 Starting SUSL Hostel Management System..."

# Wait for database to be ready
echo "⏳ Waiting for database connection..."
until php artisan migrate:status 2>/dev/null; do
    echo "Database not ready, waiting 2 seconds..."
    sleep 2
done

# Run database migrations
echo "📊 Running database migrations..."
php artisan migrate --force

# Seed admin user if not exists
echo "👤 Setting up admin user..."
php artisan db:seed --class=AdminUserSeeder --force || echo "Admin user already exists"

# Clear and cache configurations
echo "⚡ Optimizing Laravel..."
php artisan config:clear
php artisan cache:clear
php artisan route:clear
php artisan view:clear

php artisan config:cache
php artisan route:cache
php artisan view:cache

# Set permissions
chmod -R 775 storage bootstrap/cache
chown -R www-data:www-data storage bootstrap/cache

echo "✅ SUSL Hostel Management System ready!"
echo "🌐 Admin panel: /admin/login"
echo "📧 Admin email: admin@susl.ac.lk"
echo "🔑 Admin password: admin123"

# Start Apache
exec apache2-foreground