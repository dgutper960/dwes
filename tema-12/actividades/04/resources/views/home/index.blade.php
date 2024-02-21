<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <h1>Hola Mundo en la vista Home</h1>

    <!-- Ponemos estructura IF -->
    @if($nivel == 1)
        <p>Estoy en primer curso</p>
    @else
        <p>Estoy en segundo</p>
    @endif

    <!-- Veamos un for -->
    <table>
        <caption>Listado de Clientes</caption>
        <thead>
            <th>id</th>
            <th>Nombre</th>
        </thead>
        <tbody>
            @foreach($clientes as $cliente)
            <tr>
                <td>{{$cliente['id']}}</td>
                <td>{{$cliente['nombre']}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{-- Recorremos un array vacio --}}
    @forelse ($usuarios as $usuario)
       <h4>{{print_r($usuario)}}</h4> 
    @empty
        <h4>No hay usuarios</h4>
    @endforelse


</body>

<footer>
    <p>Autor:
        <?= $autor ?>
        <!-- {{$autor}} Da error ya que este vista no es blade, en la otra vista (hola.ejemplo.blade.php) funcionaría --> 
        <!-- Añadimos la extension Blade para este ejemplo -->
    </p>
    <p>
        Módulo: {{$modulo ?? 'Desarrollo Web Entorno Servidor'}}
    </p>
    <p>
        Curso: {{$curso}}
    </p>

</footer>

</html>