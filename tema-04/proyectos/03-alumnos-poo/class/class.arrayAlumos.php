<?php

/*
    class.arrayAlumnos.php
    -> Simula la tabla alumnos
    -> Cada elemento es un objeto de alumno
*/

class ArrayAlumnos
{

    private $tabla;

    public function __construct(
        $tabla = []
    ) {
        // solo inicializa el array
        $this->tabla = $tabla;
    }

    /**
     * GETTERS Y SETTERS
     */
    /**
     * @return mixed
     */
    public function getTabla()
    {
        return $this->tabla;
    }

    /**
     * @param mixed $tabla 
     * @return self
     */
    public function setTabla($tabla): self
    {
        $this->tabla = $tabla;
        return $this;
    }

    # Cogemos el 
    static public function getAsignaturas()
    {
        $asignaturas = [
            'Base de Datos',
            'Entornos de Desarrollo',
            'FOL',
            'Lenguaaje de Marcas y Sistemas de Gestión de la Información',
            'Programación',
            'Sistemas Informáticos',
            'Desarrollo Web Entorno Cliente',
            'Desarrollo Web Entorno Servidor',
            'Despliegue de Aplicaciones Web',
            'Horas de Libre Configuración',
            'Diseño de Interfaces Web'

        ];
        // Ordenamos el array, manteniendo la asociación de indices
        asort($asignaturas);
        return $asignaturas;
    }

    static public function getCursos()
    {
        $cursos = [
            '1SMR',
            '2SMR',
            '1DAW',
            '2DAW',
            '1ADI',
            '2ADI'

        ];
        // Ordenamos el array, manteniendo la asociación de indices
        asort($cursos);
        return $cursos;
    }

