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


 }






?>