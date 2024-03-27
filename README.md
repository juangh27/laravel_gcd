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

chown -R www-data:www-data /var/www/laravel_docker/storage/logs

chown -R www-data:www-data /var/www/laravel_docker/storage/

chown -R gcc:gcc /home/gcc/laravel/laravel_gcd/src

```


# Español

- Importante: Revisar el archivo .env en la carpeta src

## Comandos

### Primero debes acceder al sh del contenedor con este comando
```bash
docker exec -it php-showcase /bin/bash
```
### Una vez en sh puedes correr los comandos php artisan o composer 
```bash
composer update
```
```bash
composer install
```
### Genera la base de datos

```bash
php artisan key:generate
php artisan migrate
```

### Opcional

```bash
php artisan optimize
```
### Ejecutando el servidor de Laravel

```bash
php artisan serve
```

Puedes verificar que Laravel está funcionando correctamente en http://localhost:8080/.

### Comandos extra

```bash
php artisan make:controller QuoteController
```
### Si las rutas no se actualizan o funcionan correctamente, usa estos comandos
```bash
php artisan route:clear
php artisan config:clear
```

```bash
composer require filament/filament:"^3.2" -W
```
## Creacion de un nuevo panel en *Fillament*
```bash
php artisan filament:install --panels
```
## En caso de no poder guardar los cambios a archivos o laravel no se muestra por falta de permisos usar estos comandos como guía
```bash
chown -R www-data:www-data /var/www/laravel_docker/storage/logs

chown -R www-data:www-data /var/www/laravel_docker/storage/

chown -R gcc:gcc /home/gcc/laravel/laravel_gcd/src
```