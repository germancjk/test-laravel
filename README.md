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
3. Genera un archivo .env, puedes utilizar el ejemplo de `.env.example` (por defecto utilizaremos MySql)
4. Genera la app key
    ```sh
   php artisan key:generate
   ```
5. Realiza las migraciones en la base de datos
   ```sh
   php artisan migrate
   ```
6. Genera los datos por defecto de la tabla categorias
   ```sh
   php artisan db:seed
   ```