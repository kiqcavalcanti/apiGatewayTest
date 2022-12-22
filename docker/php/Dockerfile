FROM php:8.1-fpm-alpine

WORKDIR /var/www/html

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN apk add bash

RUN set -ex \
    && apk --no-cache add postgresql-dev \
    $PHPIZE_DEPS  \
    && pecl install xdebug-3.1.5 \
    && docker-php-ext-enable xdebug \
    && echo "xdebug.mode=debug,coverage" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
    && echo "xdebug.client_host=host.docker.internal" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini\
    && echo "xdebug.discover_client_host=0" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \


RUN docker-php-ext-install mysqli pdo pdo_mysql && docker-php-ext-enable pdo_mysql



