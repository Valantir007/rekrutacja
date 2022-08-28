FROM php:7.4-fpm-alpine

WORKDIR /var/www/html

RUN apk add --update tzdata
ENV TZ=Europe/Warsaw
#ENV LANG=pl_PL \
#    LANGUAGE=pl_PL

# Setup GD extension
RUN apk update
RUN apk upgrade

COPY ./docker/php-intl.ini /usr/local/etc/php/conf.d/docker-php-ext-intl.ini

RUN apk add --no-cache \
      icu-dev \
    && docker-php-ext-configure intl \
    && docker-php-ext-install intl \
    && apk del --no-cache \
    && rm -rf /tmp/*

#COPY ./docker/php.ini /etc/php.ini
#COPY ./docker/php.ini /usr/local/etc/php/php.ini-production

COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer

ADD . .

RUN composer install