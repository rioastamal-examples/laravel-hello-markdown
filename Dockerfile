FROM public.ecr.aws/docker/library/php:8.0-apache
RUN docker-php-ext-install bcmath && \
    a2enmod rewrite
