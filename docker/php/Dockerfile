FROM php:8.2-fpm-alpine

RUN apk add --no-cache \
    curl \
    git \
    unzip \
    libzip-dev \
    libpng-dev \
    libjpeg-turbo-dev \
    freetype-dev \
    oniguruma-dev \
    postgresql-dev \
    && docker-php-ext-install pdo_mysql zip exif pcntl

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN apk add --no-cache nodejs npm

WORKDIR /var/www/html
FROM php:8.2-fpm-alpine

# Установка зависимостей
RUN apk add --no-cache \
    curl \
    git \
    unzip \
    libzip-dev \
    libpng-dev \
    libjpeg-turbo-dev \
    freetype-dev \
    oniguruma-dev \
    postgresql-dev \
    && docker-php-ext-install pdo_mysql zip exif pcntl

# Установка Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Установка Node.js и npm
RUN apk add --no-cache nodejs npm

# Создание пользователя и группы для приложения
RUN addgroup -g 1000 appuser && \
    adduser -u 1000 -G appuser -s /bin/sh -D appuser

# Рабочая директория
WORKDIR /var/www/html

# Копирование зависимостей Composer
COPY --chown=appuser:appuser composer.json composer.lock ./

# Установка зависимостей Composer
RUN composer install --no-scripts --no-autoloader --no-dev --optimize-autoloader

# Копирование исходного кода
COPY --chown=appuser:appuser . .

# Генерация автозагрузки
RUN composer dump-autoload --optimize

# Установка прав на папки storage и bootstrap/cache
RUN mkdir -p storage/framework/{cache,sessions,views} && \
    chown -R appuser:appuser storage bootstrap/cache && \
    chmod -R 775 storage bootstrap/cache

# Переключение на пользователя appuser
USER appuser

# Команда для запуска PHP-FPM
CMD ["php-fpm"]
COPY composer.json composer.lock ./
RUN composer install --no-scripts --no-autoloader

COPY . .

RUN composer dump-autoload --optimize

RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache
