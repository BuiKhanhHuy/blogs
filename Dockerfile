FROM php:8.3.7-fpm

RUN apt-get update && apt install -y build-essential \
    vim

# PHP and related
RUN apt-get update && apt-get install -y --no-install-recommends \
        locales \
        apt-utils \
        libicu-dev \
        libpng-dev \
        libxml2-dev \
        libzip-dev \
        libonig-dev \
        libxslt-dev \
        unzip \
        libfreetype6-dev \
        libjpeg62-turbo-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-configure intl \
    && docker-php-ext-install \
        pdo \
        pdo_mysql \
        opcache \
        intl \
        zip \
        calendar \
        dom \
        mbstring \
        gd \
        xsl \
    && pecl install apcu \
    && docker-php-ext-enable apcu

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Set the working directory in the container
WORKDIR /var/www/html

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Copy existing application directory contents
COPY . /var/www/html

# Grant rw access for www-data
RUN chown -R www-data:www-data logs/ tmp/
RUN chmod -R 775 logs/ tmp/

EXPOSE 9000

CMD ["php-fpm"]
