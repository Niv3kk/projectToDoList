@extends('layouts.app')

@section('title', 'Tareas')

@section('content')

    <div class="d-flex justify-content-between align-items-center mb-3">

        <h1>Tareas</h1>

        <a
            href="{{ route('tasks.create') }}"
            class="btn btn-primary"
        >
            Nueva tarea
        </a>

    </div>


    @if ($tasks->isEmpty())

        <div class="alert alert-info">
            No hay tareas registradas.
        </div>

    @else

        <div class="card">

            <div class="card-body">

                <div class="table-responsive">

                    <table class="table table-striped align-middle">

                        <thead>

                            <tr>
                                <th>Título</th>
                                <th>Categoría</th>
                                <th>Etiquetas</th>
                                <th>Estado</th>
                                <th class="text-end">
                                    Acciones
                                </th>
                            </tr>

                        </thead>


                        <tbody>

                            @foreach ($tasks as $task)

                                <tr>

                                    <td>
                                        {{ $task->title }}
                                    </td>


                                    <td>
                                        {{ $task->category->name }}
                                    </td>


                                    <td>

                                        @foreach ($task->tags as $tag)

                                            <span class="badge bg-secondary">
                                                {{ $tag->name }}
                                            </span>

                                        @endforeach

                                    </td>


                                    <td>

                                        @if ($task->is_completed)

                                            <span class="badge bg-success">
                                                Completada
                                            </span>

                                        @else

                                            <span class="badge bg-warning text-dark">
                                                Pendiente
                                            </span>

                                        @endif

                                    </td>


                                    <td class="text-end">

                                        <a
                                            href="{{ route('tasks.show', $task) }}"
                                            class="btn btn-info btn-sm"
                                        >
                                            Ver
                                        </a>

                                        <a
                                            href="{{ route('tasks.edit', $task) }}"
                                            class="btn btn-warning btn-sm"
                                        >
                                            Editar
                                        </a>

                                        <form
                                            action="{{ route('tasks.destroy', $task) }}"
                                            method="POST"
                                            class="d-inline"
                                            onsubmit="return confirm('¿Seguro que deseas eliminar esta tarea?')"
                                        >

                                            @csrf
                                            @method('DELETE')

                                            <button
                                                type="submit"
                                                class="btn btn-danger btn-sm"
                                            >
                                                Eliminar
                                            </button>

                                        </form>

                                    </td>

                                </tr>

                            @endforeach

                        </tbody>

                    </table>

                </div>

            </div>

        </div>

    @endif

@endsection