    /**
     * Simula un acceso a una BBDD -> retorna un array de objetos
     */
    public function getDatos()
    {

        $tabla = [];

        $alumno = new Alumno(

            # Articulo 1

            1,
            'Juan Manuel',
            'Herrera Ramírez',
            'jmherrera@gmail.com',
            '06/03/2002',
            2,
            [3, 4, 7]

        );

        # Añadimos el objeto a la tabla
        $this->tabla[] = $alumno;

        $alumno = new Alumno(

            # Articulo 1

            1,
            'David',
            'Gutiérrez Pérez',
            'jmherrera@gmail.com',
            '06/03/2002',
            2,
            [3, 4, 7]

        );

        # Añadimos el objeto a la tabla
        $this->tabla[] = $articulo;

        $articulo = new Articulo(

            # Articulo 3

            3,
            'Teclado mecánico Logitech G Pro',
            'G Pro X',
            5,
            [0, 0, 4],
            20,
            129.99

        );

        # Añadimos el objeto a la tabla
        $this->tabla[] = $articulo;

        $articulo = new Articulo(

            # Articulo 4

            4,
            'Mouse inalámbrico Logitech MX Master 3',
            'MX Master 3',
            3,
            [0, 2, 3],
            25,
            99.99

        );

        # Añadimos el objeto a la tabla
        $this->tabla[] = $articulo;

        $articulo = new Articulo(

            # Articulo 5

            5,
            'Smartphone Samsung Galaxy S21',
            'S21',
            2,
            [1, 1, 2],
            30,
            699.99

        );


        /* $alumno = new Alumno(
            2,
            'Pablo',
            'Mateos Palas',
            'pmatpal0105@g.educaand.es',
            '01/05/2004',
            3,
            [3, 7, 8]
        );
de Téllez Perdigones, Antonio Jesús a todos:    2:55 PM
$alumno = new Alumno(
                2,
                'Antonio Jesús',
                'Téllez Perdigones',
                'atelper@gmail.com',
                '10/05/1999',
                2,
                [6, 7, 8]
            );
de Revilla Roiz, Miguel Ángel a todos:    2:55 PM
        $articulo = new Alumno(
            1,
            'Juan Maria',
            'Mateos Ponce',
            'jmherrera@gmail.com',
            '20/10/2004',
            4,
            [6, 7, 8]
        );
de Coronil Villalba, Jorge a todos:    2:55 PM
        $alumno = new Alumno(
            1,
            'Jorge',
            'Coronil Villalba',
            'jcorvil600@gmail.com',
            '17/04/1997',
            3,
            [6, 7, 8],

        );
        #Añadir articulo a la tabla
        $this->tabla[] = $alumno;
de Herrera Ramírez, Juan Manuel a todos:    2:55 PM
           $alumno = new Alumno(
                1,
                "Juan Manuel",
                "Herrera Ramírez",
                'jmherrera@gmail.com',
                '06/03/2002',
                2,
                [3,1,4,2]
            );
de González Romero, Diego a todos:    2:55 PM
$alumno = new Alumno(
            2,
            'Diego',
            'González Romero',
            'diegogonzalezromero@gmail.com',
            '28/03/2001',
            3,
            [6,7,8]
        );
de Merino Gamaza, Adrián a todos:    2:56 PM
$alumno = new Alumno(
            1,
            'Adrián',
            'Merino Gamaza',
            'aamergam@g.educand.es',
            '10/12/2002',
            2,
            [6, 7, 8]
        );
de Rodríguez Santos, Daniel Alfonso a todos:    2:56 PM
$alumno1= new Alumno(1,'Daniel Alfonso','Rodríguez Santos','darancuga@gmail.com','27/08/1999',2,[0,1,5]);
        $this->tabla[] = $alumno1;
de Moreno Cantea, Ricardo Gabriel a todos:    2:57 PM
$alumno = new Alumno(1, 'Ricardo', 'Moreno Cantea', 'rmorcan@g.educaand.es', '13/05/2004', 3, [6, 7, 8]);
de León Canto, Jonathan a todos:    2:57 PM
        $alumno = new Alumno(
            2,
            'Jonathan',
            'León Canto',
            'jleocan773@g.educaand.es',
            '19/06/2000',
            3,
            [6,7,8]
        );
de Muñoz Pérez, Juan Jesús a todos:    2:58 PM
 #Alumno 2
        $articulo = new Articulo(
            2,
            'Juan Jesus',
            'Muñoz Perez',
            'jjmunper@gmail.com',
            '06/03/2000',
            2,
            [3,2,4]
        );
de Asensio Willemsen, Marco a todos:    2:59 PM
$alumno = new Alumno( 97, 'Julian', 'Garcia Velazquez', 'jgarvel076@g.educaand.es', '01/12/2004', 2, [3, 7, 8] );
         */

        # Añadimos el objeto a la tabla
        $this->tabla[] = $articulo;

        return $tabla;
    }

       /** Metodo create() */

    public function create(Articulo $data){ /** toma como entrada un array del tipo Articulos */
        // añadimos el nuevo elemento en la tabla
        $this->tabla[] = $data;
    } 

    public function update(Articulo $data, $indice) { /** ES IMPORTANTE QUE SE RECIBA UN OBJETO ARTICULO */
        // toma un indice y modifica los valores en la tabla de ese indice
        $this->tabla[$indice] = $data; /** MACHACAMOS EL ARTICULO ENTERO */
    }

    /** Metodo delete() */
    public function delete($indice){
        // eliminamos el objeto correspondiente a ese id
        unset($this->tabla[$indice]);
        // ordenamos la tabla -> Al ser un array hay que eliminar los huecos
        array_values($this->tabla);
    } 

    /** 
     * podemos declararlo como estatico porque no modifica ningun atributo de la clase  
     * */
    static public function mostrarasignaturas($asignaturas, $asignaturasArticulos){

        $arrayasignaturas = [];
        foreach($asignaturasArticulos as $indice){
            $arrayasignaturas[]=$asignaturas[$indice];
        }
        asort($arrayasignaturas);
        return $arrayasignaturas;

    }

    public function read($indice){
        // retornamos los valores de ese indice en la tabla de la clase
        return $this->tabla[$indice]; 
    }

    
    /**
     * La idea es convertir el objeto en un array indexado
     */
    public function order(){


    }
    



}


?>