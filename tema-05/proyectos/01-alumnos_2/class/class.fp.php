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
            NOW()) AS edad, /** en este caso edad sería la propiedad del objeto */
        cursos.nombreCorto AS curso
    FROM
        alumnos
            INNER JOIN
        cursos ON alumnos.id_curso = cursos.id
    ORDER BY id";
/**
 * Esta opcion no recomendable por motivos de seguridad
 * -> Solo válida cuando no prima la seguridad
 */
    // $result = $this->db->query($sql);
    // return $result;
    // }

// objeto de la clase mysqli_stmt
$stmt = $this->db->prepare($sql);
// ejecuto
$stmt->execute();

// objeto de la clase mysql_result
$result = $stmt->get_result();

return $result;



}


?>