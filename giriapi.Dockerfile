FROM php:8.1-fpm

ARG user
ARG uid

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    sudo \
    nmap

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Install PHP extensions
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

# Get latest Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

RUN useradd -G www-data,root -u $uid -d /home/$user $user
RUN mkdir -p /home/$user/.composer && \
    chown -R $user:$user /home/$user

COPY ./api /var/www

COPY ./container-scripts/giriapi-post-build.sh /tmp

RUN chown -R $user:$user /var/www && \
    chown  $user:$user /tmp/giriapi-post-build.sh && \
    chmod 700 /tmp/giriapi-post-build.sh


WORKDIR /var/www

USER $user

RUN composer install && \
    composer update && \
    php artisan config:clear && \
    php artisan cache:clear && \
    php artisan key:generate

CMD /tmp/giriapi-post-build.sh && docker-php-entrypoint php-fpm
