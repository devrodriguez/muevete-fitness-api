# Artisan

## Create model with migration
php artisan make:model [Model] --migration

## Correr servidor
php -S localhost:8000 -t public

## Install vendor packages
composer install

## Make controller
php artisan make:controller CustomerController --resource

## Make pivot table
php artisan make:migration schedule_calendar_table --table=schedule_calendar

## Migrate just one table
php artisan migrate --path=/database/migrations/2019_07_13_042138_create_available_day_table.php

## Criterios de aceptacion
- Un usuario no puede agendar una clase que tenga 23 agendados
- No hay tiempo maximo para cancelar
- No puede reservar si es un minuto despues del inicio de la clase

# MYSQL
- Se deben activar los eventos ya que no estan activos por defecto: SET GLOBAL event_scheduler = ON;

# Laravel
Implementar paquete sin composer:
En vendor actualizar archivos:
- /composer/autoload_static.php
...



