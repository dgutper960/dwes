<!-- Indicamos la plantilla de la que partimos -->
@extends('layouts.layout')
<!-- Indicamos el contenido de las secciones de Título y Subtítulo -->
@section('titulo', 'Create Student')

<!-- Cargamos el menu -->
@section('menu')
@include('layouts.partials.menu')
@endsection

@section('cabecera', 'Gestion Estudiantes')
@section('subcabecera', 'Nuevo de Alumno')
<!-- Indicamos el contenido de la sección contenido -->
@section('main')

@include('partials.alerts') 
<div class="card">
    <div class="card-header">
        Formulario Nuevo Alumno
    </div>
    <div class="card-body">
        <!-- Formulario  -->

        <form action="{{route('students.store')}}" method="POST">
            @csrf

            <!-- Nombre  -->
            <div class="mb-3">
                <label for="name" class="form-label">Nombre</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                    value="{{ old('name') }}" required autocomplete="name" autofocus>
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <!-- Apellidos  -->
            <div class="mb-3">
                <label for="lastname" class="form-label">Apellidos</label>
                <input type="text" class="form-control @error('lastname') is-invalid @enderror" name="lastname"
                    value="{{ old('lastname') }}" required autocomplete="lastname" autofocus>
                @error('lastname')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <!-- Fecha Nac  -->
            <div class="mb-3">
                <label for="birt_date" class="form-label">Telefono</label>
                <input type="tel" class="form-control @error('birt_date') is-invalid @enderror" name="birt_date"
                    value="{{ old('birt_date') }}" required autocomplete="birt_date" autofocus>
                @error('birt_date')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <!-- Telefono  -->
            <div class="mb-3">
                <label for="phone" class="form-label">Ciudad</label>
                <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone"
                    value="{{ old('phone') }}" required autocomplete="phone" autofocus>
                @error('phone')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <!-- Ciudad  -->
            <div class="mb-3">
                <label for="city" class="form-label">Dni</label>
                <input type="text" class="form-control @error('city') is-invalid @enderror" name="city"
                    value="{{ old('city') }}" required autocomplete="city" autofocus>
                @error('city')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <!-- Dni  -->
            <div class="mb-3">
                <label for="dni" class="form-label">Dni</label>
                <input type="text" class="form-control @error('dni') is-invalid @enderror" name="dni"
                    value="{{ old('dni') }}" required autocomplete="dni" autofocus>
                @error('dni')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <!-- Email  -->
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                    value="{{ old('email') }}" required autocomplete="email" autofocus>
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

<!-- Curso  -->
<div class="mb-3">
    <label for="course" class="form-label">Curso</label>
    <select id="course" class="form-select @error('course_id') is-invalid @enderror" name="course_id">
        <option selected disabled>Seleccione Curso</option>
        @foreach ($cursos as $curso)
            <option value="{{ $curso->id }}" @if($curso->id == old('course_id')) selected @endif>
                {{ $curso->course }}
            </option>
        @endforeach
    </select>
    @error('course_id')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>


    </div>
    {{-- Fin Formulario --}}


    <!-- Mostramos el num de registros -->
    <p>Número de registros: {{ count($students) }}</p>
    @endsection