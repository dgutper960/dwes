<?php

/**
 * 
 *  alumnoModel.php
 * 
 * Modelo del controlador alumnos
 * Definimos los métodos de acceso a la base de datos
 *  - Insert
 *  - Update
 *  - Select
 *  - Delete
 *  - etc...
 */
class alumnoModel extends Model
{
    /**
     * Extrae los detalles de los alumnos
     */
    public function get()
    {
        try {
            // Creamos la consulta
            $sql = "SELECT 
    alumnos.id,
    CONCAT_WS(', ', alumnos.apellidos, alumnos.nombre) AS nombre,
    alumnos.email,
    alumnos.telefono,
    alumnos.poblacion,
    alumnos.dni,
    TIMESTAMPDIFF(YEAR,
        alumnos.fechaNac,
        NOW()) AS edad,
    cursos.nombreCorto AS curso
FROM
    fp.alumnos
        INNER JOIN
    cursos ON alumnos.id_curso = cursos.id
ORDER BY id";

            // Conectamos con la base de datos
            // $this->db es un objeto de la clase database
            // Ejecutamos el  método connecto de esa clase
            $conexion = $this->db->connect();

            // Preparamos la consulta
            $pdostmt = $conexion->prepare($sql);

            // Establecemos el tipo de fetch
            $pdostmt->setFetchMode(PDO::FETCH_OBJ);

            // Ejecutamos la consulta
            $pdostmt->execute();

            // Devolvemos el objeto de tipo PDOStatement
            return $pdostmt;
        } catch (PDOException $e) {
            include 'template/partials/errorDB.php';
            exit();
        }
    }
    /**
     * Método getCursos()
     * Obtenemos todos los cursos
     */
    public function getCursos()
    {
        try {
            // Creamos la consulta
            $sql = "SELECT
                id,
                nombreCorto curso
                FROM fp.cursos
                ORDER BY nombreCorto ";

            // Conectamos con la base de datos
            // $this->db es un objeto de la clase database
            // Ejecutamos el  método connecto de esa clase
            $conexion = $this->db->connect();

            // Preparamos la consulta
            $pdostmt = $conexion->prepare($sql);

            // Establecemos el tipo de fetch
            $pdostmt->setFetchMode(PDO::FETCH_OBJ);

            // Ejecutamos la consulta
            $pdostmt->execute();

            // Devolvemos el objeto de tipo PDOStatement
            return $pdostmt;

        } catch (PDOException $e) {
            include 'template/partials/errorDB.php';
            exit();
        }
    }

    /**
     * Método Create(classAlumno $alumno)
     * Insertamos el nuevo alumno a la base de datos
     */
    public function create(classAlumno $alumno)
    {
        try {
            // Creamos la consulta a ejecutar
            $sql = "INSERT INTO fp.alumnos (nombre, 
            apellidos, 
            email, 
            telefono, 
            direccion, 
            poblacion, 
            provincia, 
            nacionalidad, 
            dni, 
            fechaNac, 
            id_curso) VALUES (
                :nombre, 
                :apellidos, 
                :email, 
                :telefono, 
                :direccion, 
                :poblacion, 
                :provincia, 
                :nacionalidad, 
                :dni, 
                :fechaNac, 
                :id_curso)";

            // Preparamos la consulta
            $conexion = $this->db->connect();

            $pdostmt = $conexion->prepare($sql);

            // Vinculamos las variables
            $pdostmt->bindParam(':nombre', $alumno->nombre,PDO::PARAM_STR,30);
            $pdostmt->bindParam(':apellidos', $alumno->apellidos,PDO::PARAM_STR,50);
            $pdostmt->bindParam(':email', $alumno->email,PDO::PARAM_STR,50);
            $pdostmt->bindParam(':telefono', $alumno->telefono,PDO::PARAM_INT);
            $pdostmt->bindParam(':direccion', $alumno->direccion,PDO::PARAM_STR,60);
            $pdostmt->bindParam(':poblacion', $alumno->poblacion,PDO::PARAM_STR,30);
            $pdostmt->bindParam(':provincia', $alumno->provincia,PDO::PARAM_STR,20);
            $pdostmt->bindParam(':nacionalidad', $alumno->nacionalidad);
            $pdostmt->bindParam(':dni', $alumno->dni);
            $pdostmt->bindParam(':fechaNac', $alumno->fechaNac);
            $pdostmt->bindParam(':id_curso', $alumno->id_curso,PDO::PARAM_INT);
            
            // Ejecutamos la sentencia
            $pdostmt->execute();
        } catch (PDOException $e) {
            include 'template/partials/errorDB.php';
            exit();
        }
    }
}
?>