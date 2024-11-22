# Use an official PHP 7.4 image as the base
FROM php:7.4-fpm

# Install system dependencies and PHP extensions
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    libzip-dev \
    zlib1g-dev \
    git \
    unzip \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd pdo pdo_mysql zip \
    && apt-get clean

# Install Composer globally
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Set the working directory
WORKDIR /var/www


# Copy the existing Laravel application into the container
COPY . /var/www

RUN chown -R www-data:www-data /var/www

# Copy the entrypoint script into the container
COPY docker-entrypoint.sh /usr/local/bin/

# Make the entrypoint script executable
RUN chmod +x /usr/local/bin/docker-entrypoint.sh


# Install Laravel dependencies with Composer
RUN composer install --no-interaction --prefer-dist

# Expose port 9000
EXPOSE 9000

# Set the entrypoint script
ENTRYPOINT ["docker-entrypoint.sh"]
