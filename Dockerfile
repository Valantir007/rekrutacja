FROM php:7.4-fpm-alpine

WORKDIR /var/www/html

COPY ./docker/php-intl.ini /usr/local/etc/php/conf.d/docker-php-ext-intl.ini

RUN apk update \
    && apk upgrade \
    && apk add --no-cache \
    $MUSL_LOCALE_DEPS \
    icu-dev \
    tzdata \
    && docker-php-ext-configure intl \
    && docker-php-ext-install intl \
    && apk del icu-data-en \
    && apk add icu-data-full \
    && apk del --no-cache \
    && rm -rf /tmp/*

COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer

ADD . .

RUN composer install