FROM php:7.2.7-fpm-alpine3.7
RUN apk update; \
    apk upgrade;
COPY custom.php.ini /usr/local/etc/php/conf.d
RUN docker-php-ext-install mysqli pdo_mysql