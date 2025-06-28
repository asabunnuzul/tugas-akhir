FROM php:8.3-apache

ENV COMPOSER_ALLOW_SUPERUSER=1
WORKDIR /var/www/html

# install depedensi
RUN apt-get update  -y && \
    apt-get install -y \
    libzip-dev\
    zip \
    libpq-dev \
    nodejs \
    npm \
    nano \
    libpng-dev \
    libicu-dev 
    
RUN a2enmod rewrite

RUN docker-php-ext-install mysqli pdo pdo_mysql pdo_pgsql zip gd intl

ENV APACHE_DOCUMENT_ROOT=/var/www/html/public

RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

RUN mv "$PHP_INI_DIR/php.ini-production" "$PHP_INI_DIR/php.ini" && \
    sed -i 's/upload_max_filesize = 2M/upload_max_filesize = 20M/g' /usr/local/etc/php/php.ini  && \
    sed -i 's/max_execution_time = 30/max_execution_time = 600/g' /usr/local/etc/php/php.ini  && \
    sed -i 's/memory_limit = 128M/memory_limit = 2048M/g' /usr/local/etc/php/php.ini  && \
    sed -i 's/post_max_size = 8M/post_max_size = 20M/g' /usr/local/etc/php/php.ini  && \
    sed -i 's/;zend_extension=opcache/zend_extension=opcache/g' /usr/local/etc/php/php.ini  && \
    sed -i 's/;opcache.memory_consumption=128/opcache.memory_consumption=512/g' /usr/local/etc/php/php.ini && \
    sed -i 's/;opcache.interned_strings_buffer=8/opcache.interned_strings_buffer=64/g' /usr/local/etc/php/php.ini  && \
    sed -i 's/;opcache.max_accelerated_files=10000/opcache.max_accelerated_files=20000/g' /usr/local/etc/php/php.ini

WORKDIR /var/www/html

COPY . .
# COPY .env.example .env
# manual from folder
COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer

# RUN composer install --optimize-autoloader --no-interaction --no-ansi && \
#     php artisan key:generate

RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache
RUN chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache
# RUN npm install
# RUN npm run build
