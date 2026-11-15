
FROM php:8.3.6-fpm-bookworm

RUN apt-get update && apt-get install -y --no-install-recommends \
    git unzip curl \
    libfreetype6-dev libjpeg62-turbo-dev \
    libpng-dev libicu-dev libzip-dev \
    libxml2-dev libxslt1-dev libonig-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) \
       bcmath ftp gd intl mbstring mysqli pdo_mysql \
       soap sockets xsl zip opcache \
    && pecl install redis-6.2.0 \
    && docker-php-ext-enable redis \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*

COPY --from=composer:2.11.1 \
    /usr/bin/composer /usr/local/bin/composer

RUN { \
    echo "memory_limit=2G"; \
    echo "max_execution_time=1800"; \
    echo "realpath_cache_size=10M"; \
    echo "realpath_cache_ttl=7200"; \
    echo "opcache.enable=1"; \
    } > /usr/local/etc/php/conf.d/magento.ini

WORKDIR /var/www/html
