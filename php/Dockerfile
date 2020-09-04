FROM php:7.3-apache 

RUN docker-php-ext-install mysqli
RUN docker-php-ext-enable mysqli

ENV TZ=Europe/Moscow
RUN ln -snf /usr/share/zoneinfo/$TZ /etc/localtime && echo $TZ > /etc/timezone
RUN echo "date.timezone=$TZ" >> /usr/local/etc/php/conf.d/default.ini

RUN apt-get update -y

RUN a2enmod rewrite

RUN a2enmod headers

RUN a2enmod expires

RUN apt-get install -y git

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN apt-get install -y mc vim nano

RUN apt-get install -y mariadb-client

RUN apt-get install -y imagemagick

RUN apt-get install -y libjpeg-dev libpng-dev
RUN docker-php-ext-configure gd --with-jpeg-dir=/usr/include/
RUN docker-php-ext-install gd

RUN apt-get install -y zlib1g-dev libicu-dev g++
RUN apt-get install -y libcurl4-openssl-dev
RUN docker-php-ext-install curl

RUN docker-php-ext-configure intl
RUN docker-php-ext-install intl

RUN apt-get install -y libxslt-dev
RUN docker-php-ext-install xsl

RUN apt-get install -y libexif-dev
RUN docker-php-ext-install exif

RUN apt-get install -y libpq-dev libsqlite3-dev
RUN docker-php-ext-install pdo pdo_mysql pdo_sqlite

RUN docker-php-ext-install opcache

RUN apt-get install -y zlib1g-dev

RUN apt-get update && apt-get install -y libmcrypt-dev

RUN rm -rf /var/lib/apt/lists/* /tmp/*

