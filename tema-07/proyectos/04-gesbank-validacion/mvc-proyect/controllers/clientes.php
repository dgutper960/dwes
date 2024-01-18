<?php

class Clientes extends Controller
{

    # Método principal. Muestra todos los clientes
    public function render($param = [])
    {
        $this->view->title = "Tabla Clientes";
        $this->view->clientes = $this->model->get();
        $this->view->render("clientes/main/index");
    }

    # Método nuevo. Muestra formulario añadir cliente
    public function nuevo($param = [])
    {
        $this->view->title = "Formulario cliente nuevo";
        $this->view->render("clientes/nuevo/index");
    }

    # Método create. 
    # Permite añadir nuevo cliente a partir de los detalles del formuario
    public function create($param = [])
    {
        # Iniciamos sesion para manejar las variables de sesion
        session_start();

        # Saneamos los datos obtenidos en el formulario
        // añadimos operador ??='' para evitar errores en campos vacios
        $apellidos = filter_var($_POST['apellidos'] ??= '', FILTER_SANITIZE_SPECIAL_CHARS);
        $nombre = filter_var($_POST['nombre'] ??= '', FILTER_SANITIZE_SPECIAL_CHARS);
        $telefono = filter_var($_POST['telefono'] ??= '', FILTER_SANITIZE_SPECIAL_CHARS);
        $ciudad = filter_var($_POST['ciudad'] ??= '', FILTER_SANITIZE_SPECIAL_CHARS);
        $dni = filter_var($_POST['dni'] ??= '', FILTER_SANITIZE_SPECIAL_CHARS);
        $email = filter_var($_POST['email'] ??= '', FILTER_SANITIZE_EMAIL);

        # Creamos el objeto con los datos saneados
        $cliente = new classCliente(
            null,
            $apellidos,
            $nombre,
            $telefono,
            $ciudad,
            $dni,
            $email,
            null,
            null
        );

        # Validacion
        //  creamos el array de errores
        $errores = [];

        ## En caso de que no se cumpla la validacion almacenamos el error en el array $errores

        // Validamos nombre 
        //-> Nombre obligatorio 
        //-> Max 20 caracteres
        if (empty($nombre)) {
            $errores['nombre'] = 'El campo es obligatiorio';
        } elseif (strlen($nombre) > 20) {
            $errores['nombre'] = 'Tamaño máximo permitido 20 caracteres. Actualmente ocupa'.strlen($nombre).' caracteres';
        }

        // Validamos apellidos 
        //-> Nombre obligatorio 
        //-> Max 45 caracteres
        if (empty($apellidos)) {
            $errores['apellidos'] = 'El campo es obligatiorio';
        } elseif (strlen($apellidos) > 45) {
            $errores['apellidos'] = 'Tamaño máximo permitido 45 caracteres. Actualmente ocupa'.strlen($nombre).' caracteres';
        }

        // Validamos telefono
        //-> 9 dígitos numéricos
        if(!is_numeric($telefono) || strlen($telefono)){
            $errores['telefono'] = 'El valor debe ser un numérico de 9 dígitos';
        } // Lo podríamos haber hecho con if-else pero nuestro jefe de proyecto no ha dicho que así mejor

        // Validacion dni
        //-> Obligatorio
        //-> Único en la tabla clientes
        //-> 8 dígitos y 1 letra mayúscula

        


        $this->model->create($cliente);
        header("Location:" . URL . "clientes");
    }

    # Método delete. 
    # Permite la eliminación de un cliente
    public function delete($param = [])
    {
        $id = $param[0];
        $this->model->delete($id);
        header("Location:" . URL . "clientes");
    }

    # Método editar. 
    # Muestra un formulario que permita editar los detalles de un cliente
    public function editar($param = [])
    {
        $this->view->id = $param[0];
        $this->view->title = "Formulario  editar cliente";
        $this->view->cliente = $this->model->getCliente($this->view->id);
        $this->view->render("clientes/editar/index");
    }

    # Método update.
    # Actualiza los detalles de un cliente a partir de los datos del formulario de edición
    public function update($param = [])
    {
        $id = $param[0];

        $cliente = new classCliente(
            null,
            $_POST["apellidos"],
            $_POST["nombre"],
            $_POST["telefono"],
            $_POST["ciudad"],
            $_POST["dni"],
            $_POST["email"],
            null,
            null
        );

        $this->model->update($cliente, $id);
        header("Location:" . URL . "clientes");
    }


    # Método mostrar
    # Muestra en un formulario de solo lectura los detalles de un cliente
    public function mostrar($param = [])
    {
        $id = $param[0];
        $this->view->title = "Formulario Cliente Mostar";
        $this->view->cliente = $this->model->getCliente($id);
        $this->view->render("clientes/mostrar/index");
    }

    # Método ordenar
    # Permite ordenar la tabla de clientes por cualquiera de las columnas de la tabla
    public function ordenar($param = [])
    {
        $criterio = $param[0];
        $this->view->title = "Tabla Clientes";
        $this->view->clientes = $this->model->order($criterio);
        $this->view->render("clientes/main/index");

    }

    # Método buscar
    # Permite buscar los registros de clientes que cumplan con el patrón especificado en la expresión
    # de búsqueda
    public function buscar($param = [])
    {
        $expresion = $_GET["expresion"];
        $this->view->title = "Tabla Clientes";
        $this->view->clientes = $this->model->filter($expresion);
        $this->view->render("clientes/main/index");
    }
}
