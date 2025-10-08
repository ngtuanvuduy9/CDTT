# Sử dụng image PHP 8.2 với Apache
FROM php:8.2-apache

# Cài đặt các extension cần cho Laravel
RUN docker-php-ext-install pdo pdo_mysql mysqli

# Cài Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Sao chép mã nguồn vào container
WORKDIR /var/www/html
COPY . .

# Cấp quyền cho storage và bootstrap/cache
RUN chmod -R 777 storage bootstrap/cache

# Cài đặt dependency
RUN composer install --no-dev --optimize-autoloader

# Mở port 10000
EXPOSE 10000

# Chạy server Laravel
CMD php artisan serve --host=0.0.0.0 --port=10000
