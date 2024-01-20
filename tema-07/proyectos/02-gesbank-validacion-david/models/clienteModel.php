<?php

/**
 * 
 * clienteModel.php
 *     Definimos los métodos de acceso a la BBDD
 * -> Esta clase hereda de Model
 *      - Al no tener constructor propio hereda el del padre
 */

class clienteModel extends Model
{
    // Métodfo get() -> Obtiene los resultados de la tabla clientes
    public function get()
    {
        try {
            # Comando sql
            $sql = "SELECT 
            id, apellidos, nombre, telefono, ciudad, dni, email
        FROM
            clientes
        ORDER BY id";

            # Conectamos -> ejecuta el método connect() de db
            $conexion = $this->db->connect();

            # Ejecutamos el prepare
            $pdostmt = $conexion->prepare($sql); // resultado de la consulta = objeto pdostmt

            # bindParam no neceseario (solo se obtienen datos)

            # Establecemos el tipo de fetch como objeto
            $pdostmt->setFetchMode(PDO::FETCH_OBJ);

            # Ejecutamos
            $pdostmt->execute();

            # Retornamos
            return $pdostmt;

        } catch (PDOException $e) {
            include_once('template/partials/errorDB.php');
            exit();
            // Incluimos en el catch er fichero correspondiente
        }
    }

