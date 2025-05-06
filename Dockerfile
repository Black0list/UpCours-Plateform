# Use official PHP image with required extensions
FROM php:8.2-fpm

# Install dependencies
RUN apt-get update && apt-get install -y \
    build-essential \
    libpng-dev \
    libjpeg-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    curl \
    git \
    npm \
    nodejs \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www

# Copy project files
COPY . .

# Set permissions
RUN chown -R www-data:www-data /var/www \
    && chmod -R 755 /var/www

# Install Laravel dependencies
RUN composer install

# Expose the port PHP-FPM is using (9000)
EXPOSE 9000

# Command to run Laravel's built-in server and PHP-FPM
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=9000"]

