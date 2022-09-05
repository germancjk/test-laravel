<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Test Laravel</title>

        <script src="{{ asset('js/app.js') }}" defer></script>
    
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    </head>
    <body>

        <div class="col-lg-8 mx-auto p-3 py-md-5">

            <main>
                <h1 class="mb-5">Gestor de tareas</h1>

                <!-- form -->
                <form class="row gx-3 gy-2 align-items-center mb-5">
                    <div class="col-sm-5">
                        <input type="text" class="form-control" id="name" placeholder="Nueva tarea...">
                    </div>
                    <div class="col-auto">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="category-1">
                            <label class="form-check-label" for="category-1">
                                PHP
                            </label>
                        </div>
                    </div>
                    <div class="col-auto">
                        <button type="submit" class="btn btn-primary">Añadir</button>
                    </div>
                </form>

                <!-- table -->
                <div class="mb-5">
                    <table class="table table-bordered table-striped table-hover">
                        <thead>
                            <tr>
                                <th scope="col">Tarea</th>
                                <th scope="col">Categorias</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Tarea número uno</td>
                                <td>
                                    <span class="badge rounded-pill text-bg-secondary">PHP</span>
                                </td>
                                <td>
                                    <button class="btn btn-sm btn-danger">Eliminar</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </main>

            <!-- footer -->
            <footer class="pt-5 my-5 text-muted border-top">
                Test Laravel - Germán González
            </footer>
        </div>

    </body>



</html>
