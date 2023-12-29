<?php
/**
 * Implementamos el controlador cliente.php
 *      -> Se trata de una clase que hereda de Controller 
 *          - Clase controller: 
 *              - implementada en libs
 *              - será la máquina de nuestro sistema
 *      -> El constructor de esta clase hereda de Controller
 *      -> Nuestras funciones serán implementadas en esta clase
 */

 class Cliente extends Controller{
    function __construct(){
        parent::__construct();
    }

    /**
     * Funciones de Cliente
     */

     // Funcion render() -> Permite visualizar la tabla clientes
    public function render(){
        // Creamos la propiedad titulo de la vista
        $this->view->title = "Home - Panel Control Clientes";

        // Creamos la propiedad clientes
        // La igualamos a la llamada get() del modelo
        $this->view->clientes = $this->model->get();

        // Cargamos la vista principal de cliente
        $this->view->render('cliente/main/index');

    }

    // Function new()
    public function new(){
        # Generamos la etiqueta de la vista
        $this->view->title = "Nuevo - Gestión Clientes";

        # Cargamos la vista con el formulario de nuevo
        $this->view->render('cliente/new/index');
    }

    // Function create() -> Instancia un objeto de classCliente para con los datos del usuario
        // -> Como argumento un array
    public function create(){
        // Cargamos los datos directamente en el constructor
        $data = new classCliente(
            null,
            $_POST['apellidos'],
            $_POST['nombre'],
            $_POST['telefono'],
            $_POST['ciudad'],
            $_POST['dni'],
            $_POST['email'],

        );

        # Validación no requerida

        # Añadimos el registro a la tabla
        $this->model->create($data);

        # Redirigimos al main de cliente
        header('location:'.URL.'cliente');
    }


 }






?>