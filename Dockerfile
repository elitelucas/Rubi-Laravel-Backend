FROM composer:2.2 as build
COPY . /app/
RUN composer install --prefer-dist --no-dev --optimize-autoloader --no-interaction

FROM php:8.1-apache-bullseye as production

ENV APP_ENV=dev
ENV APP_DEBUG=true



RUN apt-get update && apt-get install -y libpq-dev \
    && pecl install redis \
    && docker-php-ext-install  pdo pdo_pgsql \
    && docker-php-ext-enable redis


COPY --from=build /app /var/www/html
COPY ./000-default.conf /etc/apache2/sites-available/000-default.conf
#COPY .env.prod /var/www/html/.env

RUN php artisan config:cache && \
    php artisan route:cache && \
    chmod 777 -R /var/www/html/storage/ && \
    chown -R www-data:www-data /var/www/ && \
    a2enmod rewrite
