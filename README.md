# Gestor de tareas
Proyecto desarrollado por Germán González.

## Instalación

1. Clona el repositorio
   ```sh
   git clone https://github.com/germancjk/test-laravel.git
   ```
2. Instala las dependencias
   ```sh
   composer install
   ```
3. Genera la app key
    ```sh
   php artisan key:generate
   ```
4. Realiza las migraciones en la base de datos
   ```sh
   php artisan migrate
   ```
5. Genera los datos por defecto de la tabla categorias
   ```sh
   php artisan db:seed
   ```