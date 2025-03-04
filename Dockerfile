FROM php:8.3-fpm

RUN apt-get update && apt-get install -y \
    libpng-dev \
    libzstd-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    zip \
    unzip \
    git \
    curl \
    nano \
    libzip-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd zip pdo pdo_mysql opcache pcntl exif

RUN pecl install redis \
    && docker-php-ext-enable redis

COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer

COPY ./www.conf /etc/php/8.3/fpm/pool.d/www.conf

COPY php.ini /usr/local/etc/php/conf.d/php.ini


WORKDIR /var/www

COPY . .

RUN composer install --no-interaction --prefer-dist --optimize-autoloader

RUN chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache \
    && chmod -R 775 /var/www/storage /var/www/bootstrap/cache

EXPOSE 9000

COPY start-app.sh /start-app.sh
RUN chmod +x /start-app.sh

CMD ["/start-app.sh"]
