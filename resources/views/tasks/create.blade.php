@extends('layouts.app')

@section('title', 'Nueva tarea')

@section('content')

    <div class="row justify-content-center">

        <div class="col-lg-8">

            <div class="card">

                <div class="card-header">
                    <h1 class="h4 mb-0">
                        Nueva tarea
                    </h1>
                </div>

                <div class="card-body">

                    @if ($categories->isEmpty())
                        <div class="alert alert-warning">
                            Primero debes crear una categoría.
                        </div>
                    @elseif ($tags->isEmpty())
                        <div class="alert alert-warning">
                            Primero debes crear al menos una etiqueta.
                        </div>
                    @else

                        <form
                            action="{{ route('tasks.store') }}"
                            method="POST"
                        >

                            @csrf

                            @include('tasks._form', [
                                'buttonText' => 'Guardar',
                            ])

                        </form>

                    @endif

                </div>

            </div>

        </div>

    </div>

@endsection