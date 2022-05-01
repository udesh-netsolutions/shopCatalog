# FROM php
# RUN apt-get update -y && apt-get install -y libmariadb-dev
# RUN docker-php-ext-install pdo pdo_mysql mysqli
# RUN a2enmod rewrite
# RUN PHP -R "copy('https://getcomposer.org/installer', 'composer-setup.php');"
# RUN php composer-setup.php --install-dir=. --filename=composer
# RUN mv composer /usr/local/bin/
# COPY ./ /var/www/html
# EXPOSE 80

FROM php:8.1-apache
COPY . /var/www/html/
RUN docker-php-ext-install mysqli
