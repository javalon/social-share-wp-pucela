FROM wordpress:latest

RUN apt-get update && apt-get install -y \
        libmcrypt-dev \
        php5-mysql
RUN docker-php-ext-install mcrypt

RUN touch /var/log/apache2/php_err.log && chown www-data:www-data /var/log/apache2/php_err.log
COPY php_error.ini /usr/local/etc/php/conf.d/php_error.ini
COPY php.ini /usr/local/etc/php/conf.d/php.ini
