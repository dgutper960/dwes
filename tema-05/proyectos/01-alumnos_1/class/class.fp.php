<?php


/**
 * class.fp.php
 * -> Métodos necesarios para la gestión de la BBDD fp
 * 
 * -> Solo métodos pertenecientes a la tabla Alumnos
 */

class Fp extends Conexion
{
    /*
    getAlumnos()
    -> Devuelve un objeto conjunto de resultados (mysql_results)
        con los detalles de todos los alumnos
    */
    public function getAlumnos()
    {

        $sql = "SELECT 
        alumnos.id,
        CONCAT_WS(', ', alumnos.apellidos, alumnos.nombre) AS alumno,
        alumnos.email,
        alumnos.telefono,
        alumnos.poblacion,
        alumnos.dni,
        TIMESTAMPDIFF(YEAR,
            alumnos.fechaNac,
            NOW()) AS edad,
        cursos.nombreCorto AS curso
    FROM
        alumnos
            INNER JOIN
        cursos ON alumnos.id_curso = cursos.id
    ORDER BY id";

    $query = $this->db->prepare($sql);
    }

}


?>