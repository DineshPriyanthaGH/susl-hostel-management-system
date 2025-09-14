#!/bin/bash

# SUSL Hostel Management System - Docker Startup Script
echo "🚀 Starting SUSL Hostel Management System..."

# Clear all cached configurations first
echo "🧹 Clearing cached configurations..."
php artisan config:clear
php artisan cache:clear
php artisan route:clear
php artisan view:clear

# Update .env with production values
echo "📝 Setting up production environment..."
# Copy .env.example if .env doesn't exist
if [ ! -f .env ]; then
    cp .env.example .env
fi

# Update database configuration
sed -i "s/DB_DATABASE=.*/DB_DATABASE=\${DB_DATABASE:-susl_hostel_management_syst}/" .env
sed -i "s/DB_HOST=.*/DB_HOST=\${DB_HOST:-\${DATABASE_HOST}}/" .env
sed -i "s/DB_USERNAME=.*/DB_USERNAME=\${DB_USERNAME:-susl_root}/" .env
sed -i "s/DB_PASSWORD=.*/DB_PASSWORD=\${DB_PASSWORD}/" .env
sed -i "s/APP_ENV=.*/APP_ENV=production/" .env
sed -i "s/APP_DEBUG=.*/APP_DEBUG=false/" .env

# Set APP_KEY if provided
if [ ! -z "\${APP_KEY}" ]; then
    sed -i "s/APP_KEY=.*/APP_KEY=\${APP_KEY}/" .env
fi

# Clear cache again after updating .env
php artisan config:clear

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

# Cache configurations for production
echo "⚡ Optimizing Laravel..."
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