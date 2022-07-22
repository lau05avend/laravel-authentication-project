# Aplicación Laravel con autenticación Sanctum

## Installation

Por favor consulta la guía de instalación oficial de laravel para conocer los requisitos del servidor antes de comenzar. [Official Documentation](https://laravel.com/docs/5.4/installation#installation)


## Paso 1 - Clonar el repositorio

    git clone https://github.com/lau05avend/laravel-authentication-project.git


## Paso 2 - Cambiar a la carpeta del repositorio

    cd laravel-authentication-project

## Paso 3 - Instalar todas las dependencias usando composer

    composer install

## Paso 4 - Copiar el archivo `.env.example` a `.env` en la carpeta raiz.

    cp .env.example .env

## Abrir el archivo `.env` y realizar los cambios de configuración necesarios.

## Paso 5 - Generar una nueva clave de aplicación

    php artisan key:generate

## Paso 6 - Migración base de datos
Ejecutar las migraciones de la base de datos ( configurar la conexión de la base de datos en el archivo `.env` antes de migrar )

    php artisan migrate

## Paso 7 - Iniciar el servidor de desarrollo local

    php artisan serve

Ahora puedes acceder al servidor en http://localhost:8000

