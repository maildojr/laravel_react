FROM php:8.1.2-apache

COPY ./.docker/php.ini /usr/local/etc/php/php.ini
COPY ./.docker/cert_https/ /etc/apache2/ssl/
COPY ./.docker/000-default.conf /etc/apache2/sites-available/000-default.conf

RUN apt-get update && apt-get install -y libxml2-dev

RUN apt-get update && apt-get install -y \
    zlib1g-dev \
    libzip-dev \
    unzip

RUN docker-php-ext-install zip

RUN curl -sS https://getcomposer.org/installer | php
RUN mv composer.phar /usr/bin/composer

RUN docker-php-ext-install soap
RUN docker-php-ext-enable soap

RUN chmod 777 /tmp -R && chmod +t /tmp
RUN docker-php-ext-install pdo_mysql

WORKDIR /var/www/html

ENV APACHE_RUN_USER www-data
ENV APACHE_RUN_GROUP www-data
ENV APACHE_DOCUMENT_ROOT /var/www/html/public

RUN groupadd docker \
 && usermod -aG docker www-data

RUN chmod 777 /var/www/html -R \
     && chown www-data:www-data /var/www/html \
     && chmod 777 /var/log/apache2 -R

RUN chmod -R 777 .

RUN a2enmod rewrite
RUN a2enmod ssl

EXPOSE 80
EXPOSE 443
