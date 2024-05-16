<!-- Indicamos la plantilla de la que partimos -->
@extends('layouts.layout')
<!-- Indicamos el contenido de las secciones de Título y Subtítulo -->
@section('titulo', 'Main Students')

<!-- Cargamos el menu -->
@section('menu')
@include('layouts.partials.menu')
@endsection

@section('cabecera', 'Gestion Estudiantes')



@section('subcabecera', 'Lista de Alumnos')


<!-- Indicamos el contenido de la sección contenido -->
@section('main')

@include('student.partials.menu')
<!-- Pintamos la tabla para mostrar los alumnos -->
<table class="table">
    <thead>
        <tr>
            <th scope="col">id</th>
            <th scope="col">Nombre</th>
            <th scope="col">Apellidos</th>
            <th scope="col">Fecha Nac</th>
            <th scope="col">Télefono</th>
            <th scope="col">Email</th>
            <th scope="col">Curso</th>
            <th scope="col">Acciones</th>
        </tr>
    </thead>
    <tbody>
        <!-- Recorremos los alumnos -->
        @forelse ($students as $student)
            <tr>
                <th scope="row">{{ $student['id'] }}</th>
                <td>{{ $student->name }}</td>
                <td>{{ $student['lastname'] }}</td>
                <td>{{ $student['birt_date'] }}</td>
                <td>{{ $student->phone }}</td>
                <td>{{ $student['email'] }}</td>
                <td>{{ $student->course->course }}</td>
                <td>
                    <!-- Botones de Acción -->
                    <a href="{{ route('students.edit', $student->id)}}" title="Editar" class="btn btn-primary btn-sm"><i class="bi bi-pencil"></i></a>
                    <a href="{{ route('students.show', $student->id)}}" title="Mostrar" class="btn btn-warning btn-sm"><i class="bi bi-eye-fill"></i></a>
                    <form style="display:inline;" method="POST" action="{{ route('students.destroy', $student->id)}}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Borrar alumno {{$student->name}} de forma irreversible?')"><i class="bi bi-trash-fill"></i></button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="8">No hay estudiantes registrados.</td>
            </tr>
        @endforelse
    </tbody>
</table>

<!-- Mostramos el num de registros -->
<p>Número de registros: {{ count($students) }}</p>
@endsection
