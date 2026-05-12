FROM php:8.1-apache

# Instal dependensi dasar saja
RUN apt-get update && apt-get install -z \
    libpng-dev \
    zip \
    unzip \
    && docker-php-ext-install pdo pdo_mysql gd

# Aktifkan mod_rewrite Apache
RUN a2enmod rewrite

# Copy semua file proyek
COPY . /var/www/html

# Set permissions
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# Sesuaikan DocumentRoot ke public
RUN sed -i 's|/var/www/html|/var/www/html/public|g' /etc/apache2/sites-available/000-default.conf

# Instal Composer secara manual
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
RUN composer install --no-dev --optimize-autoloader

EXPOSE 80