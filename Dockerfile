FROM php:8.1-apache

# Instal dependensi dasar (Ganti -z jadi -y)
RUN apt-get update && apt-get install -y \
    libpng-dev \
    zip \
    unzip \
    && docker-php-ext-install pdo pdo_mysql gd

# Aktifkan mod_rewrite Apache untuk Laravel
RUN a2enmod rewrite

# Copy semua file proyek ke dalam container
COPY . /var/www/html

# Set permission folder storage dan cache
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# Arahkan Apache ke folder public Laravel
RUN sed -i 's|/var/www/html|/var/www/html/public|g' /etc/apache2/sites-available/000-default.conf

# Pasang Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
RUN composer install --no-dev --optimize-autoloader

EXPOSE 80