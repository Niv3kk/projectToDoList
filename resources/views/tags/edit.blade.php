@extends('layouts.app')

@section('title', 'Editar etiqueta')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">

            <div class="card">
                <div class="card-header">
                    <h1 class="h4 mb-0">
                        Editar etiqueta
                    </h1>
                </div>

                <div class="card-body">
                    <form
                        action="{{ route('tags.update', $tag) }}"
                        method="POST"
                    >
                        @csrf
                        @method('PUT')

                        @include('tags._form', [
                            'buttonText' => 'Actualizar',
                        ])
                    </form>
                </div>
            </div>

        </div>
    </div>
@endsection