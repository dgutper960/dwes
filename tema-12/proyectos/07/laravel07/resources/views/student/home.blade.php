{{-- 
    Creamos una vista a partir de layaut 
    Vista Principal Alumnos 
--}}
{{-- Creamos la vista partienddo de la plantilla layaut.balde.php --}}
@extends('layaut.layaut'); 

@section('titulo', 'Home Alumnos');
@section('subtitulo', 'Panel de Control Alumnos');

@section('contenido');
{{-- Definimos la sección contenido --}}
    {{-- Incluimos el menu alumnos --}}
    @include('student.partials.menu');

    {{-- Incluimos el CRUD de alumnos --}}
    <table class="table">
        <thead>
            <th>id</th>
            <th>Apellidos</th>
            <th>Nombre</th>
            <th>Teléfono</th>
            <th>Ciudad</th>
            <th>Email</th>
            <th>Curso</th>
            <th>Acciones</th>
        </thead>
        <tbody>
            @forelse ($alumnos as $alumno)
                <tr>
                    <td scope="row">{{$alumno->id}}</td>
                    <td>{{$alumno->lastname}}</td>
                    <td>{{$alumno->name}}</td>
                    <td>{{$alumno->phone}}</td>
                    <td>{{$alumno->city}}</td>
                    <td>{{$alumno->email}}</td>
                    <td>{{$alumno->course->course}}</td>
                    {{-- botones de acción --}}
                    <td>
                        <a href="#" title="Editar"><i class="=bi bi-pencil-fill"></i></a>
                        <a href="#" title="Mostrar"><i class="=bi bi-eye-fill"></i></a>
                        <a href="#" title="Eliminar"><i class="=bi bi-trash-fill" onclick="return confirm('¿Estas seguro?')"></i></a>
                    </td>
                </tr>
            @empty
                <p>No hay alumnos registrados</p>
            @endforelse
        </tbody>
    </table>


@endsection;
