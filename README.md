## About

Simple app to demonstrate how to run Laravel app using container. The app will read markdown data from MySQL and display the rendered result.

## Requirements

You need following softwares to run this app on your machine.

- Docker v19 or v20

## Download or Clone the App

You can either download the archive or clone the app from [GitHub repository](https://github.com/rioastamal-examples/laravel-hello-markdown).

```sh
git clone https://github.com/rioastamal-examples/laravel-hello-markdown.git
```

Then you can enter to the directory to install all dependencies.

```sh
cd laravel-hello-markdown/laravel
```

Use Composer via Docker.

```sh
docker run --rm -it -v $(pwd):/app \
  public.ecr.aws/docker/library/composer:2.4 \
  composer install --no-dev
```

## Build Docker Image for Local Development

You need to build image from `Dockerfile.local` since it will contains PHP extensions that needed to run Laravel app. Make sure to go back to `laravel-hello-markdown/` directory.

```sh
cd ../
```

```sh
docker build -t php-mysql-ext:8.1-apache -f Dockerfile.local .
```

Check the image that has been created.

```sh
docker images
```

```
REPOSITORY                               TAG          IMAGE ID       CREATED        SIZE
php-mysql-ext                            8.1-apache   6039dbf8b82e   14 hours ago   459MB
public.ecr.aws/docker/library/composer   2.4          7c7139e3be94   6 days ago     200MB
public.ecr.aws/docker/library/php        8.1-apache   a35da485f274   5 weeks ago    458MB
```

## Build Docker Image for Production

We will package entire files on the project to the container image. We will build the image using file `Dockerfile.`

As an example we will tag this container image as version `1.0`.

```sh
docker build -t laravel-markdown:1.0 .
```

Then you can push `laravel-markdown:1.0` to the registry and start using it on your production deployment.

## Create configuration

Copy sample configuration to `.env.local` and also for `.env.prod`

```sh
cd laravel/
cp .env.example .env.local
cp .env.example .env.prod
```

Generate Laravel application key.

```sh
docker run --rm -it -v $(pwd):/var/www/html \
  php-mysql-ext:8.1-apache \
  php artisan --env=local key:generate 
```

Edit all the required configuration such as MySQL hostname, user and password.

## How to Run

Run migration first.

```sh
docker run --rm -it \
  -v $(pwd):/var/www/html php-mysql-ext:8.1-apache \
  php artisan migrate:refresh --seed
```

To run locally we can use `artisan serve`.

```sh
docker run --rm -it -p 8080:8000 \
  -v $(pwd):/var/www/html php-mysql-ext:8.1-apache \
  php artisan server --host=0.0.0.0
```

Now open your browser and go to `http://localhost:8080`. You should see list of articles written in Markdown.

## Author

This project is written by Rio Astamal.

## License

This project is licensed under MIT. See LICENSE.md for details.