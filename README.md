# Práctica de Desarrollo con Laravel

Este archivo detalla los comandos utilizados durante el desarrollo de la práctica con el framework Laravel.

## Comandos Utilizados

### 1. Crear un Nuevo Proyecto Laravel

composer create-project --prefer-dist laravel/laravel practicaApi

### 2. Crear una Migración

php artisan make:migration nombre_de_la_migracion

### 3. Ejecutar Migraciones

php artisan migrate

### 4. Crear un Modelo

php artisan make:model Alumno

### 5. Crear un Controlador

php artisan make:controller AlumnoController

### 6. Crear middleware

php artisan make:controller validateIdMiddleware

### 7. Crear rutas en api.php

routes/api.php

### 8.Crear el Factory

php artisan make:factory AlumnoFactory

### 9. Crear seeders

php artisan make:seeder AlumnoSeeder

### 10. ejecutar seeder 

php artisan db:seed

### 11.Serve

php artisan serve