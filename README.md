# _Gestor de Docencia Orientada al Conocimiento - GDOC_

---

## Requerimientos

| **Componente** | **Versión** |                                                         |
| -------------- | ----------- | ------------------------------------------------------- |
| php            | 8.2         | [Docs](https://www.php.net/)                            |
| Laravel        | 10.x        | [Docs](https://laravel.com/)                            |
| Livewire       | 3.x         | [Docs](https://livewire.laravel.com/docs)               |
| Jetstream      | 4.x         | [Docs](https://jetstream.laravel.com/installation.html) |
| Filament       | 3.x         | [Docs](https://filamentphp.com/docs)                    |

## Comandos necesarios

### Servidor

-   Inicializacion de servidor
    `php artisan server`

-   Migrar base de datos y cargar datos pre collectados
    `php artisan migrate --seed`

-   Optimizar proyecto
    `php artisan optimize`

-   Generar rutas de imagenes
    `php artisan storage:link`

-   Archivo de configuracion para crear modelos desde la base de datos
    `php artisan vendor:publish --tag=reliese-models`

-   Crear modelos a partir de la base de datos
    `php artisan code:models`

### Filament

-   Creacion de usuario
    `php artisan make:filament-user`

-   Filament Crear Pagina
    `php artisan make:filament-page <Nombre>`

-   Filament Crear Recurso para el modelo
    `php artisan make:filament-resource <Nombre del modelo> --generate`

-   Filament Icons Caching
    `php artisan icons:cache`

-   Filament Components Caching
    `php artisan filament:cache-components`

### Permisos y Policies

-   Sincronizar permisos con los modelos ya creados
    `php artisan permissions:sync`

-   Limpiar permisos y crear nuevamente
    `php artisan permissions:sync -C`

*   Crear Policy de cada modelo
```php artisan permissions:sync -P```

### API

-   Generar controllador establecido para API
    `php artisan make:controller <NombreController> --api`

### Dependencias de Node

-   Collectar dependencias de Node
    `npm run build`
