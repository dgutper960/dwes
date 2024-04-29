<?php

class movimientosModel extends Model
{

    // Retorna todos los movimientos de la tabla
    public function getAllMovimientos()
    {
        try {

            $sql = "SELECT 
                        movimientos.id,
                        cuentas.num_cuenta AS cuenta,
                        movimientos.fecha_hora,
                        movimientos.concepto,
                        movimientos.tipo,
                        movimientos.cantidad,
                        movimientos.saldo
                    FROM
                        movimientos
                            INNER JOIN
                        cuentas ON movimientos.id_cuenta = cuentas.id
                    ORDER BY movimientos.id
                    ";
            // conexión y prepare
            $conexion = $this->db->connect();
            $pdoSt = $conexion->prepare($sql);
            // selección de fetch
            $pdoSt->setFetchMode(PDO::FETCH_OBJ);
            // ejecución y return
            $pdoSt->execute();
            return $pdoSt;
            // control de errores
        } catch (PDOException $e) {
            require_once("template/partials/errorDB.php");
            exit();
        }
    }


    // Inserta un nuevo movimiento en la tabla
    // Argumento = Instancia de classMovimiento
    public function create($movimiento)
    {
        try {
            $sql = "INSERT INTO movimientos 
                        (
                        id_cuenta,
                        fecha_hora,
                        concepto,
                        tipo,
                        cantidad,
                        saldo
                        ) VALUES ( 
                        :id_cuenta,
                        :fecha_hora,
                        :concepto,
                        :tipo,
                        :cantidad,
                        :saldo
                        )";

            $conexion = $this->db->connect();
            $pdoSt = $conexion->prepare($sql);
            // Vinculación de parámetros del método con la entrada del insert
            $pdoSt->bindParam(":id_cuenta", $movimiento->id_cuenta, PDO::PARAM_INT);
            $pdoSt->bindParam(":fecha_hora", $movimiento->fecha_hora);
            $pdoSt->bindParam(":concepto", $movimiento->concepto, PDO::PARAM_STR, 50);
            $pdoSt->bindParam(":tipo", $movimiento->tipo, PDO::PARAM_STR);
            $pdoSt->bindParam(":cantidad", $movimiento->cantidad);
            $pdoSt->bindParam(":saldo", $movimiento->saldo);

            // ejcución
            $pdoSt->execute();
            // control de errores
        } catch (PDOException $e) {
            require_once("template/partials/errorDB.php");
            exit();
        }
    }


    // Retorna todas las cuentas de la tabla
    public function getAllCuentas()
    {
        try {
            $sql = "SELECT * from cuentas";

            $conexion = $this->db->connect();
            $pdoSt = $conexion->prepare($sql);
            $pdoSt->setFetchMode(PDO::FETCH_OBJ);
            $pdoSt->execute();
            return $pdoSt;
        } catch (PDOException $e) {
            require_once("template/partials/errorDB.php");
            exit();
        }
    }

    // Retorna el saldo de una cuenta por id
    // Argumento = id de la cuenta
    public function getSaldoCuenta(int $id_cuenta)
    {
        try {
            $sql = "SELECT 
                        saldo 
                    FROM 
                        cuentas 
                    WHERE 
                        id = :id_cuenta";

            $conexion = $this->db->connect();
            $pdoSt = $conexion->prepare($sql);
            // Vinculamos parámetro
            $pdoSt->bindParam(":id_cuenta", $id_cuenta, PDO::PARAM_INT);
            // Seleccionemos tipo de fetch
            $pdoSt->setFetchMode(PDO::FETCH_OBJ);
            // Ejecutamos y retornamos
            $pdoSt->execute();
            return $pdoSt->fetchColumn();
            // control de errores
        } catch (PDOException $e) {
            require_once("template/partials/errorDB.php");
            exit();
        }
    }

    // Actualiza el saldo de una cuenta 
    // Argumentos = id_cuenta, saldo_actualzado
    public function updateSaldoCuenta(int $id_cuenta, $saldo_actualizado)
    {
        try {
            $sql = "UPDATE 
                        cuentas 
                    SET 
                        saldo = :saldo_actualizado
                    WHERE
                        id = :id_cuenta";

            $conexion = $this->db->connect();
            $pdoSt = $conexion->prepare($sql);
            $pdoSt->bindParam(":id_cuenta", $id_cuenta, PDO::PARAM_INT);
            $pdoSt->bindParam(":saldo_actualizado", $saldo_actualizado, PDO::PARAM_INT);
            $pdoSt->execute();
        } catch (PDOException $e) {
            require_once("template/partials/errorDB.php");
            exit();
        }
    }

