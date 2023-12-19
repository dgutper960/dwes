<!-- Uso de nomenclatura camelCase para nombre del fichero de forma obligatoria -->
<?php

/**
 * alumnosModel.php
 * 
 * Modelo del constructor alumnos
 * 
 * Definir los métodos de acceso a la BBDD
 *  - insert
 *  - update
 *  - select
 *  - delete
 *  - etc
 */

/** Uso de camelCase obligatorio */
/** Extends de Model que está en libs */
class alumnoModel extends Model
{


    /*No necesitamos constructor*/

    public function get()
    {

        try {

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
         cursos.nombreCorto AS curso /** Los campos calculados requieren alias */
     FROM 
         alumnos
             INNER JOIN
         cursos ON alumnos.id_curso = cursos.id
     ORDER BY id";

            # Conectamos con la BBDD
            // bd = objeto de la clase DataBase (tiene la conexion)
            $conexion = $this->db->connect();

            # ejecutamos mediante prepare
            $pdostmt = $conexion->prepare($sql);

            # Establecemos el fetch como objeto
            $pdostmt->setFetchMode(PDO::FETCH_OBJ);

            # Ejecutamos
            $pdostmt->execute();

            # Retornamos
            return $pdostmt;

        } catch (PDOException $e) {
            include('template/partials/errorDB.php');
            exit();
        }


    }

    public function create(classAlumno $alumno)
    {

        try {
            $sql = 'INSERT INTO alumnos (
                nombre,
                apellidos,
                email,
                telefono,
                poblacion,
                dni,
                fechaNac,
                id_curso
            )VALUES(
                :nombre,
                :apellidos,
                :email,
                :telefono,
                :poblacion,
                :dni,
                :fechaNac,
                :id_curso
            )';

            $conexion = $this->db->connect();

            $pdoSt = $conexion->prepare($sql);

            $pdoSt->bindParam('nombre', $alumno->nombre, PDO::PARAM_STR);
            $pdoSt->bindParam('apellidos', $alumno->apellidos, PDO::PARAM_STR);
            $pdoSt->bindParam('email', $alumno->email, PDO::PARAM_STR);
            $pdoSt->bindParam('telefono', $alumno->telefono, PDO::PARAM_STR);
            $pdoSt->bindParam('poblacion', $alumno->poblacion, PDO::PARAM_STR);
            $pdoSt->bindParam('dni', $alumno->dni, PDO::PARAM_STR);
            $pdoSt->bindParam('fechaNac', $alumno->fechaNac, PDO::PARAM_STR);
            $pdoSt->bindParam('id_curso', $alumno->id_curso, PDO::PARAM_STR);

            $pdoSt->execute();

        } catch (PDOException $e) {
            include('template/partials/errorDB.php');
            exit();
        }
    }

    /**
     * Metodo editar
     * - Edita alumno mediante id como entrada
     */
    public function edit(int $id){

        try {

            $sql = 'SELECT * FROM alumnos';

            $conexion = $this->db->connect();

            $pdoSt = $conexion->prepare($sql);

            $pdoSt->execute();

            $pdoSt->setFetchMode(PDO::FETCH_OBJ);

        }catch (PDOException $e) {
            include('template/partials/errorDB.php');
            exit();
        }
    }

}
?>