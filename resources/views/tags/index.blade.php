@extends('layouts.app')

@section('title', 'Etiquetas')

@section('content')

    <div class="d-flex justify-content-between align-items-center mb-3">

        <h1>Etiquetas</h1>

        <a
            href="{{ route('tags.create') }}"
            class="btn btn-primary"
        >
            Nueva etiqueta
        </a>

    </div>

    @if ($tags->isEmpty())

        <div class="alert alert-info">
            No hay etiquetas registradas.
        </div>

    @else

        <div class="card">
            <div class="card-body">

                <div class="table-responsive">

                    <table class="table table-striped align-middle mb-0">

                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Tareas</th>
                                <th class="text-end">
                                    Acciones
                                </th>
                            </tr>
                        </thead>

                        <tbody>

                            @foreach ($tags as $tag)

                                <tr>

                                    <td>
                                        {{ $tag->id }}
                                    </td>

                                    <td>
                                        {{ $tag->name }}
                                    </td>

                                    <td>
                                        {{ $tag->tasks_count }}
                                    </td>

                                    <td class="text-end">

                                        <a
                                            href="{{ route('tags.show', $tag) }}"
                                            class="btn btn-info btn-sm"
                                        >
                                            Ver
                                        </a>

                                        <a
                                            href="{{ route('tags.edit', $tag) }}"
                                            class="btn btn-warning btn-sm"
                                        >
                                            Editar
                                        </a>

                                        <form
                                            action="{{ route('tags.destroy', $tag) }}"
                                            method="POST"
                                            class="d-inline"
                                            onsubmit="return confirm('¿Seguro que deseas eliminar esta etiqueta?')"
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