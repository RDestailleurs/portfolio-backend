# Use a base image with PHP and Apache
FROM php:8.2-apache

# Install the necessary dependencies for Symfony
RUN apt-get update && apt-get install -y \
    libicu-dev \
    libpq-dev \
    libzip-dev \
    zlib1g-dev \
    unzip \
    wget \
    curl

# Install the necessary PHP extensions for Symfony
RUN docker-php-ext-install intl
RUN docker-php-ext-install pdo_mysql
RUN docker-php-ext-install zip

# Enable the Apache mod_rewrite module
RUN a2enmod rewrite

# Copy the application files into the container
#COPY . /var/www/html
#COPY .env.local /var/www/html/.env.local

# Set the working directory
WORKDIR /var/www/html

# Install the Symfony project dependencies
RUN wget https://getcomposer.org/download/latest-2.2.x/composer.phar -O /usr/local/bin/composer && chmod +x /usr/local/bin/composer
#RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
#RUN composer install --no-scripts --no-autoloader

# Change docroot
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf \
 && sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

# Symfony CLI
#RUN wget https://get.symfony.com/cli/installer -O - | bash
#RUN mv /root/.symfony5/bin/symfony /usr/local/bin/symfony

# Install Symfony Runtime
#RUN export COMPOSER_ALLOW_SUPERUSER=1 \
#    && composer require symfony/runtime


# Generate autoloading files and assets
#RUN composer dump-autoload --optimize
#RUN php bin/console assets:install --symlink


#CMD symfony server:stop && symfony server:start --no-tls