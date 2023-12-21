FROM php:8.2-apache

# Install dependencies
RUN apt-get update && \
    apt-get install -y \
        libzip-dev \
        unzip

# Install Composer globally
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Enable necessary PHP extensions
RUN docker-php-ext-install pdo_mysql zip

RUN a2enmod rewrite

# Set working directory
WORKDIR /var/www/html

# Copy application files
COPY . /var/www/html

# Expose port 80
EXPOSE 80
