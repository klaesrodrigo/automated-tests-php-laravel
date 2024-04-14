FROM php:8.2-fpm

# Instala dependências necessárias para o Composer
RUN apt-get update && apt-get install -y \
    git \
    unzip

# Instala o Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN apt-get update && apt-get install -y \
    git \
    unzip \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libonig-dev \
    libzip-dev \
    zip \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd pdo_mysql zip

WORKDIR /var/www/html

COPY . .

COPY .env .

RUN composer install

CMD php artisan serve --host=0.0.0.0 --port=8000