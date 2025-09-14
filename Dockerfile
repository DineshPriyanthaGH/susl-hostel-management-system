# Use official PHP 8.2 with Apache
FROM php:8.2-apache

# Set working directory
WORKDIR /var/www/html

# Install system dependencies (minimal set)
RUN apt-get update && apt-get install -y \
    git \
    libpng-dev \
    libzip-dev \
    zip \
    unzip \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*

# Install only absolutely essential PHP extensions
RUN docker-php-ext-install \
    pdo_mysql \
    zip

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copy application files
COPY . /var/www/html

# Create required directories and set permissions
RUN mkdir -p storage/logs storage/framework/{cache,sessions,views} bootstrap/cache \
    && chown -R www-data:www-data storage bootstrap/cache \
    && chmod -R 775 storage bootstrap/cache

# Install PHP dependencies
RUN composer install --no-dev --optimize-autoloader --no-interaction

# Set up Laravel environment
RUN cp .env.example .env || true \
    && php artisan key:generate || true \
    && mkdir -p storage/logs \
    && touch storage/logs/laravel.log

# Laravel optimizations
RUN php artisan config:cache \
    && php artisan route:cache \
    && php artisan view:cache

# Enable Apache mod_rewrite and set ServerName
RUN a2enmod rewrite \
    && echo "ServerName localhost" >> /etc/apache2/apache2.conf

# Configure Apache document root and virtual host
ENV APACHE_DOCUMENT_ROOT=/var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf \
    && sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

# Create Apache virtual host for Laravel
RUN echo '<VirtualHost *:80>\n\
    DocumentRoot /var/www/html/public\n\
    <Directory /var/www/html/public>\n\
        AllowOverride All\n\
        Require all granted\n\
    </Directory>\n\
    ErrorLog ${APACHE_LOG_DIR}/error.log\n\
    CustomLog ${APACHE_LOG_DIR}/access.log combined\n\
</VirtualHost>' > /etc/apache2/sites-available/000-default.conf

# Copy startup script
COPY docker-startup.sh /usr/local/bin/startup.sh
RUN chmod +x /usr/local/bin/startup.sh

# Expose port 80
EXPOSE 80

# Use startup script
CMD ["/usr/local/bin/startup.sh"]