<?php
/**
 * Implementamos el controlador Cuenta.php
 *      -> Se trata de una clase que hereda de Controller 
 *          - Clase controller: 
 *              - implementada en libs
 *              - será la máquina de nuestro sistema
 *      -> El constructor de esta clase hereda de Controller
 *      -> Nuestras funciones serán implementadas en esta clase
 */

class Cuenta extends Controller
{
    function __construct()
    {
        parent::__construct();
    }

    /**
     * Funciones de Cuenta
     */

    // Funcion render() -> Permite visualizar la tabla Cuentas
    public function render()
    {
        // Creamos la propiedad titulo de la vista
        $this->view->title = "Home - Panel Control Cuentas";

        // Creamos la propiedad Cuentas
        // La igualamos a la llamada get() del modelo
        $this->view->cuentas = $this->model->get();

        // Cargamos la vista principal de Cuenta
        $this->view->render('cuenta/main/index');

    }

    // Function new()
    public function new()
    {
        # Generamos la etiqueta de la vista
        $this->view->title = "Nuevo - Gestión Cuentas";

        # Cargamos array asociativo con los nombres de los clientes para la lista desplegable
        $this->view->customers = $this->model->getCustomerName();

        # Cargamos la vista con el formulario de nuevo
        $this->view->render('cuenta/new/index');
    }

    // Function create() -> Instancia un objeto de classCuenta para con los datos del usuario
    // -> Como argumento un array
    public function create()
    {
        // Cargamos los datos directamente en el constructor
        $data = new classCuenta(
            null,
            $_POST['num_cuenta'],
            $_POST['id_cliente'],
            null,
            null,
            null,
            $_POST['saldo'],

        );

        # Validación no requerida

        # Añadimos el registro a la tabla
        $this->model->create($data);

        # Redirigimos al main de Cuenta
        header('location:' . URL . 'cuenta');
    }

    /**
     * Function edit()
     *      -> Obtenemos los datos del Cuenta a editar
     *      -> La entrada es un array por el que se obtiene el id del Cuenta a editar
     */
    public function edit($param = [])
    {
        // igualamos el id_editar a 1er íncice del array de entrada
        $id_editar = $param[0];

        # Asignamos el id a la propiedad de la vista
        $this->view->id = $id_editar;

        # Asignamos el valor a title
        $this->view->title = "Editar Cuenta - Panel de control Cuentas";

        # Obtenemos el objeto classCuenta
        $this->view->cuenta = $this->model->read($id_editar);

        # Cargamos la vista
        $this->view->render('cuenta/edit/index');

    }

    public function update($param = [])
    {

        // cargamos el id_editar con el dato recibido por GET
        $id_editar = $param[0];

        // instanciamos objeto con los datos recibidos por POST
        $data = new classCuenta(
            null,
            $_POST['num_cuenta'],
            $id_editar,
            $_POST['fecha_alta'],
            $_POST['fecha_ul_mov'],
            $_POST['num_movtos'],
            $_POST['saldo'],
        );

        // actualizamos el Cuenta
        $this->model->update($data, $id_editar);

        // Cargamos el controlador principal de Cuenta
        header('location:' . URL . 'cuenta');

    }

    public function delete($param = [])
    {
        // cargamos el id a eliminar
        $id_eliminar = $param[0];

        // eliminamos de la tabla
        $this->model->delete($id_eliminar);

        // Cargamos el conrtrolador principal de Cuenta
        header('location:' . URL . 'cuenta');
    }

        /**
     * Function show()
     *      -> Mostramos una vista con los datos del Cuenta seleccionado por id
     *      -> La entrada es un array por el que se obtiene el id del Cuenta a mostrar
     */
    public function show($param = [])
    {
        // igualamos el id_mostrar a 1er íncice del array de entrada
        $id_mostrar = $param[0];

        # Asignamos el id a la propiedad de la vista
        $this->view->id = $id_mostrar;

        # Asignamos el valor a title
        $this->view->title = "Mostrar Cuenta - Panel de control Cuentas";

        # Obtenemos el objeto classCuenta
        $this->view->cuenta = $this->model->read($id_mostrar);

        # Cargamos la vista
        $this->view->render('cuenta/show/index');

    }

    public function order($param = [])
    {

        # Obtengo criterio de ordenación
        $criterio = $param[0];

        # Creo la propiedad title de la vista
        $this->view->title = "Ordenar - Panel Control Cuentas";

        # Creo la propiedad Cuentas dentro de la vista
        # Del modelo asignado al controlador ejecuto el método get();
        $this->view->cuentas = $this->model->order($criterio);

        # Cargo la vista principal de Cuenta
        $this->view->render('cuenta/main/index');
    }

    public function filter($param = [])
    {

        # Obtengo criterio de búsqueda
        $expresion = $_GET['expresion'];

        # Creo la propiedad title de la vista
        $this->view->title = "Filtrar - Panel Control Cuentas";

        # Creo la propiedad Cuentas dentro de la vista
        # Del modelo asignado al controlador ejecuto el método get();
        $this->view->cuentas = $this->model->filter($expresion);

        # Cargo la vista principal de Cuenta
        $this->view->render('cuenta/main/index');
    }





}


?>