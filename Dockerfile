# FROM ubuntu:latest
# RUN apt-get -y update
# RUN apt-get -y install nmap apache2
# COPY ./index.php /var/www/html
# EXPOSE 80
# CMD apache2ctl -D FOREGROUND

FROM php:7.2-apache
COPY index.php /var/www/html
EXPOSE 80
