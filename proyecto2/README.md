# *Gestor de Docencia Orientada al Conocimiento - GDOC*
---
### Requerimientos

| **Componente** | **Versión** |  |
| ---- | ---- | ---- |
| php | 8.2 | [Docs](https://www.php.net/) |
| Laravel | 10 | [Docs](https://laravel.com/) |
| Livewire | 3.x | [Docs](https://livewire.laravel.com/docs) |
| Jetstream | 4.x | [Docs](https://jetstream.laravel.com/installation.html) |
| AdminLTE | 3.x | [Docs](https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Installation) |

## Instrucciones de instalación
---
Para crear un proyecto de Laravel se realiza la instalación desde composer:
```composer global require laravel/installer```
Asi podremos utilizar ```laravel new <Nombre del proyecto>``` para crear un proyecto desde 0.

>[!IMPORTANT]
>
> Al ejecutar el comando nos da la opcion de instalar dependencias como [Livewire](https://livewire.laravel.com/docs), [Jetstream](https://jetstream.laravel.com/installation.html), etc.

## Instrucciones de clonación del proyecto
---
1. Abriremos una consola y nos ubicaremos en el directorio donde guardaremos el proyecto.
1. Mediante ```git clone <URL>``` podremos crear una copia completa del proyecto.
1. Nos cambiaremos a la ubicacion ``` cd <nombre-proyecto> ```, para instalar las dependencias necesarias.
1. Estas dependencias se encuentran definidas en ```composer.json```, para instalarlas usaremos ```composer install``` y esperamos hasta que terminen de instalarse.
1. Tambien tenemos dependecias que vienen de *Node* para esto usaremos: ```npm install```
1. Finalmente necesitaremos ubicar el archivo ```.env``` el cual contiene todas las variables de entorno del proyecto.

## Clonación de base de datos
---
Dentro del directorio ```database``` se encuentra el archivo ```schema.sql``` el cual tiene la estructura de la base de datos con la cual el proyecto trabaja.
Crearemos la base de datos en cualquier motor sea *MySQL*, *SqlServer* o *PostgreSQL*, siempre y cuando se coloque correctamente los datos en el archivo ```.env```.
#### Migraciones
La mejor forma de usar la base de datos es mediante las migraciones de Laravel.
Dentro del directorio ```database\migrations``` se encuentran todos los campos de las tablas y las relaciones necesarias.
Para usar este método unicamente necesitaremos crear una base de datos con un nombre y colocarlo correctamente en el archivo ```.env```.
Con el comando ```php artisan migrate``` se crearan todas las tablas definidas.

## Puesta en marcha
---
Para ejecutar el proyecto usaremos: ```php artisan serve``` y nos creará un servidor local en el puerto 8000.

## Desarrollo de componenetes
### Integración de AdminLTE
---
En una consola y ubicados en el directorio del proyecto: 
1. Descargaremos *AdminLTE* mediante.
```composer require jeroennoten/laravel-adminlte```
1. Realizamos la instalación:
```php artisan adminlte:install```
    1. Una vez concluido revisaremos el estado de la instalación
    ```php artisan adminlte:status```
    Nos daremos cuenta que hay módulos sin instalar pero esto se instalarán manualmente según los necesitemos.
    1. Lo que si encesitamos son auth_views asi que se descargan con:
    ```composer require laravel/ui```
    ```php artisan ui bootstrap --auth```
    Y se instalan con ```php artisan adminlte:install --only=auth_views```
1. Listo esto, vamos a inicializar las dependencias que vienen de Node.
    ```npm install```
    1. Una vez instalado se necesita ejecutar un comando que nos permitirá el uso de sus modulos.
        **Desarrollo:** ```npm run dev```
        **Producción:** ```npm run build```
>[!NOTE]
>
>Mientras ```npm run dev``` está en ejecución, abrimos otra consola con la dirección de nuestro proyecto y usaremos ```php artisan serve``` para visualizar correctamente nuestro proyecto en el servidor local en puerto 8000.
#### Visualizar AdminLTE Layout
Dentro del directorio de nuestro proyecto tenemos las carpetas de ```resources``` 

### Creación de CRUDs
---
*Pendiente*