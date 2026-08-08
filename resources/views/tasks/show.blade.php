@extends('layouts.app')

@section('title', 'Detalle de tarea')

@section('content')

    <div class="row justify-content-center">

        <div class="col-lg-8">

            <div class="card">

                <div class="card-header d-flex justify-content-between align-items-center">

                    <h1 class="h4 mb-0">
                        Detalle de tarea
                    </h1>

                    <a
                        href="{{ route('tasks.edit', $task) }}"
                        class="btn btn-warning btn-sm"
                    >
                        Editar
                    </a>

                </div>


                <div class="card-body">

                    <dl class="row">

                        <dt class="col-sm-4">
                            Título
                        </dt>

                        <dd class="col-sm-8">
                            {{ $task->title }}
                        </dd>


                        <dt class="col-sm-4">
                            Descripción
                        </dt>

                        <dd class="col-sm-8">
                            {{ $task->description }}
                        </dd>


                        <dt class="col-sm-4">
                            Categoría
                        </dt>

                        <dd class="col-sm-8">
                            {{ $task->category->name }}
                        </dd>


                        <dt class="col-sm-4">
                            Etiquetas
                        </dt>

                        <dd class="col-sm-8">

                            @foreach ($task->tags as $tag)

                                <span class="badge bg-secondary">
                                    {{ $tag->name }}
                                </span>

                            @endforeach

                        </dd>


                        <dt class="col-sm-4">
                            Estado
                        </dt>

                        <dd class="col-sm-8">

                            @if ($task->is_completed)

                                <span class="badge bg-success">
                                    Completada
                                </span>

                            @else

                                <span class="badge bg-warning text-dark">
                                    Pendiente
                                </span>

                            @endif

                        </dd>


                        <dt class="col-sm-4">
                            Creada
                        </dt>

                        <dd class="col-sm-8">
                            {{ $task->created_at->format('d/m/Y H:i') }}
                        </dd>


                        <dt class="col-sm-4">
                            Última actualización
                        </dt>

                        <dd class="col-sm-8">
                            {{ $task->updated_at->format('d/m/Y H:i') }}
                        </dd>

                    </dl>

                </div>


                <div class="card-footer">

                    <a
                        href="{{ route('tasks.index') }}"
                        class="btn btn-secondary"
                    >
                        Volver
                    </a>

                </div>

            </div>

        </div>

    </div>

@endsection