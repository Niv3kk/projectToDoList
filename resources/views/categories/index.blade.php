@extends('layouts.app')

@section('title', 'Categorías')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1>Categorías</h1>

        <a
            href="{{ route('categories.create') }}"
            class="btn btn-primary"
        >
            Nueva categoría
        </a>
    </div>

    @if ($categories->isEmpty())
        <div class="alert alert-info">
            No hay categorías registradas.
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
                                <th class="text-end">Acciones</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($categories as $category)
                                <tr>
                                    <td>{{ $category->id }}</td>
                                    <td>{{ $category->name }}</td>

                                    <td class="text-end">
                                        <a
                                            href="{{ route('categories.show', $category) }}"
                                            class="btn btn-info btn-sm"
                                        >
                                            Ver
                                        </a>

                                        <a
                                            href="{{ route('categories.edit', $category) }}"
                                            class="btn btn-warning btn-sm"
                                        >
                                            Editar
                                        </a>

                                        <form
                                            action="{{ route('categories.destroy', $category) }}"
                                            method="POST"
                                            class="d-inline"
                                            onsubmit="return confirm('¿Seguro que deseas eliminar esta categoría?')"
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