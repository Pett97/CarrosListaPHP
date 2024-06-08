FROM php:8.3.4-fpm

COPY wait-for-db.sh /usr/local/bin/wait-for-db.sh
RUN chmod +x /usr/local/bin/wait-for-db.sh

RUN docker-php-ext-install pdo pdo_mysql
RUN docker-php-ext-enable pdo_mysql