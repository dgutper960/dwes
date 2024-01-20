<?php

/**
 * 
 * clienteModel.php
 *     Definimos los métodos de acceso a la BBDD
 * -> Esta clase hereda de Model
 *      - Al no tener constructor propio hereda el del padre
 */

class cuentaModel extends Model
{
    // Métodfo get() -> Obtiene los resultados de la tabla cuentas
    public function get()
    {
        try {
            # Comando sql
            $sql = "SELECT 
            cuentas.id,
            cuentas.num_cuenta,
            clientes.nombre,
            clientes.apellidos,
            cuentas.fecha_alta,
            cuentas.fecha_ul_mov,
            cuentas.num_movtos,
            cuentas.saldo
        FROM
            cuentas
                INNER JOIN
            clientes ON id_cliente = clientes.id";

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

    // Métodfo get() -> Obtiene los resultados de la tabla cuentas
    public function getCustomerName()
    {
        try {
            # Comando sql
            $sql = "SELECT 
            id,
            CONCAT_WS(' ',
            clientes.nombre,
            clientes.apellidos) AS cliente
        FROM
            clientes";

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
    public function create(classCuenta $data)
    {

        try {

            $sql = "INSERT INTO cuentas (
                num_cuenta,
                id_cliente,
                fecha_alta,
                fecha_ul_mov,
                num_movtos,
                saldo
                )VALUES(
                :num_cuenta,
                :id_cliente,
                NOW(),
                NOW(),
                1,
                :saldo
                )";

            // creamos la conexión
            $conexion = $this->db->connect();

            // ejecutamos el prepare
            $pdostmt = $conexion->prepare($sql);

            // vinculamos los parámetos
            $pdostmt->bindParam(':num_cuenta', $data->num_cuenta);
            $pdostmt->bindParam(':id_cliente', $data->id_cliente);
            $pdostmt->bindParam(':saldo', $data->saldo);


            // ejecutamos -> Los datos son insertados en la BBDD
            $pdostmt->execute();

            // podemos cerrar la conexion pero no es necesario


        } catch (PDOException $e) {
            include_once('template/partials/error.php');
            exit();
        }
    }

    // Método read() -> Obtiene un objeto de classCuenta mediante id
    public function read($id_editar)
    {
        try {

            $sql = "SELECT 
            cuentas.id,
            cuentas.num_cuenta,
            CONCAT_WS(' ', clientes.apellidos, clientes.nombre) AS cliente,
            cuentas.fecha_alta,
            cuentas.fecha_ul_mov,
            cuentas.num_movtos,
            cuentas.saldo
        FROM
            cuentas
                INNER JOIN
            clientes ON cuentas.id_cliente = clientes.id
        WHERE
            clientes.id = :id_editar";

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
            include_once('template/partials/error.php');
            exit();
        }

    }

    // Método edit() -> Permite la edición de un cliente
    // - Entrada -> Objeto del tipo classCliente
    public function update(classCuenta $data, int $id_editar)
    {

        try {

            $sql = "UPDATE cuentas 
            SET 
                num_cuenta = :num_cuenta,
                fecha_alta    = :fecha_alta,
                fecha_ul_mov  = :fecha_ul_mov,
                num_movtos    = :num_movtos,
                saldo       = :saldo

            WHERE
                id = :id_editar";

            // creamos la conexión
            $conexion = $this->db->connect();

            // ejecutamos el prepare
            $pdostmt = $conexion->prepare($sql);

            // vinculamos los parámetos
            $pdostmt->bindParam(':num_cuenta', $data->num_cuenta);
            $pdostmt->bindParam(':fecha_alta', $data->fecha_alta);
            $pdostmt->bindParam(':fecha_ul_mov', $data->fecha_ul_mov);
            $pdostmt->bindParam(':num_movtos', $data->num_movtos);
            $pdostmt->bindParam(':saldo', $data->saldo);
            $pdostmt->bindParam(':id_editar', $id_editar, PDO::PARAM_INT); // id de la entrada

            // ejecutamos -> Los datos son insertados en la BBDD
            $pdostmt->execute();


            // podemos cerrar la conexion pero no es necesario

            // en caso de error SQL entraremos en este bloque
        } catch (PDOException $e) {
            include_once('template/partials/error.php');
            exit();
        }
    }

    // Método delete() -> Borra un cliente mediante id
    public function delete($id_eliminar)
    {
        try {

            $sql = "DELETE
            FROM
                cuentas
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

    // Método delete() -> Ordena los cuentas mostrados medante un criterio de lista desplegable
    public function order(int $criterio)
    {
        try {

            # Comando sql
            $sql = "SELECT 
            cuentas.id,
            cuentas.num_cuenta,
            clientes.nombre,
            clientes.apellidos,
            cuentas.fecha_alta,
            cuentas.fecha_ul_mov,
            cuentas.num_movtos,
            cuentas.saldo
        FROM
            cuentas
                INNER JOIN
            clientes ON id_cliente = clientes.id
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

        // Método filter() -> filtra los cuentas mostrados mediante expresión del usuario
        public function filter($expresion)
        {
            $expresion = '%'.$expresion.'%';
            try {
    
                # Comando sql
                $sql = "SELECT 
                cuentas.id,
                cuentas.num_cuenta,
                clientes.nombre,
                clientes.apellidos,
                cuentas.fecha_alta,
                cuentas.fecha_ul_mov,
                cuentas.num_movtos,
                cuentas.saldo
            FROM
                cuentas
                    INNER JOIN
                clientes ON id_cliente = clientes.id
                WHERE
                CONCAT_WS(' ',
                cuentas.id,
                cuentas.num_cuenta,
                clientes.nombre,
                clientes.apellidos,
                cuentas.fecha_alta,
                cuentas.fecha_ul_mov,
                cuentas.num_movtos,
                cuentas.saldo)
                LIKE :expresion";
    
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