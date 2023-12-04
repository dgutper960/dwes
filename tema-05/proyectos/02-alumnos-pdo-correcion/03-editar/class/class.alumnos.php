<?php

/*
    Clase Alumnos

    Métodos específicos para BBDD  Alumnos con las tablas
    - Alumnos
*/

class Alumnos extends Conexion
{

    /**
     * Devuelve un objeto 
     */
    public function getAlumnos()
    {
        /** vamos a sql workbench y probamos el comando para verificar que funciona */
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

        # ejecutamos el prepare -> objeto de la clase pdostatament
        $pdostsmt = $this->pdo->prepare($sql);
        // no requerimos bingparam porque es solo consulta

        # Establezco tipo de fetch
        $pdostsmt->setFetchMode(PDO::FETCH_OBJ); // extrae cada elemento como un objeto

        # Ejecuto
        $pdostsmt->execute(); //-> en este momento es de la clase pdoresult

        # Devuelvo objeto clase pdoresult
        return $pdostsmt;

    }


    public function getCursos()
    {
        /** vamos a sql workbench y probamos el comando para verificar que funciona */
        $sql = "SELECT id, nombreCorto as curso FROM cursos order by id;";

        # ejecutamos el prepare -> objeto de la clase pdostatament
        $pdostsmt = $this->pdo->prepare($sql);
        // no requerimos bingparam porque es solo consulta

        # Establezco tipo de fetch
        $pdostsmt->setFetchMode(PDO::FETCH_ASSOC); // extrae cada elemento como un objeto

        # Ejecuto
        $pdostsmt->execute(); //-> en este momento es de la clase pdoresult

        # Devuelvo objeto clase pdoresult
        return $pdostsmt;

    }

    public function insert_curso(Curso $curso)
    {

        try {

            # Prepare o plantilla sql
            $sql = "
                    INSERT INTO Cursos (
                        nombre,
                        ciclo,
                        nombreCorto,
                        nivel
                    ) VALUES (
                        :nombre,
                        :ciclo,
                        :nombreCorto,
                        :nivel
                    )
                
                ";

            # objeto de clase PDOStatement
            $pdostmt = $this->pdo->prepare($sql);

            # Vincular los parámetros con valores
            $pdostmt->bindParam(':nombre', $curso->nombre, PDO::PARAM_STR, 50);
            $pdostmt->bindParam(':ciclo', $curso->ciclo, PDO::PARAM_STR, 50);
            $pdostmt->bindParam(':nombreCorto', $curso->nombreCorto, PDO::PARAM_STR, 4);
            $pdostmt->bindParam(':nivel', $curso->nivel, PDO::PARAM_INT, 1);

            #ejecutamos sql
            $pdostmt->execute();

            # liberamos objeto 
            $pdostmt = null;

            # cerramos conexión
            $this->pdo = null;
        } catch (PDOException $e) {

            include('views/partials/errorDB.php');
            exit();

        }
    }
    /**
     * Función para insertar un alumno
     */

    public function insert_alumno(Alumno $alumno)
    {

        try {

            # Prepare o plantilla sql
            $sql = "
                    INSERT INTO Alumnos VALUES (
                        null,
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
                        :id_curso
                    )";

            # objeto de clase PDOStatement
            $pdostmt = $this->pdo->prepare($sql);

            # Vincular los parámetros con valores
            $pdostmt->bindParam(':nombre', $alumno->nombre, PDO::PARAM_STR, 30);
            $pdostmt->bindParam(':apellidos', $alumno->apellidos, PDO::PARAM_STR, 50);
            $pdostmt->bindParam(':email', $alumno->email, PDO::PARAM_STR, 50);
            $pdostmt->bindParam(':telefono', $alumno->telefono, PDO::PARAM_STR, 9);
            $pdostmt->bindParam(':direccion', $alumno->direccion, PDO::PARAM_STR, 30);
            $pdostmt->bindParam(':poblacion', $alumno->poblacion, PDO::PARAM_STR, 30);
            $pdostmt->bindParam(':provincia', $alumno->provincia, PDO::PARAM_STR, 30);
            $pdostmt->bindParam(':nacionalidad', $alumno->nacionalidad, PDO::PARAM_STR, 30);
            $pdostmt->bindParam(':dni', $alumno->dni, PDO::PARAM_STR, 9);
            $pdostmt->bindParam(':fechaNac', $alumno->fechaNac);
            $pdostmt->bindParam(':id_curso', $alumno->id_curso, PDO::PARAM_INT);

            #ejecutamos sql
            $pdostmt->execute();

            # liberamos objeto 
            $pdostmt = null;

            # cerramos conexión
            $this->pdo = null;
        } catch (PDOException $e) {

            include('views/partials/errorDB.php');
            exit();

        }
    }
    /**
     * Funcion para buscar un alumno
     */
    public function read_alumno($id)
    {
        try {

            $sql = "SELECT * FROM alumnos WHERE id = :id LIMIT 1";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();

            $data = $stmt->fetch(PDO::FETCH_OBJ);

            if (!$data) {
                throw new Exception('Alumno No Encontrado');
            }

            return $data;
        } catch (Exception $e) {
            include('views/partials/errorDB.php');
            exit();
        }
    }


    /**
     * Funcion para editar un alumno
     */
    public function update_alumno(Alumno $alumno, $id)
    {

        try {
            # Prepare the SQL statement
            $sql = "
                UPDATE Alumnos SET
                    nombre = :nombre,
                    apellidos = :apellidos,
                    email = :email,
                    telefono = :telefono,
                    direccion = :direccion,
                    poblacion = :poblacion,
                    provincia = :provincia,
                    nacionalidad = :nacionalidad,
                    dni = :dni,
                    fechaNac = :fechaNac,
                    id_curso = :id_curso
                WHERE id = :id";

            # Create a PDOStatement object
            $pdostmt = $this->pdo->prepare($sql);

            # Bind the parameters with values
            $pdostmt->bindParam(':nombre', $alumno->nombre, PDO::PARAM_STR, 30);
            $pdostmt->bindParam(':apellidos', $alumno->apellidos, PDO::PARAM_STR, 50);
            $pdostmt->bindParam(':email', $alumno->email, PDO::PARAM_STR, 50);
            $pdostmt->bindParam(':telefono', $alumno->telefono, PDO::PARAM_STR, 9);
            $pdostmt->bindParam(':direccion', $alumno->direccion, PDO::PARAM_STR, 30);
            $pdostmt->bindParam(':poblacion', $alumno->poblacion, PDO::PARAM_STR, 30);
            $pdostmt->bindParam(':provincia', $alumno->provincia, PDO::PARAM_STR, 30);
            $pdostmt->bindParam(':nacionalidad', $alumno->nacionalidad, PDO::PARAM_STR, 30);
            $pdostmt->bindParam(':dni', $alumno->dni, PDO::PARAM_STR, 9);
            $pdostmt->bindParam(':fechaNac', $alumno->fechaNac);
            $pdostmt->bindParam(':id_curso', $alumno->id_curso, PDO::PARAM_INT);
            $pdostmt->bindParam(':id', $id, PDO::PARAM_INT); // SE NECESITA EL id DEL ALUMNO A EDITAR PARA EL WHERE

            # Execute the SQL statement
            $pdostmt->execute();

            # Free the PDOStatement object
            $pdostmt = null;

            # Close the connection
            $this->pdo = null;
        } catch (PDOException $e) {
            include('views/partials/errorDB.php');
            exit();
        }
    }
}

?>