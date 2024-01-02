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

class Cliente extends Controller
{
    function __construct()
    {
        parent::__construct();
    }

    /**
     * Funciones de Cliente
     */

    // Funcion render() -> Permite visualizar la tabla clientes
    public function render()
    {
        // Creamos la propiedad titulo de la vista
        $this->view->title = "Home - Panel Control Clientes";

        // Creamos la propiedad clientes
        // La igualamos a la llamada get() del modelo
        $this->view->clientes = $this->model->get();

        // Cargamos la vista principal de cliente
        $this->view->render('cliente/main/index');

    }

    // Function new()
    public function new()
    {
        # Generamos la etiqueta de la vista
        $this->view->title = "Nuevo - Gestión Clientes";

        # Cargamos la vista con el formulario de nuevo
        $this->view->render('cliente/new/index');
    }

    // Function create() -> Instancia un objeto de classCliente para con los datos del usuario
    // -> Como argumento un array
    public function create()
    {
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
        header('location:' . URL . 'cliente');
    }

    /**
     * Function edit()
     *      -> Obtenemos los datos del cliente a editar
     *      -> La entrada es un array por el que se obtiene el id del cliente a editar
     */
    public function edit($param = [])
    {
        // igualamos el id_editar a 1er íncice del array de entrada
        $id_editar = $param[0];

        # Asignamos el id a la propiedad de la vista
        $this->view->id = $id_editar;

        # Asignamos el valor a title
        $this->view->title = "Editar Cliente - Panel de control Clientes";

        # Obtenemos el objeto classCliente
        $this->view->cliente = $this->model->read($id_editar);

        # Cargamos la vista
        $this->view->render('cliente/edit/index');

    }

    public function update($param = [])
    {

        // cargamos el id_editar con el dato recibido por GET
        $id_editar = $param[0];

        // instanciamos objeto con los datos recibidos por POST
        $data = new classCliente(
            null,
            $_POST['apellidos'],
            $_POST['nombre'],
            $_POST['telefono'],
            $_POST['ciudad'],
            $_POST['dni'],
            $_POST['email'],
        );

        // actualizamos el cliente
        $this->model->update($data, $id_editar);

        // Cargamos el controlador principal de cliente
        header('location:' . URL . 'cliente');

    }

    public function delete($param = [])
    {
        // cargamos el id a eliminar
        $id_eliminar = $param[0];

        // eliminamos de la tabla
        $this->model->delete($id_eliminar);

        // Cargamos el conrtrolador principal de cliente
        header('location:' . URL . 'cliente');
    }

        /**
     * Function show()
     *      -> Mostramos una vista con los datos del cliente seleccionado por id
     *      -> La entrada es un array por el que se obtiene el id del cliente a mostrar
     */
    public function show($param = [])
    {
        // igualamos el id_mostrar a 1er íncice del array de entrada
        $id_mostrar = $param[0];

        # Asignamos el id a la propiedad de la vista
        $this->view->id = $id_mostrar;

        # Asignamos el valor a title
        $this->view->title = "Mostrar Cliente - Panel de control Clientes";

        # Obtenemos el objeto classCliente
        $this->view->cliente = $this->model->read($id_mostrar);

        # Cargamos la vista
        $this->view->render('cliente/show/index');

    }

    public function order($param = [])
    {

        # Obtengo criterio de ordenación
        $criterio = $param[0];

        # Creo la propiedad title de la vista
        $this->view->title = "Ordenar - Panel Control Clientes";

        # Creo la propiedad clientes dentro de la vista
        # Del modelo asignado al controlador ejecuto el método get();
        $this->view->clientes = $this->model->order($criterio);

        # Cargo la vista principal de cliente
        $this->view->render('cliente/main/index');
    }

    public function filter($param = [])
    {

        # Obtengo criterio de búsqueda
        $expresion = $_GET['expresion'];

        # Creo la propiedad title de la vista
        $this->view->title = "Filtrar - Panel Control Clientes";

        # Creo la propiedad clientes dentro de la vista
        # Del modelo asignado al controlador ejecuto el método get();
        $this->view->clientes = $this->model->filter($expresion);

        # Cargo la vista principal de cliente
        $this->view->render('cliente/main/index');
    }





}


?>