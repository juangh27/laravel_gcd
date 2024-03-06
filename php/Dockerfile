# Use an official PHP Apache image
FROM php:8.3-apache

# Update package lists and install dependencies
RUN apt-get update \
    && apt-get install -y \
    git \
    g++ \
    libicu-dev \
    libzip-dev \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    zlib1g-dev \
    libpq-dev \
    unzip \
    && rm -rf /var/lib/apt/lists/*

# Install PHP extensions


RUN docker-php-ext-install \
    intl \
    opcache \
    pdo \
    pdo_mysql

ADD --chmod=0755 https://github.com/mlocati/docker-php-extension-installer/releases/latest/download/install-php-extensions /usr/local/bin/

RUN install-php-extensions gd zip

# Set the working directory
WORKDIR /var/www/laravel_docker

# Install Composer globally
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Set the correct permissions for the working directory
RUN chown -R www-data:www-data /var/www/laravel_docker
RUN chown -R www-data:www-data /var/www/laravel_docker/storage

# Apache configuration: enable mod_rewrite
RUN a2enmod rewrite

# Restart Apache to apply changes
RUN service apache2 restart
