<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Test Laravel</title>

        <script src="{{ asset('js/app.js') }}" defer></script>

        <script src="{{ asset('js/tasks.js') }}" defer></script>
    
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    </head>
    <body>

        <div class="col-lg-8 mx-auto p-3 py-md-5">

            <main>
                <h1 class="mb-5">Gestor de tareas</h1>

                <!-- form -->
                <form class="row gx-3 gy-2 align-items-center mb-5" action="/" id="create-task">
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="name" placeholder="Nueva tarea...">
                    </div>

                    @foreach ($categories as $category)
                    <div class="col-auto">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="categories" value="{{ $category->id }}" id="category-{{ $category->id }}">
                            <label class="form-check-label" for="category-{{ $category->id }}">
                                {{ $category->name }}
                            </label>
                        </div>
                    </div>
                    @endforeach

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
                                <td></td>
                                <td></td>
                                <td></td>
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
