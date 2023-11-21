<?php
/**
 * Esta clase va a consistier en un array de alumnos
 * -> Contendremos todos los métodos para la lógica de nuestro aplicativo
 */
class ArrayAlumnos
{
    private $table; // en este caso si vamos a encapsular los datos

    // implementamos constructor
    public function __construct(
        // inicializamos el array en el constructor
        $table = []
    ) { {
            $this->table = $table;
        }
    }
    /**
     * Implementamos los getter y setters
     */

    /**
     * Get the value of table
     */
    public function getTable()
    {
        return $this->table;
    }

    /**
     * Set the value of table
     */
    public function setTable($table): self
    {
        $this->table = $table;

        return $this;
    }

    /**
     * Implementamos los métodos estáticos
     * -> Obtenemos los cursos
     * -> Obtenemos las asignaturas
     */
    static public function getAsignaturas(){

        $asignaturas = [
            'Matemáticas',
            'Lengua Castellana',
            'Geografía',
            'Historia',
            'Historia del Arte',
            'Biología',
            'Griego y Latin',
            'Filosofía',
            'Lengua Inglesa',
            'Lengua Francesa',
            'TIC',
            
        ];

        asort($asignaturas);
        return $asignaturas;
    }

    static public function getCursos(){
        $cursos = [

            '1º ESO',
            '2º ESO',
            '3º ESO',
            '4º ESO',
            '1º Bachillerato',
            '2º Bachillerato',

        ] ;
        asort($cursos);
        return $cursos;
}

/**
 * Generamos los datos de la tabla
 */
public function getDatos(){

    // creamos un alumno y le asignamos valores
    $alumno = new Alumno(
        1,
        'David',
        'Gutiérrez Pérez',
        'david@email.es',
        987546325,
        0,
        [1,2,3,5,8]
    );
    // añadimos el alumno a la tabla
    $this->table [] = $alumno;

    $alumno = new Alumno(
        2, 'Laura', 'Martínez López', 'laura@email.es', 987546326, 1, [4, 6, 7, 9, 8]
    );
    // añadimos el alumno a la tabla
    $this->table [] = $alumno;

    $alumno = new Alumno(
        3, 'Carlos', 'Fernández Gómez', 'carlos@email.es', 987546327, 0, [5, 3, 6, 7, 9]
    );
    // añadimos el alumno a la tabla
    $this->table [] = $alumno;

    $alumno = new Alumno(
        4, 'Ana', 'Rodríguez Ruiz', 'ana@email.es', 987546328, 1, [8, 7, 5, 6, 9]
    );
    // añadimos el alumno a la tabla
    $this->table [] = $alumno;

    $alumno = new Alumno(
        5, 'Miguel', 'López Sánchez', 'miguel@email.es', 987546329, 0, [9, 8, 7, 6, 5]
    );
    // añadimos el alumno a la tabla
    $this->table [] = $alumno;

    $alumno = new Alumno(
        6, 'Carmen', 'Gómez Martínez', 'carmen@email.es', 987546330, 1, [3, 5, 8, 9, 7]
    );
    // añadimos el alumno a la tabla
    $this->table [] = $alumno;

    return $this->table;

}

/**
 * Vamos a necesitar otro método estático para mostrar un string con las asignaturas
 * -> Toma como entrada la tabla de asignaturas y las asignaturas de un alumno dado
 */
static public function mostrarAsignaturas($asignaturas, $asignaturasAlumno){
    // declaramos array vacío para almacenar los nombres de las asignaturas
    $listaAsignaturas = [];
    foreach($asignaturasAlumno as $indice){
        $listaAsignaturas [] = $asignaturas[$indice]; // igualamos a los valores de indices coincidentes
    }
    asort($listaAsignaturas); // ordenamos y retornamos el array transformado a string
    return implode(', ', $listaAsignaturas);
}

public function create(Alumno $date){

    $this->table [] = $date;

}

public function read($indice){
    
    return $this->table[$indice];
}



}
?>