    // Método create() -> Permite la insersión de un nuevo cliente
    // - Entrada -> Objeto del tipo classCliente
    public function create(classCliente $data)
    {

        try {

            $sql = "INSERT INTO clientes (
                apellidos,
                nombre,
                telefono,
                ciudad,
                dni,
                email
                )VALUES(
                :apellidos,
                :nombre,
                :telefono,
                :ciudad,
                :dni,
                :email
                )";

            // creamos la conexión
            $conexion = $this->db->connect();

            // ejecutamos el prepare
            $pdostmt = $conexion->prepare($sql);

            // vinculamos los parámetos
            $pdostmt->bindParam(':apellidos', $data->apellidos, PDO::PARAM_STR);
            $pdostmt->bindParam(':nombre', $data->nombre, PDO::PARAM_STR);
            $pdostmt->bindParam(':telefono', $data->telefono, PDO::PARAM_INT);
            $pdostmt->bindParam(':ciudad', $data->ciudad, PDO::PARAM_STR);
            $pdostmt->bindParam(':dni', $data->dni, PDO::PARAM_STR);
            $pdostmt->bindParam(':email', $data->email, PDO::PARAM_STR);

            // ejecutamos -> Los datos son insertados en la BBDD
            $pdostmt->execute();

            // podemos cerrar la conexion pero no es necesario


        } catch (PDOException $e) {
            include_once('template/partials/errorDB.php');
            exit();
        }
    }

    // Método read() -> Obtiene un objeto de classCliente mediante id
    public function read($id_editar)
    {
        try {

            $sql = "SELECT 
            id, apellidos, nombre, telefono, ciudad, dni, email
        FROM
            clientes
        WHERE
            id = :id_editar";

            // conectamos 
            $conexion = $this->db->connect();

            // prepare
            $pdostmt = $conexion->prepare($sql);

            // vinculamos el parametro neceserio
            $pdostmt->bindParam(':id_editar', $id_editar, PDO::PARAM_INT);

            // establecemos el tipo de fetch
            $pdostmt->setFetchMode(PDO::FETCH_OBJ);

            // ejecutamos
            $pdostmt->execute();

            // retornamos 
            return $pdostmt->fetch();

        } catch (PDOException $e) {
            include_once('template/partials/errorDB.php');
            exit();
        }

    }

    // Método edit() -> Permite la edición de un cliente
    // - Entrada -> Objeto del tipo classCliente
    public function update(classCliente $data, int $id_editar)
    {

        try {

            $sql = "UPDATE clientes 
            SET 
                apellidos = :apellidos,
                nombre    = :nombre,
                telefono  = :telefono,
                ciudad    = :ciudad,
                dni       = :dni,
                email     = :email
            WHERE
                id = :id_editar";

            // creamos la conexión
            $conexion = $this->db->connect();

            // ejecutamos el prepare
            $pdostmt = $conexion->prepare($sql);

            // vinculamos los parámetos
            $pdostmt->bindParam(':apellidos', $data->apellidos, PDO::PARAM_STR);
            $pdostmt->bindParam(':nombre', $data->nombre, PDO::PARAM_STR);
            $pdostmt->bindParam(':telefono', $data->telefono, PDO::PARAM_INT);
            $pdostmt->bindParam(':ciudad', $data->ciudad, PDO::PARAM_STR);
            $pdostmt->bindParam(':dni', $data->dni, PDO::PARAM_STR);
            $pdostmt->bindParam(':email', $data->email, PDO::PARAM_STR);
            $pdostmt->bindParam(':id_editar', $id_editar, PDO::PARAM_INT); // id de la entrada

            // ejecutamos -> Los datos son insertados en la BBDD
            $pdostmt->execute();


            // podemos cerrar la conexion pero no es necesario

            // en caso de error SQL entraremos en este bloque
        } catch (PDOException $e) {
            include_once('template/partials/errorDB.php');
            exit();
        }
    }

    // Método delete() -> Borra un cliente mediante id
    public function delete($id_eliminar)
    {
        try {

            $sql = "DELETE
            FROM
                clientes
            WHERE
                id = :id_eliminar";

            // conectamos 
            $conexion = $this->db->connect();

            // prepare
            $pdostmt = $conexion->prepare($sql);

            // vinculamos el parametro neceserio
            $pdostmt->bindParam(':id_eliminar', $id_eliminar, PDO::PARAM_INT);

            // ejecutamos
            $pdostmt->execute();


        } catch (PDOException $e) {
            include_once('template/partials/errorDB.php');
            exit();
        }

    }

    // Método delete() -> Ordena los clientes mostrados medante un criterio de lista desplegable
    public function order(int $criterio)
    {
        try {

            # Comando sql
            $sql = "SELECT 
            id, apellidos, nombre, telefono, ciudad, dni, email
        FROM
            clientes
        ORDER BY :criterio";

            # Conectamos -> ejecuta el método connect() de db
            $conexion = $this->db->connect();

            # Ejecutamos el prepare
            $pdostmt = $conexion->prepare($sql); // resultado de la consulta = objeto pdostmt

            # bindParam para el criterio
            $pdostmt->bindParam(':criterio', $criterio, PDO::PARAM_INT);


            # Establecemos el tipo de fetch como objeto
            $pdostmt->setFetchMode(PDO::FETCH_OBJ);

            # Ejecutamos
            $pdostmt->execute();

            # Retornamos
            return $pdostmt;


        } catch (PDOException $e) {
            include_once('template/partials/errorDB.php');
            exit();
        }

    }

        // Método filter() -> filtra los clientes mostrados mediante expresión del usuario
        public function filter($expresion)
        {
            $expresion = '%'.$expresion.'%';
            try {
    
                # Comando sql
                $sql = "SELECT 
                id, apellidos, nombre, telefono, ciudad, dni, email
            FROM
                clientes
            WHERE
                CONCAT_WS(' ',
                        clientes.id,
                        clientes.apellidos,
                        clientes.nombre,
                        clientes.telefono,
                        clientes.ciudad,
                        clientes.dni,
                        clientes.email) LIKE :expresion";
    
                # Conectamos -> ejecuta el método connect() de db
                $conexion = $this->db->connect();
    
                # Ejecutamos el prepare
                $pdostmt = $conexion->prepare($sql); // resultado de la consulta = objeto pdostmt
    
                # bindParam para el criterio
                $pdostmt->bindParam(':expresion', $expresion, PDO::PARAM_STR);
    
    
                # Establecemos el tipo de fetch como objeto
                $pdostmt->setFetchMode(PDO::FETCH_OBJ);
    
                # Ejecutamos
                $pdostmt->execute();
    
                # Retornamos
                return $pdostmt;
    
    
            } catch (PDOException $e) {
                include_once('template/partials/errorDB.php');
                exit();
            }
    
        }


}
/**
 * 
 */
?>