# Laravel Docker - Español

> [!IMPORTANT]
> Revisar el archivo .env en la carpeta src, usar .env.example y solo cambiar los valores, no guardar contraseñas ni informacion importante en producción

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

Para checar el cron se utiliza el comando `service cron status` en caso de no estar funcionando usar el comando `service cron start`

### Configuracion de cron

Para poder activar las tareas programas es necesario tener el cron activado,asi mismo si se quiere usar directamente cron para llamar las tareas en vez de *Kernel.php* se puede hacer sin problema alguno, para configurarlo se usa el comando `crontab -e` donde aparece algo como esto: 

```bash
# Edit this file to introduce tasks to be run by cron.
# 
# Each task to run has to be defined through a single line
# indicating with different fields when the task will be run
# and what command to run for the task
# 
# To define the time you can provide concrete values for
# minute (m), hour (h), day of month (dom), month (mon),
# and day of week (dow) or use '*' in these fields (for 'any').
# 
# Notice that tasks will be started based on the cron's system
# daemon's notion of time and timezones.
# 
# Output of the crontab jobs (including errors) is sent through
# email to the user the crontab file belongs to (unless redirected).
# 
# For example, you can run a backup of all your user accounts
# at 5 a.m every week with:
# 0 5 * * 1 tar -zcf /var/backups/home.tgz /home/
# 
# For more information see the manual pages of crontab(5) and cron(8)
# 
# m h  dom mon dow   command

#
* * * *  */usr/local/bin/php /var/www/laravel_docker artisan schedule:run >> /var/log/inventory.log 2>&1
```

En el cual se puede borrar las lineas comentadas sin problema 

Teniendo solo esta funcion programada podemos hacer uso de los *schedules* (tareas) generadas en `src/app/Console/Kernel.php`

Se puede revisar los logs del cron entrnado al contenedor y usar el comando:

```bash
nano /var/log/inventory.log
```
## Woocmerce API

Para utilizar la API de woocomerce se instalo el paquete `codexshaper/laravel-woocommerce` el cual facilita las llamadas a todas las funciones de la API y no es necesario llamar las credenciales en cada controllador o funcion de donde se use, [aqui](https://codexshaper.github.io/docs/laravel-woocommerce/) se puede revisar la documentación de las funciones


## Webhooks - Woocomerce

El webhoook que se tiene configurado se dispara al momento que se hace un pedido, esta esta manejada por `spatie/laravel-webhook-client` y su documentacion se puede revisar en este [link](https://github.com/spatie/laravel-webhook-client)

y aqui es donde se configuran y generan las funciones que se realizan con el webhook `src/app/Jobs/ProcessWebhookJob.php`


# Laravel Docker - English
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