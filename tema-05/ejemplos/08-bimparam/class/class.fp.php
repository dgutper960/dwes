<?php

/**
 * Clase Fp
 * Métodos específicos para BBDD fp con las tablas
 * - Alumnos
 * - Cursos
 */

 // hereda tolos los atributos y métodos de constructor
 Class Fp extends Conexion{

    public function insert_curso(Curso $curso){ // se espera un objeto Curso

      try{
         # Prepare o plantilla sql
         $sql = "
         INSERT INTO cursos(
            nombre,
            ciclo,
            nombreCorto,
            nivel
            )VALUES(
            :nombre,
            :ciclo,
            :nombreCorto,
            :nivel
         )
         ";
         //Objeto de la clase PDOStatament 
         //puedo usar la propiedad prepare porque hereda de conexión
         $pdostmt = $this->pdo->prepare($sql);

         # Vinculamos los parametros con los valores
         // el id no será introducido por lo que su valor es null y el SGBD lo autoincrementa
         $pdostmt->bindParam(':nombre', $curso->nombre, PDO::PARAM_STR, 50);
         $pdostmt->bindParam(':ciclo', $curso->ciclo, PDO::PARAM_STR, 50);
         $pdostmt->bindParam(':nombreCorto', $curso->nombreCorto, PDO::PARAM_STR, 4);
         $pdostmt->bindParam(':nivel', $curso->nivel, PDO::PARAM_STR, 1);


         # Ejecutamos sql
         $pdostmt->execute();

         
         # Liberamos espacio
         $pdostmt = null;

         # Cerramos conexión (método de la clase conexión)
         $this->pdo = null;
      }
      catch(PDOException $e){
         include("views/partials/errorDB.php");
         exit();
      }

    }
 }


?>