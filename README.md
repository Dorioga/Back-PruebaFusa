<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

# Proyecto Prueba Back-End Api

## Requerimientos

-PHP 7.4 o superior
-Composer
-Postgresql

## Instalación

1.  Clonar este repositorio 'git clone https://github.com/Dorioga/Back-PruebaFusa.git'
2.  'cd' en la carpeta del proyecto e instalar las dependencias con Composer: 'composer install'
3.  Configurar los datos para la base de datos en el archivo '.env'

    ```php
    DB_CONNECTION=pgsql
    DB_HOST=127.0.0.1 //localhost
    DB_PORT=5432
    DB_DATABASE=BD_Fusa //Nombre de base de datos que quiera crear la estructura del proyecto
    DB_USERNAME=postgres //Usuario para ingresar a la base de datos
    DB_PASSWORD=root //Contraseña para ingresar a la base de datos

    ```

4.  Hacer las migraciones para la creacion de las tablas en la base de datos anteriormente configurada

    ```php

    php artisan migrate //Migrar las tablas por defecto crea el proyecto
    php artisan migrate --path=/database/migrations/Cargar.php //Migrar las tablas que se crea para guardar los datos segun los requerimientos.

    ```

5.  Por ultimo ejecutar el servidor de Laravel

    ```php
    php artisan serve

Nota: Asegúrese de tener todos los requerimientos instalados y configurados correctamente antes de intentar instalar y ejecutar el proyecto.

