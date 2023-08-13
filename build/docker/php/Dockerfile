FROM php:8.2-fpm

RUN apt-get update && apt-get -y install zip git libpq-dev libicu-dev libzip-dev \
    && docker-php-ext-configure zip \
    && docker-php-ext-install zip opcache pgsql pdo_pgsql \
    && pecl install apcu \
    && docker-php-ext-enable apcu \
    && pecl install xdebug \
    && docker-php-ext-enable xdebug \
    && echo "xdebug.mode=debug" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
    && echo "xdebug.client_host = 172.17.0.1" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini

ADD php.ini /usr/local/etc/php/

RUN curl --silent --show-error https://getcomposer.org/installer | php && mv composer.phar /usr/local/bin/composer

WORKDIR /var/www/mvc-framework/