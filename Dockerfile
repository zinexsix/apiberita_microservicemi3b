FROM php:8.2-apache

#install mysqliextension
RUN docker-php-ext-install mysqli pdo_mysql

#activation mode rewrite untuk apache
RUN a2enmod rewrite 

#mnegatur direktori kerja di dqlam container
WORKDIR /var/www/html