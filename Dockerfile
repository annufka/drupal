FROM php:8.1-apache
RUN apt-get -o Acquire::Check-Valid-Until=false -o Acquire::Check-Date=false update \
  && apt-get install -y --no-install-recommends git zlib1g-dev libzip-dev zip unzip libpng-dev
RUN docker-php-ext-install pdo_mysql gd opcache

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN a2enmod rewrite

COPY vhost.conf /etc/apache2/sites-enabled/000-default.conf

RUN mkdir /home/www-data \
    && usermod  --uid 1000 -d /home/www-data www-data \
    && groupmod --gid 1000 www-data

USER www-data

EXPOSE 80