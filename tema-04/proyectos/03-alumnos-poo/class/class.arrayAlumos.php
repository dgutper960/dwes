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
        # creamos un nuevo objeto
        $alumno = new Alumno(
            
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

        # creamos un nuevo objeto
        $alumno = new Alumno(

            2,
            'David',
            'Gutiérrez Pérez',
            'davgutierrez@gmail.com',
            '28/10/1984',
            2,
            [3, 4, 7]

        );
        # Añadimos el objeto a la tabla
        $this->tabla[] = $alumno;

        $alumno = new Alumno(
            3,
            'Pablo',
            'Mateos Palas',
            'pmatpal0105@g.educaand.es',
            '01/05/2004',
            2,
            [3, 7, 8]
        );  
        $this->tabla[] = $alumno;

        $alumno = new Alumno(
            4,
            'Antonio Jesús',
            'Téllez Perdigones',
            'atelper@gmail.com',
            '10/05/1999',
            2,
            [6, 7, 8]
        );
        $this->tabla[] = $alumno;

        $alumno = new Alumno(

            5,
            'Juan Maria',
            'Mateos Ponce',
            'jmaria@gmail.com',
            '20/10/2004',
            2,
            [6, 7, 8]
        );
        $this->tabla[] = $alumno;

        $alumno = new Alumno(
            6,
            'Jorge',
            'Coronil Villalba',
            'jcorvil600@gmail.com',
            '17/04/1997',
            3,
            [6, 7, 8],

        );
        #Añadir articulo a la tabla
        $this->tabla[] = $alumno;

        $alumno = new Alumno(
            7,
            'Diego',
            'González Romero',
            'diegogonzalezromero@gmail.com',
            '28/03/2001',
            3,
            [6,7,8]
        );
        $this->tabla[] = $alumno;   

        $alumno = new Alumno(
            8,
            'Adrián',
            'Merino Gamaza',
            'aamergam@g.educand.es',
            '10/12/2002',
            2,
            [6, 7, 8]
        );
        $this->tabla[] = $alumno;   

        $alumno = new Alumno(
            9,
            'Jonathan',
            'León Canto',
            'jleocan773@g.educaand.es',
            '19/06/2000',
            3,
            [6,7,8]
        );
        $this->tabla[] = $alumno;

        $alumno = new Alumno(
            10,
            'Juan Jesus',
            'Muñoz Perez',
            'jjmunper@gmail.com',
            '06/03/2000',
            2,
            [3,2,4]
        );
        $this->tabla[] = $alumno;

        return $tabla;
    }

    /** Metodo create() */

    public function create(Alumno $data)
    { /** toma como entrada un array del tipo Alumnos */
        // añadimos el nuevo elemento en la tabla
        $this->tabla[] = $data;
    }

    public function update(Alumno $data, $indice)
    { /** ES IMPORTANTE QUE SE RECIBA UN OBJETO ARTICULO */
        // toma un indice y modifica los valores en la tabla de ese indice
        $this->tabla[$indice] = $data; /** MACHACAMOS EL ARTICULO ENTERO */
    }

    /** Metodo delete() */
    public function delete($indice)
    {
        // eliminamos el objeto correspondiente a ese id
        unset($this->tabla[$indice]);
        // ordenamos la tabla -> Al ser un array hay que eliminar los huecos
        array_values($this->tabla);
    }

    /** 
     * podemos declararlo como estatico porque no modifica ningun atributo de la clase  
     * */
    static public function mostrarAsignaturas($asignaturas, $asignaturasAlumno)
    {

        $arrayAsignaturas = [];
        foreach ($asignaturasAlumno as $indice) {
            $arrayAsignaturas[] = $asignaturas[$indice];
        }
        asort($arrayAsignaturas);
        return $arrayAsignaturas;

    }

    public function read($indice)
    {
        // retornamos los valores de ese indice en la tabla de la clase
        return $this->tabla[$indice];
    }


    /**
     * La idea es convertir el objeto en un array indexado
     */
    public function order()
    {


    }

}


?>