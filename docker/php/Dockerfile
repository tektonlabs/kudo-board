FROM composer:1.5.1 AS composer

FROM php:7.2-fpm-alpine

RUN apk add --no-cache libzip-dev

# Install Additional dependencies
RUN apk update && apk add --no-cache \
    build-base shadow vim curl \
    php7 \
    php7-fpm \
    php7-common \
    php7-pdo \
    php7-pdo_mysql \
    php7-mysqli \
    php7-mcrypt \
    php7-mbstring \
    php7-xml \
    php7-openssl \
    php7-json \
    php7-phar \
    php7-zip \
    php7-gd \
    php7-dom \
    php7-session \
    php7-zlib

# Add and Enable PHP-PDO Extenstions
RUN docker-php-ext-install pdo pdo_mysql
RUN docker-php-ext-enable pdo_mysql

ENV COMPOSER_ALLOW_SUPERUSER 1

COPY --from=composer /usr/bin/composer /usr/bin/composer
RUN rm -rf /var/cache/apk/*

RUN usermod -u 1000 www-data

COPY --chown=www-data:www-data . /var/www/html

USER www-data

EXPOSE 9000
CMD ["php-fpm"]
