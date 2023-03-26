FROM php:8.0-apache

RUN apt-get update \
    && apt-get install -y \
		wget zip unzip \
        libzip-dev \
        libfreetype6-dev \
        libjpeg62-turbo-dev \
        libpng-dev \
        sqlite3 libsqlite3-dev \
        libssl-dev \
    && docker-php-ext-install -j$(nproc) iconv gd pdo zip opcache pdo_sqlite \
    && a2enmod rewrite expires

RUN addgroup --gid 1000 --system  www
RUN adduser --uid 1000  --gid 1000 --system  --disabled-password www



RUN chown -R www-data:www-data /var/www/html
RUN find /var/www/html -type d -exec chmod 775 {} +
RUN find /var/www/html -type f -exec chmod 664 {} +

USER www

VOLUME /var/www/html

EXPOSE 8080

CMD ["apache2-foreground"]