    // Obtiene los detalles de un movimiento
    // Argumento = id_movimiento
    public function getMovimiento(int $id_movimiento)
    {
        try {
            $sql = "SELECT 
                        movimientos.id,
                        cuentas.num_cuenta AS cuenta,
                        movimientos.fecha_hora,
                        movimientos.concepto,
                        movimientos.tipo,
                        movimientos.cantidad,
                        movimientos.saldo
                    FROM
                        movimientos
                            INNER JOIN
                        cuentas ON movimientos.id_cuenta = cuentas.id
                    WHERE
                        movimientos.id = :id
                    ";

            $conexion = $this->db->connect();
            $pdoSt = $conexion->prepare($sql);
            $pdoSt->bindParam(':id', $id_movimiento, PDO::PARAM_INT);
            $pdoSt->setFetchMode(PDO::FETCH_OBJ);
            $pdoSt->execute();

            return $pdoSt->fetch();
        } catch (PDOException $e) {
            require_once("template/partials/errorDB.php");
            exit();
        }
    }


    // Obtiene los detalles de una cuenta
    // Argumento = id_cuenta
    public function getCuenta(int $id_cuenta)
    {
        try {

            $sql = "SELECT 
                        cuentas.id,
                        cuentas.num_cuenta,
                        cuentas.id_cliente,
                        cuentas.fecha_alta,
                        cuentas.fecha_ul_mov,
                        cuentas.num_movtos,
                        cuentas.saldo
                    FROM 
                        cuentas
                    WHERE
                        id=:id;";

            $conexion = $this->db->connect();
            $pdoSt = $conexion->prepare($sql);
            $pdoSt->bindParam(':id', $id_cuenta, PDO::PARAM_INT);
            $pdoSt->setFetchMode(PDO::FETCH_OBJ);
            $pdoSt->execute();

            return $pdoSt->fetch();
        } catch (PDOException $e) {
            require_once("template/partials/errorDB.php");
            exit();
        }
    }


    public function order(int $criterio)
    {
        try {
            $sql = "SELECT 
                        movimientos.id,
                        cuentas.num_cuenta AS cuenta,
                        movimientos.fecha_hora,
                        movimientos.concepto,
                        movimientos.tipo,
                        movimientos.cantidad,
                        movimientos.saldo
                    FROM
                        movimientos
                            INNER JOIN
                        cuentas ON movimientos.id_cuenta = cuentas.id
                    ORDER BY :criterio
                    ";

            $conexion = $this->db->connect();
            $pdoSt = $conexion->prepare($sql);
            $pdoSt->bindParam(':criterio', $criterio, PDO::PARAM_INT);
            $pdoSt->setFetchMode(PDO::FETCH_OBJ);
            $pdoSt->execute();
            return $pdoSt;
        } catch (PDOException $e) {
            require_once("template/partials/errorDB.php");
            exit();
        }
    }

    public function filter($expresion)
    {
        try {
            $sql = "SELECT 
                        movimientos.id,
                        cuentas.num_cuenta AS cuenta,
                        movimientos.fecha_hora,
                        movimientos.concepto,
                        movimientos.tipo,
                        movimientos.cantidad,
                        movimientos.saldo
                    FROM
                        movimientos
                            INNER JOIN
                        cuentas ON movimientos.id_cuenta = cuentas.id
                    WHERE
                        CONCAT_WS(' ',
                                movimientos.id,
                                cuentas.num_cuenta,
                                movimientos.fecha_hora,
                                movimientos.concepto,
                                movimientos.tipo,
                                movimientos.cantidad,
                                movimientos.saldo) LIKE :expresion
                    ";

            $conexion = $this->db->connect();

            $expresion = "%" . $expresion . "%";
            $pdoSt = $conexion->prepare($sql);

            $pdoSt->bindValue(':expresion', $expresion, PDO::PARAM_STR);
            $pdoSt->setFetchMode(PDO::FETCH_OBJ);
            $pdoSt->execute();

            return $pdoSt;
        } catch (PDOException $e) {
            require_once("template/partials/errorDB.php");
            exit();
        }
    }
}
