<!-- Indicamos la plantilla de la que partimos -->
@extends('layout')
<!-- Indicamos el contenido de las secciones de Título y Subtítulo -->
@section('titulo', 'Articulos Informática')
@section('subtitulo', 'Articulos disponibles')
<!-- Indicamos el contenido de la sección contenido -->
@section('contenido')

<!-- Pintamos la tabla para mostrar los artículos -->
    <table class="table">
        <thead>
            <tr>
                <th scope="col">id</th>
                <th scope="col">Descripción</th>
                <th scope="col">Categoría</th>
                <th scope="col">Unidades</th>
                <th scope="col">Precio Coste</th>
                <th scope="col">Precio Venta</th>
            </tr>
        </thead>
        <tbody>
            <!-- Recorremos los articulos -->
            @foreach ($articulos as $articulo)
                <tr>
                    <th scope="row">{{ $articulo['id'] }}</th>
                    <td>{{ $articulo['descripcion']}}</td>
                    <td>{{ $articulo['categoria'] }}</td>
                    <td>{{ $articulo['stock'] }}</td>
                    <td>{{ $articulo['precio_coste'] }}</td>
                    <td>{{ $articulo['precio_venta'] }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Mostramos el num de registros -->
    <p>Número de registros: {{ count($articulos) }}</p>
@endsection