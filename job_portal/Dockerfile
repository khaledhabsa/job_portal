FROM php:8.1.2
# Install dependencies
RUN apt-get update && apt-get install -y \
    build-essential \
    libpng-dev \
    libzip-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    libmcrypt-dev \
    locales \
    zip \
    jpegoptim optipng pngquant gifsicle \
    vim \
    unzip \
    git \
    curl
RUN apt-get update -y && apt-get install -y openssl zip unzip git
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer 
RUN docker-php-ext-install pdo_mysql zip exif pcntl
RUN docker-php-ext-configure  gd --with-freetype --with-jpeg
RUN docker-php-ext-install gd
WORKDIR /app
COPY . /app
RUN composer update

CMD ["/bin/bash", "./entrypoint.sh"]

EXPOSE 80
