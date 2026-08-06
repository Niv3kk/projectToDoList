@extends('layouts.app')

@section('title', 'Editar categoría')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h1 class="h4 mb-0">Editar categoría</h1>
                </div>

                <div class="card-body">
                    <form
                        action="{{ route('categories.update', $category) }}"
                        method="POST"
                    >
                        @csrf
                        @method('PUT')

                        @include('categories._form', [
                            'buttonText' => 'Actualizar',
                        ])
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection