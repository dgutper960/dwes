@extends('layouts.layout')

@section('titulo', 'Alumnos')
@section('subtitulo', 'Añadir Nuevo Alumno')
@section('contenido')
    @include('partials.alerts')
    <div class="card">
        <div class="card-header">
            Formulario Nuevo Alumno
        </div>
        <div class="card-body">
            <!-- Formulario  -->

            <form action={{ route('alumnos.update', $alumno->id ) }} method="POST">
                @csrf

                <!-- Nombre  -->
                <div class="mb-3">
                    <label for="name" class="form-label">Nombre</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                        value="{{ old('name', $alumno->name) }}" required autocomplete="name" autofocus>
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
                        value="{{ old('lastname', $alumno->lastname) }}" required autocomplete="lastname" autofocus>
                    @error('lastname')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <!-- Fecha nacimiento  -->
                <div class="mb-3">
                    <label for="birth_date" class="form-label">Fecha Nacimiento</label>
                    <input type="date" class="form-control @error('birth_date') is-invalid @enderror" name="birth_date"
                        value="{{ old('birth_date', $alumno->birth_date) }}" required autocomplete="birth_date" autofocus>
                    @error('birth_date')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <!-- Email  -->
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                        value="{{ old('email', $alumno->email) }}" required autocomplete="email" autofocus>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <!-- Teléfono  -->
                <div class="mb-3">
                    <label for="phone" class="form-label">Teléfono</label>
                    <input type="tel" class="form-control @error('phone') is-invalid @enderror" name="phone"
                        value="{{ old('phone', $alumno->phone) }}" required autocomplete="phone" autofocus>
                    @error('phone')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <!-- Población  -->
                <div class="mb-3">
                    <label for="city" class="form-label">Población</label>
                    <input type="text" class="form-control @error('city') is-invalid @enderror" name="city"
                        value="{{ old('city', $alumno->city) }}" required autocomplete="city" autofocus>
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
                        value="{{ old('dni', $alumno->dni) }}" required autocomplete="dni" autofocus>
                    @error('dni')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                {{-- Curso --}}
                <div class="mb-3">
                    <label for="course_id" class="form-label">Curso</label>
                    <select class="form-select @error('course_id') is-invalid @enderror" aria-label="Default select example"
                        name="course_id" required>
                        <option selected disabled>Seleccione Curso</option>
                        @foreach ($cursos as $curso)
                            <option value="{{ $curso->id }}" @if ($curso->id == old('course_id', $alumno->course_id)) selected @endif>
                                {{ $curso->course }}</option>
                        @endforeach
                    </select>
                    @error('course_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>


                {{-- Fin Formulario --}}

                <div class="card-footer text-muted">
                    <!-- Botones de acción --------------------------------------------------->
                    <a class="btn btn-secondary" href="{{ route('alumnos.index') }}" role="button">Cancelar</a>
                    <button type="reset" class="btn btn-danger">Reset</button>
                    <button type="submit" class="btn btn-primary">Actualizar</button>
                </div>
                <br>
                <br>
                <br>

            </form>
        </div>



    @endsection
