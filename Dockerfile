FROM php:8.3-fpm

# Установка зависимостей
RUN apt-get update && apt-get install -y \
    git \
    libonig-dev \
    libzip-dev \
    unzip \
    && docker-php-ext-install pdo pdo_mysql zip

# Установка Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
# Копирование проекта
WORKDIR /var/www/html
COPY . .

# Установка зависимостей Laravel
RUN composer install --optimize-autoloader --no-dev

# Права на файлы
RUN chown -R www-data:www-data /var/www/html
RUN chmod -R 755 /var/www/html/storage /var/www/html/storage

EXPOSE 9000
# Запуск PHP-FPM
CMD ["php-fpm"]
