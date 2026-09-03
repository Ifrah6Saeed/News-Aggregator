FROM php:8.2-cli

RUN apt-get update && apt-get install -y \
    git unzip libpq-dev libzip-dev zip sqlite3 libsqlite3-dev \
    && docker-php-ext-install pdo pdo_mysql pdo_pgsql pdo_sqlite zip

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /app
COPY . .

RUN composer install --no-dev --optimize-autoloader

RUN mkdir -p database && touch database/database.sqlite \
    && chmod -R 775 database

EXPOSE 10000

CMD php artisan config:cache && php artisan migrate --force && php artisan serve --host 0.0.0.0 --port 10000