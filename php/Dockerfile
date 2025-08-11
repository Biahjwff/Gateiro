FROM php:8.2-fpm

RUN apt update && apt upgrade -y 

RUN apt install -y unzip libssl-dev pkg-config curl git 

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/bin --filename=composer

RUN pecl install mongodb && docker-php-ext-enable mongodb

WORKDIR /var/www/gateiro

RUN docker-php-ext-install pdo pdo_mysql

RUN docker-php-ext-enable mongodb