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
        </tr>
    </thead>
    <tbody>
        <!-- Recorremos los articulos -->
        @foreach ($students as $student)
            <tr>
                <th scope="row">{{ $student['id'] }}</th>
                <td>{{ $student['name']}}</td>
                <td>{{ $student['lastname'] }}</td>
                <td>{{ $student['birt_date'] }}</td>
                <td>{{ $student['phone'] }}</td>
                <td>{{ $student['email'] }}</td>
                <td>{{ $student->course->course }}</td>
            </tr>
        @endforeach
    </tbody>
</table>

<!-- Mostramos el num de registros -->
<p>Número de registros: {{ count($students) }}</p>
@endsection