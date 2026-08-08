@extends('layouts.app')

@section('title', 'Detalle de etiqueta')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">

                    <h1 class="h4 mb-0">
                        Detalle de etiqueta
                    </h1>

                    <a
                        href="{{ route('tags.edit', $tag) }}"
                        class="btn btn-warning btn-sm"
                    >
                        Editar
                    </a>
                </div>

                <div class="card-body">
                    <dl class="row mb-0">

                        <dt class="col-sm-4">ID</dt>
                        <dd class="col-sm-8">
                            {{ $tag->id }}
                        </dd>

                        <dt class="col-sm-4">Nombre</dt>
                        <dd class="col-sm-8">
                            {{ $tag->name }}
                        </dd>

                        <dt class="col-sm-4">
                            Tareas asociadas
                        </dt>

                        <dd class="col-sm-8">
                            {{ $tag->tasks_count }}
                        </dd>

                        <dt class="col-sm-4">
                            Fecha de creación
                        </dt>

                        <dd class="col-sm-8">
                            {{ $tag->created_at->format('d/m/Y H:i') }}
                        </dd>

                    </dl>
                </div>

                <div class="card-footer">
                    <a
                        href="{{ route('tags.index') }}"
                        class="btn btn-secondary"
                    >
                        Volver
                    </a>
                </div>
            </div>

        </div>
    </div>
@endsection