# Menggunakan PHP 8.2 dengan Apache
FROM php:8.2-apache

# Install dependencies
RUN apt-get update && apt-get install -y \
    unzip curl git libpng-dev libonig-dev libxml2-dev zip \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Set working directory
WORKDIR /var/www/html

# Copy project
COPY . .

# Install dependencies
RUN composer install --no-interaction --prefer-dist

# Expose port 80
EXPOSE 80

# Jalankan Apache
CMD ["apache2-foreground"]
