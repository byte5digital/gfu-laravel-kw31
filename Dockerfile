FROM composer:latest as vendor

COPY database/ database/
COPY packages/ packages/

COPY composer.json composer.json
COPY composer.lock composer.lock

RUN composer install \
    --ignore-platform-reqs \
    --no-interaction \
    --no-plugins \
    --no-scripts \
    --prefer-dist

FROM php:8.2-fpm-alpine as gfu-base
COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer
RUN apk --no-cache add pcre-dev ${PHPIZE_DEPS}
RUN apk update && apk add zip libzip-dev openldap-dev libxml2-dev git jpegoptim optipng pngquant gifsicle
RUN docker-php-ext-install pcntl pdo_mysql zip exif bcmath

RUN apk add --no-cache imagemagick imagemagick-dev
RUN pecl install -o -f imagick\
    &&  docker-php-ext-enable imagick

ARG IMAGICK_VERSION=7
# Install the Imagick PHP extension; If somehow you got version 6 installed, please change ARG
RUN if [ ${IMAGICK_VERSION} = 7 ]; then \
    sed -i '/<policymap>/a <policy domain="coder" rights="read | write" pattern="PDF" />' /etc/ImageMagick-7/policy.xml \
;fi
RUN if [ ${IMAGICK_VERSION} = 6 ]; then \
    sed -i '/disable ghostscript format types/,+6d' /etc/ImageMagick-6/policy.xml \
    && sed -i '/<policymap>/a <policy domain="coder" rights="read | write" pattern="PDF" />' /etc/ImageMagick-6/policy.xml \
;fi

RUN apk update && apk add freetype libpng libjpeg-turbo freetype-dev libpng-dev libjpeg-turbo-dev && \
    docker-php-ext-configure gd --with-jpeg \
    && docker-php-ext-install gd
RUN pecl install redis
RUN docker-php-ext-enable redis

FROM gfu-base as noweb
COPY . /var/www/html
COPY --from=vendor /app/vendor/ /var/www/html/vendor/
COPY ./docker-config/php.ini /usr/local/etc/php/php.ini
WORKDIR /var/www/html
RUN cp .env.docker .env
RUN chmod 775 storage/ -R
RUN chmod 775 bootstrap/ -R
RUN git config --global --add safe.directory /var/www/html
RUN composer install
RUN php artisan key:generate

FROM noweb as debug
RUN apk add --update linux-headers
RUN pecl install xdebug
RUN docker-php-ext-enable xdebug
COPY ./docker-config/php-debug.ini /usr/local/etc/php/php.ini

FROM nginx:1-alpine as web-nginx
COPY ./docker-config/nginx.conf /etc/nginx/conf.d/default.conf
COPY --from=vendor /app/vendor/ /var/www/htmvendor/
COPY . /var/www/html
