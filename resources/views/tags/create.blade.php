@extends('layouts.app')

@section('title', 'Nueva etiqueta')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">

            <div class="card">
                <div class="card-header">
                    <h1 class="h4 mb-0">
                        Nueva etiqueta
                    </h1>
                </div>

                <div class="card-body">
                    <form
                        action="{{ route('tags.store') }}"
                        method="POST"
                    >
                        @csrf

                        @include('tags._form', [
                            'buttonText' => 'Guardar',
                        ])
                    </form>
                </div>
            </div>

        </div>
    </div>
@endsection