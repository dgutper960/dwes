<?php

    /*
        Clase Alumnos

        Métodos específicos para BBDD  Alumnos con las tablas
        - Alumnos
    */

    Class Alumnos extends Conexion {

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

        public function insert_curso(Curso $curso){

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
            }
            catch (PDOException $e) {

                include('views/partials/errorDB.php');
                exit();

            }
        }
    }

?>