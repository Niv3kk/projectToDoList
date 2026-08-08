<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'To-Do List')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <nav class="navbar navbar-expand navbar-dark bg-dark">
        <div class="container">

            <a class="navbar-brand" href="{{ route('tasks.index') }}">
                To-Do List
            </a>

            <div class="navbar-nav">

                <a class="nav-link" href="{{ route('tasks.index') }}">
                    Tareas
                </a>

                <a class="nav-link" href="{{ route('categories.index') }}">
                    Categorías
                </a>

                <a class="nav-link" href="{{ route('tags.index') }}">
                    Etiquetas
                </a>

            </div>

        </div>
    </nav>

    <main class="container py-4">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        @yield('content')
    </main>

</body>

</html>
