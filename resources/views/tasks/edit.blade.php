@extends('layouts.app')

@section('title', 'Editar tarea')

@section('content')

    <div class="row justify-content-center">

        <div class="col-lg-8">

            <div class="card">

                <div class="card-header">

                    <h1 class="h4 mb-0">
                        Editar tarea
                    </h1>

                </div>

                <div class="card-body">

                    <form action="{{ route('tasks.update', $task) }}" method="POST">

                        @csrf
                        @method('PUT')

                        @include('tasks._form', [
                            'buttonText' => 'Actualizar',
                        ])

                    </form>

                </div>

            </div>

        </div>

    </div>

@endsection
