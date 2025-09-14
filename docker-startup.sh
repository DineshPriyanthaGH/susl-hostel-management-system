#!/bin/bash

# SUSL Hostel Management System - Docker Startup Script
echo "🚀 Starting SUSL Hostel Management System..."

# Clear all cached configurations first
echo "🧹 Clearing cached configurations..."
php artisan config:clear
php artisan cache:clear
php artisan route:clear
php artisan view:clear

# Update .env with production values from environment variables
echo "📝 Setting up production environment..."

# Extract database details from DB_URL if available
if [ ! -z "$DB_URL" ]; then
    # Extract host from DB_URL: mysql://user:pass@host:port/db
    DB_HOST_EXTRACTED=$(echo "$DB_URL" | sed -n 's|.*@\([^:]*\):.*|\1|p')
    DB_PORT_EXTRACTED=$(echo "$DB_URL" | sed -n 's|.*:\([0-9]*\)/.*|\1|p')
    DB_USER_EXTRACTED=$(echo "$DB_URL" | sed -n 's|mysql://\([^:]*\):.*|\1|p')
    DB_PASS_EXTRACTED=$(echo "$DB_URL" | sed -n 's|mysql://[^:]*:\([^@]*\)@.*|\1|p')
    DB_NAME_EXTRACTED=$(echo "$DB_URL" | sed -n 's|.*/\([^?]*\).*|\1|p')
    
    echo "Using database connection details from DB_URL"
    echo "Host: $DB_HOST_EXTRACTED"
    echo "Database: $DB_NAME_EXTRACTED"
    echo "User: $DB_USER_EXTRACTED"
else
    # Use individual environment variables
    DB_HOST_EXTRACTED="$DB_HOST"
    DB_PORT_EXTRACTED="${DB_PORT:-3306}"
    DB_USER_EXTRACTED="$DB_USERNAME"
    DB_PASS_EXTRACTED="$DB_PASSWORD"
    DB_NAME_EXTRACTED="$DB_DATABASE"
fi

# Copy .env.example if .env doesn't exist
if [ ! -f .env ]; then
    cp .env.example .env
fi

# Update .env file with actual values (not variables)
sed -i "s|DB_HOST=.*|DB_HOST=$DB_HOST_EXTRACTED|" .env
sed -i "s|DB_PORT=.*|DB_PORT=$DB_PORT_EXTRACTED|" .env
sed -i "s|DB_DATABASE=.*|DB_DATABASE=$DB_NAME_EXTRACTED|" .env
sed -i "s|DB_USERNAME=.*|DB_USERNAME=$DB_USER_EXTRACTED|" .env
sed -i "s|DB_PASSWORD=.*|DB_PASSWORD=$DB_PASS_EXTRACTED|" .env
sed -i "s|APP_ENV=.*|APP_ENV=production|" .env
sed -i "s|APP_DEBUG=.*|APP_DEBUG=false|" .env

# Set APP_KEY if provided
if [ ! -z "$APP_KEY" ]; then
    sed -i "s|APP_KEY=.*|APP_KEY=$APP_KEY|" .env
fi

# Set APP_URL if provided
if [ ! -z "$APP_URL" ]; then
    sed -i "s|APP_URL=.*|APP_URL=$APP_URL|" .env
fi

echo "✅ Environment configured successfully"

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