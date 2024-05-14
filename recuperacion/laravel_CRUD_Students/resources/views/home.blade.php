<!-- Indicamos la plantilla de la vista -->
@extends('layouts.layout')

<!-- Indicamos el contenido de la seccion titulo -->
@section('titulo', 'Home')

<!-- Indicamos el contenido para la cabecera -->
@section('cabecera', 'Gestión Alumnos')

<!-- Indicamos el contenido para la subcabecera -->
@section('subcabecera', 'Página Principal')

<!-- Cargamos el menu -->
@section('menu')
    @include('layouts.partials.menu')
@endsection

<!-- Indicamos el contenido para el main -->
@section('main')

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <picture>
                <!-- <source media="(min-width: 1200px)" srcset="{{ asset('images/imagen-grande.jpg') }}">
                <source media="(min-width: 768px)" srcset="{{ asset('images/imagen-mediana.jpg') }}">
                <source media="(min-width: 576px)" srcset="{{ asset('images/imagen-pequeña.jpg') }}"> -->
                <img src="{{ asset('images/index_students.jpg') }}" alt="Descripción de la imagen"
                    class="img-fluid rounded">
            </picture>
        </div>
    </div>
</div>

<!-- Texto principal -->
<a class="btn btn-primary" href="{{route('students.index')}}" role="button">Alumnos</a>

@endsection