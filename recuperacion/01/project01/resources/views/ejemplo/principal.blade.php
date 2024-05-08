<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejemplo de vista en Laravel</title>
</head>

<body>

    <h1>Titulo de la vista</h1>
    <!-- Mostramos las variables definidas en el controlador como array -->
    <h3>
        <!-- La directiva blade, escapa el contenido de la variable por defecto -->
        {{ $nombre }}
    </h3>
    <h3>
        <!-- Mostramos el valor sin escapar -->
        {!! $curso !!} 
    </h3>
    <hr>
    <p>
        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Similique odio praesentium rem expedita exercitationem
        voluptatum tenetur modi explicabo, hic in eaque sed quod ipsa, aperiam, deleniti fugit quasi incidunt error.
    </p>
    <!-- mostramos el contenido del array -->
    <table>
        @if(isset($asignaturas))

            <!-- Usando la directiva forelse de Laravel -->
            @forelse($asignaturas as $asignatura)
                <tr>
                    <td>
                        {{$asignatura}}
                    </td>
                </tr>
            @empty
                <h3>El array está bacio</h3>
            @endforelse
        @else
            <h3>No existen asignaturas</h3>
        @endif
    </table>

</body>

</html>