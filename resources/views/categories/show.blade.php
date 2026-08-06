@extends('layouts.app')

@section('title', 'Detalle de categoría')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h1 class="h4 mb-0">Detalle de categoría</h1>

                    <a
                        href="{{ route('categories.edit', $category) }}"
                        class="btn btn-warning btn-sm"
                    >
                        Editar
                    </a>
                </div>

                <div class="card-body">
                    <dl class="row mb-0">
                        <dt class="col-sm-4">ID</dt>
                        <dd class="col-sm-8">{{ $category->id }}</dd>

                        <dt class="col-sm-4">Nombre</dt>
                        <dd class="col-sm-8">{{ $category->name }}</dd>

                        <dt class="col-sm-4">Cantidad de tareas</dt>
                        <dd class="col-sm-8">{{ $category->tasks_count }}</dd>

                        <dt class="col-sm-4">Fecha de creación</dt>
                        <dd class="col-sm-8">
                            {{ $category->created_at->format('d/m/Y H:i') }}
                        </dd>

                        <dt class="col-sm-4">Última actualización</dt>
                        <dd class="col-sm-8">
                            {{ $category->updated_at->format('d/m/Y H:i') }}
                        </dd>
                    </dl>
                </div>

                <div class="card-footer">
                    <a
                        href="{{ route('categories.index') }}"
                        class="btn btn-secondary"
                    >
                        Volver
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection