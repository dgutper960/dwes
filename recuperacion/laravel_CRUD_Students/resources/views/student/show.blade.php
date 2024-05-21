<!-- Indicamos la plantilla de la que partimos -->
@extends('layouts.layout')
<!-- Indicamos el contenido de las secciones de Título y Subtítulo -->
@section('titulo', 'Show Student')

<!-- Cargamos el menú -->
@section('menu')
@include('layouts.partials.menu')
@endsection

@section('main')

@include('layouts.partials.alerts')
<div class="card">
    <div class="card-header">
        <strong>Mostrar Alumno</strong>
    </div>
    <div class="card-body">
        <!-- Formulario  -->

        <form>
            <!-- Nombre  -->
            <div class="mb-3">
                <label for="name" class="form-label">Nombre</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                    value="{{ $student->name }}" disabled>
            </div>

            <!-- Apellidos  -->
            <div class="mb-3">
                <label for="lastname" class="form-label">Apellidos</label>
                <input type="text" class="form-control @error('lastname') is-invalid @enderror" id="lastname"
                    value="{{ $student->lastname }}" disabled>
            </div>

            <!-- Fecha Nac  -->
            <div class="mb-3">
                <label for="birth_date" class="form-label">Fecha de Nacimiento</label>
                <input type="date" class="form-control @error('birth_date') is-invalid @enderror" id="birth_date" 
                    value="{{ $student->birt_date }}" disabled>
            </div>

            <!-- Teléfono  -->
            <div class="mb-3">
                <label for="phone" class="form-label">Teléfono</label>
                <input type="tel" class="form-control @error('phone') is-invalid @enderror" id="phone"
                    value="{{ $student->phone }}" disabled>
            </div>

            <!-- Ciudad  -->
            <div class="mb-3">
                <label for="city" class="form-label">Ciudad</label>
                <input type="text" class="form-control @error('city') is-invalid @enderror" id="city"
                    value="{{ $student->city }}" disabled>
            </div>

            <!-- DNI  -->
            <div class="mb-3">
                <label for="dni" class="form-label">DNI</label>
                <input type="text" class="form-control @error('dni') is-invalid @enderror" id="dni"
                    value="{{ $student->dni }}" disabled>
            </div>

            <!-- Email  -->
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                    value="{{ $student->email }}" >
            </div>

            <!-- Curso  -->
            <div class="mb-3">
                <label for="course" class="form-label">Curso</label>
                <input type="text" class="form-control" value="{{ $student->course->course }}" disabled>

                </input>

            </div>

            <!-- Botones de Acción -->
            <div class="card-footer text-muted">
             <!-- Botones de acción --------------------------------------------------->
            <a class="btn btn-secondary" href="{{ route ('students.index')}}" role="button">Volver</a>
        </div>
        </form>
        <!-- Fin Formulario -->

    </div>
</div>
<br>
<br>
@endsection
