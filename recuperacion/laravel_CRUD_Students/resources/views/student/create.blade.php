<!-- Indicamos la plantilla de la que partimos -->
@extends('layouts.layout')
<!-- Indicamos el contenido de las secciones de Título y Subtítulo -->
@section('titulo', 'Create Student')

<!-- Cargamos el menú -->
@section('menu')
@include('layouts.partials.menu')
@endsection

@section('main')

@include('layouts.partials.alerts')
<div class="card">
    <div class="card-header">
        <strong>Formulario Nuevo Alumno</strong>
    </div>
    <div class="card-body">
        <!-- Formulario  -->

        <form action="{{route('students.store')}}" method="POST">
            @csrf

            <!-- Nombre  -->
            <div class="mb-3">
                <label for="name" class="form-label">Nombre</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
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
                <input type="text" class="form-control @error('lastname') is-invalid @enderror" id="lastname" name="lastname"
                    value="{{ old('lastname') }}" required autocomplete="lastname" autofocus>
                @error('lastname')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <!-- Fecha Nac  -->
            <div class="mb-3">
                <label for="birth_date" class="form-label">Fecha de Nacimiento</label>
                <input type="date" class="form-control @error('birth_date') is-invalid @enderror" id="birth_date" name="birth_date"
                    value="{{ old('birth_date') }}" required autocomplete="birth_date" autofocus>
                @error('birth_date')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <!-- Teléfono  -->
            <div class="mb-3">
                <label for="phone" class="form-label">Teléfono</label>
                <input type="tel" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone"
                    value="{{ old('phone') }}" required autocomplete="phone" autofocus>
                @error('phone')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <!-- Ciudad  -->
            <div class="mb-3">
                <label for="city" class="form-label">Ciudad</label>
                <input type="text" class="form-control @error('city') is-invalid @enderror" id="city" name="city"
                    value="{{ old('city') }}" required autocomplete="city" autofocus>
                @error('city')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <!-- DNI  -->
            <div class="mb-3">
                <label for="dni" class="form-label">DNI</label>
                <input type="text" class="form-control @error('dni') is-invalid @enderror" id="dni" name="dni"
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
                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email"
                    value="{{ old('email') }}" required autocomplete="email">
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

            <!-- Botones de Acción -->
            <div class="card-footer text-muted">
             <!-- Botones de acción --------------------------------------------------->
            <a class="btn btn-secondary" href="{{ route ('students.index')}}" role="button">Cancelar</a>
            <button type="reset" class="btn btn-danger">Reset</button>
            <button type="submit" class="btn btn-primary">Añadir</button>
        </div>
        </form>
        <!-- Fin Formulario -->
        <br>
        <br>

    </div>
</div>
@endsection
