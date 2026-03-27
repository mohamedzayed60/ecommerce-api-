FROM php:8.4-fpm

# Install MySQL extension
RUN docker-php-ext-install pdo pdo_mysql

# Install useful tools
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    curl

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www