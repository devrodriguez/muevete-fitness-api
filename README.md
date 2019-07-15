# muevete-fitness-api

## Create model with migration
php artisan make:model [Model] --migration

## Correr servidor
php -S localhost:8000 -t public

## Install vendor packages
composer install

## Make controller
php artisan make:controller CustomerController --resource

## Make pivot table
php artisan make:migration schedule_session_table --table=schedule_session