FROM php:7.4-fpm-alpine

RUN docker-php-ext-install pdo_mysql xml

RUN pecl install xdebug && docker-php-ext-enable xdebug
