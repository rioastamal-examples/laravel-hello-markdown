FROM public.ecr.aws/docker/library/composer:2.3 as build
COPY laravel /app/
RUN composer install --no-dev --optimize-autoloader --no-interaction

FROM public.ecr.aws/docker/library/php:8.1-apache
RUN docker-php-ext-install bcmath && \
    a2enmod rewrite && \
    rm /etc/apache2/sites-enabled/*
    
COPY apache2/sites-enabled/*.conf /etc/apache2/sites-enabled/
COPY --from=build /app/ /var/www/html/
COPY .env.prod /var/www/html/.env

ENV APP_DEBUG=false
ENV APP_ENV=production

RUN php artisan config:cache && \
    php artisan route:cache && \
    php artisan view:cache && \
    chmod 0777 -R /var/www/html/storage
