# Menggunakan PHP 8.2 dengan Apache
FROM php:8.2-apache

# Install dependencies
RUN apt-get update && apt-get install -y --no-install-recommends \
    unzip curl git libpng-dev libonig-dev libxml2-dev zip libicu-dev \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd intl \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

# Install Composer
COPY --from=composer:2 /usr/bin/composer /usr/local/bin/composer

# Set working directory
WORKDIR /var/www/html

# Copy project files terlebih dahulu
COPY . .

# Ubah permission agar bisa diakses oleh Apache
RUN chown -R www-data:www-data /var/www/html

# Install dependencies dengan user www-data untuk keamanan
USER www-data
RUN composer install --no-interaction --prefer-dist --no-dev

# Kembali ke root user
USER root

# Expose port 80
EXPOSE 80

# Jalankan Apache
CMD ["apache2-foreground"]