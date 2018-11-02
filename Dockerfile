# Dockerfile
FROM php:7.2-apache

MAINTAINER WEBPICH <info@webpich.com>

COPY ./index.php /var/www/html/
#
#EXPOSE 80
#EXPOSE 443
#
#CMD ["/usr/sbin/apache2ctl", "-D", "FOREGROUND"]
