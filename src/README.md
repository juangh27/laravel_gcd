# Laravel Docker
 - Important check .env file on the src folder
## Commands

```bash
docker exec -it php-showcase /bin/bash
composer update
composer install
```

### Copy your env mysql data to the env from laravel

```bash
php artisan key:generate
php artisan migrate
```

### Optional

```bash
php artisan optimize
```

### Runing laravel server

```bash
php artisan serve
```

you can check that Laravel is running correctly [here](http://localhost:8080/).

### Extra commands

```bash
php artisan make:controller QuoteController

#if the routes arent updating or working correctly use this commands

php artisan route:clear
php artisan config:clear



composer require filament/filament:"^3.2" -W
 
php artisan filament:install --panels

```

  
chown -R www-data:www-data /var/www/laravel_docker/storage/framework
