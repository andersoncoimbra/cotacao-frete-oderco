FROM php:7.4.14-apache

USER root

WORKDIR /var/www/html

RUN apt-get update && apt-get install -y \
        openssl \
        libssl-dev \
        libpng-dev \
        git \
        zlib1g-dev \
        libxml2-dev \
        libzip-dev \
        libonig-dev \
        zip \
        curl \
        libcurl3-dev \
        unzip \
        && docker-php-ext-configure gd \
        && docker-php-ext-install -j$(nproc) gd \
        && docker-php-ext-install pdo_mysql \
        && docker-php-ext-install mysqli \
        && docker-php-ext-install zip \
        && docker-php-ext-install gd \
        && docker-php-ext-install soap \
        && docker-php-ext-install intl \
        && docker-php-ext-install curl \
        && docker-php-ext-install calendar && docker-php-ext-configure calendar \
        && docker-php-source delete


COPY .docker/vhost.conf /etc/apache2/sites-available/000-default.conf

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN chown -R www-data:www-data /var/www/html \
    && a2enmod rewrite

COPY ./package*.json ./