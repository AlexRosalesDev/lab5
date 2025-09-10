<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Laboratorio 5 - Operaciones CRUD con JSON y APIs
Universidad:
Universidad Adventista de Bolivia
Materia:
Taller de Programación
Nombre del estudiante:
Alex Rosales Quispe

## Nombre del proyecto:
Lab5 - Operaciones CRUD con JSON y APIs

## Descripción
Este proyecto implementa un sistema completo de operaciones CRUD (Create, Read, Update, Delete) utilizando el framework Laravel. Se ha desarrollado una API RESTful para gestionar tareas (Tasks) con persistencia en archivos JSON, aplicando principios de diseño como el patrón Repository para separar la lógica de acceso a datos.

## Pasos para levantar el proyecto
Prerrequisitos

Tener una cuenta de GitHub
Tener PHP 8 o superior instalado
Tener Composer instalado
Tener Git instalado

1. Clonar el repositorio
git clone https://github.com/AlexRosalesDev/lab5.git
cd lab5

2. Instalar dependencias
composer install

3. Ejecutar el servidor de desarrollo
php artisan serve

4. Probar la API
El servidor estará disponible en http://127.0.0.1:8000
Endpoint de prueba:
curl -X GET http://127.0.0.1:8000/api/hola

Ejemplo de creación de tarea:
curl -X POST http://127.0.0.1:8000/api/tasks \
  -H "Content-Type: application/json" \
  -d '{"title": "Mi primera tarea", "completed": false}'

5. Acceder a los endpoints CRUD

GET /api/tasks - Listar todas las tareas
GET /api/tasks/{id} - Obtener una tarea específica
POST /api/tasks - Crear una nueva tarea
PUT /api/tasks/{id} - Actualizar una tarea existente
DELETE /api/tasks/{id} - Eliminar una tarea
