# Dockerfile
#
# SEE: https://github.com/docker-library/php/blob/67efd89c36bf15cb5ba096213e0536b2cab5eb38/7.2/stretch/apache/Dockerfile
#
FROM php:7.2-apache

MAINTAINER WEBPICH <info@webpich.com>
###########################################################
# Build process
###########################################################
RUN apt-get update
		

RUN docker-php-source extract

RUN docker-php-ext-install ctype
#RUN docker-php-ext-install openssl
RUN docker-php-ext-enable ctype

# JSON (is loaded)
RUN docker-php-ext-install json
RUN docker-php-ext-install mbstring
RUN docker-php-ext-enable json mbstring

# DB MySQL
RUN docker-php-ext-install mysqli
#RUN docker-php-ext-install mysqlnd
#RUN docker-php-ext-install sqlite3 
RUN docker-php-ext-enable mysqli

#RUN docker-php-ext-install libxml
#RUN docker-php-ext-install xml 
#RUN docker-php-ext-install xmlreader 
#RUN docker-php-ext-install xmlwriter 
#RUN docker-php-ext-install SimpleXML 

# Support ZIP
RUN apt-get install --no-install-recommends -y zlib1g-dev zip unzip
RUN docker-php-ext-install zip 
#RUN docker-php-ext-install zlib 
RUN docker-php-ext-enable zip

# Support CURL
#RUN apt-get install --no-install-recommends -y curl
#RUN docker-php-ext-install curl

#RUN docker-php-ext-install bz2
#RUN docker-php-ext-install date
#RUN docker-php-ext-install dom
#RUN docker-php-ext-install filter 
#RUN docker-php-ext-install gettext
#RUN docker-php-ext-install hash
#RUN docker-php-ext-install iconv
#RUN docker-php-ext-install pcntl
#RUN docker-php-ext-install pcre

# Graphics
#RUN docker-php-ext-install gd 
#RUN docker-php-ext-enable gd

# PDO
#RUN docker-php-ext-install PDO 
#RUN docker-php-ext-install pdo_mysql 
#RUN docker-php-ext-install pdo_sqlite 

#RUN docker-php-ext-install Phar 
#RUN docker-php-ext-install Reflection 
#RUN docker-php-ext-install session 
#RUN docker-php-ext-install SPL 
#RUN docker-php-ext-install standard 
#RUN docker-php-ext-install tokenizer 


WORKDIR /var/www/
# Add composer
RUN apt-get install --no-install-recommends -y git
RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
RUN php -r "if (hash_file('sha384', 'composer-setup.php') === '93b54496392c062774670ac18b134c3b3a95e5a5e5c8f1a9f115f203b75bf9a129d5daa8ba6a13e2cc8a1da0806388a8') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
RUN php composer-setup.php
RUN php -r "unlink('composer-setup.php');"

ENV COMPOSER_ALLOW_SUPERUSER 1
COPY composer.json /var/www/
RUN php composer.phar install --no-plugins --no-scripts
ENV COMPOSER_ALLOW_SUPERUSER 0
WORKDIR /var/www/html

# files
COPY bin/ /var/www/
COPY html/ /var/www/html/

# Remove unused
RUN rm -rf /var/lib/apt/lists/\*
RUN docker-php-source delete