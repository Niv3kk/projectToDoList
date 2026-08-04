@extends('layouts.app')

@section('title', 'Categorías')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1>Categorías</h1>

        <a href="{{ route('categories.create') }}" class="btn btn-primary">
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
                <table class="table table-striped align-middle mb-0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($categories as $category)
                            <tr>
                                <td>{{ $category->id }}</td>
                                <td>{{ $category->name }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif
@endsection