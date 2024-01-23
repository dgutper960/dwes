<?php

class Clientes extends Controller
{

    # Método principal. Muestra todos los clientes
    public function render($param = [])
    {
        # Se debe iniciar o continuar la sesión para mantener los posibles datos almacenados
        session_start();

        # Si exsiste la variable de sesión, la mostramos
        if (isset($_SESSION['mensaje'])) {
            $this->view->mensaje = $_SESSION['mensaje'];
            unset($_SESSION['mensaje']);
        }

        # Creamos la propiedad title de la vista
        $this->view->title = "Tabla Clientes";

        # Añadimos a la propiedad de la vista "clientes" el resultado del método get(),
        // disponible en el modelo
        $this->view->clientes = $this->model->get();

        # Cargamos la vista principal
        $this->view->render("clientes/main/index");
    }

    # Método nuevo. Muestra formulario añadir cliente
    public function nuevo($param = [])
    {
        # Iniciamos o continuamos sesión
        session_start();

        # Creamos un objeto vacio
        $this->view->cliente = new classCliente();

        # Si existe la variable de sesión 'errores' es que ha habido algún error
        // en caso afirmativo, creamos las siguientes propiedades:
        if (isset($_SESSION['error'])) {
            // Mostramos el mensaje de error en la vista
            $this->view->error = $_SESSION['error'];

            // Autorrellenamos los datos del formulario -> debemos deserializarlos previamente
            $this->view->cliente = unserialize($_SESSION['cliente']);

            // Recuperamos el array con los errores
            $this->view->errores = $_SESSION['errores'];

            // Una vez echo uso de las varables de sesión, se deben eliminar, para evitar bucles y otros errores
            unset($_SESSION['error']);
            unset($_SESSION['cliente']);
            unset($_SESSION['errores']);


        } // fin del bloque if en caso de existe alguna variable de sesion 'error'

        # Añadimos a la vista la propiedad title
        $this->view->title = "Formulario cliente nuevo";

        # Cargamos la vista del formulario para añadir un nuevo cliente
        $this->view->render("clientes/nuevo/index");
    }

    # Método create. 
    # Permite añadir nuevo cliente a partir de los detalles del formuario
    public function create($param = [])
    {
        /**
         * Proceso de validación
         */

        # Iniciamos o continuamos la sesion
        session_start();

        # Saneamos los datos del formulario para evitar la inyección de código
        // (??= '')-> operador de asignación de fusión de null
        $nombre = filter_var($_POST["nombre"] ??= '', FILTER_SANITIZE_SPECIAL_CHARS); // special_chars para los string
        $apellidos = filter_var($_POST["apellidos"] ??= '', FILTER_SANITIZE_SPECIAL_CHARS);
        $telefono = filter_var($_POST["telefono"] ??= '', FILTER_SANITIZE_SPECIAL_CHARS);
        $ciudad = filter_var($_POST['ciudad'] ??= '', FILTER_SANITIZE_SPECIAL_CHARS);
        $dni = filter_var($_POST['dni'] ??= '', FILTER_SANITIZE_SPECIAL_CHARS);
        $email = filter_var($_POST['email'] ??= '', FILTER_SANITIZE_EMAIL);

        # Instanciamos el objeto con los datos saneados
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

        # Validación
        // Creamos un array vacío para almacenar los posibles errores de validación
        $errores = [];

        // apellidos. 
        //-> Campo obligatorio
        //-> Tamaño maximo de 45
        if (empty($apellidos)) {
            $errores['apellidos'] = "Campo obligatorio";
        } else if (strlen($apellidos) > 45) { // strlen() evalua el número de caracteres
            $errores['apellidos'] = "El campo admite un máximo de 45 caracteres";
        }

        // nombre. 
        //-> Campo obligatorio
        //-> Tamaño maximo de 20
        if (empty($nombre)) {
            $errores['nombre'] = "Campo obligatorio";
        } else if (strlen($nombre) > 20) {
            $errores['nombre'] = "El campo admite un máximo de 20 caracteres";
        }

        // Teléfono. 
        //-> 9 dígitos numéricos
        // Inicializamos variable para almacenra la expresión regular
        $optionsTel = [
            'options' => [
                'regexp' => '/^[0-9]{9}$/'
            ]
        ];

        if (!empty($telefono) && !filter_var($telefono, FILTER_VALIDATE_REGEXP, $optionsTel)) {
            $errores['telefono'] = "Este campo debe ser numérico con 9 dígitos";
        }

        // Ciudad. 
        //-> Obligatorio
        //-> Tamaño máximo de 20
        if (empty($ciudad)) {
            $errores['ciudad'] = "Campo obligatorio";
        } else if (strlen($ciudad) > 20) {
            $errores['ciudad'] = "El campo admite un máximo de 20 caracteres";
        }

        // dni. 
        //-> Campo obligatorio
        //-> Formato de 8 digitos y 1 mayúscula
        //-> Valor único en la BBDD
        // Creamos un regexp, que permita 8 digitos y 1 letra mayuscula
        $optionsDNI = [
            'options' => [
                'regexp' => '/^[0-9]{8}[A-Z]$/'
            ]
        ];

        if (empty($dni)) {
            $errores['dni'] = "Campo obligatorio";
        } else if (!filter_var($dni, FILTER_VALIDATE_REGEXP, $optionsDNI)) {
            $errores['dni'] = "El formato requerido para DNI es: '12345678A'";
        } else if (!$this->model->validateUniqueDni($dni)) { // método que retorna false si el DNI existe
            $errores['dni'] = "El DNI ha sido registrado con anterioridad";
        }

        // email. 
        //-> Campo obligatorio
        //-> Formato valido para email
        //-> Valor único en la BBDD 
        if (empty($email)) {
            $errores['email'] = "Campo obligatorio";
        } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errores['email'] = "Formato email no válido";
        } else if (!$this->model->validateUniqueEmail($email)) { // método que retorna false si el DNI existe
            $errores['email'] = "El email ya ha sido registrado con anterioridad";
        }

        # Comprobamos la validación
        // Si el array de errores no está vacío, es que hemos tenido algún error de validación
        if (!empty($errores)) {
            // Almacenamos los errores en variables de sesión
            $_SESSION['cliente'] = serialize($cliente); // Para el autorrellenado del formulario
            $_SESSION['error'] = 'Formulario no validado';
            $_SESSION['errores'] = $errores;

            // Redireccionamos al formulario nuevo
            header('Location:' . URL . 'clientes/nuevo');
        } else {
            // Si no hay errores, añadimos el registro a la tabla
            $this->model->create($cliente);

            // Creamos el mensaje personalizado
            $_SESSION['mensaje'] = 'Cliente añadido con éxito';

            // Redirigimos a la vista principal de clientes
            header("Location:" . URL . "clientes");
        }

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
        # Iniciamos o continuamos sesión
        session_start();

        # Obtenemos el id del cliente a editar
        $id = $param[0];
        $this->view->id = $id;

        # Asignamos un valor a la propiedad de la vista title
        $this->view->title = "Formulario editar cliente";

        # Asignamos a la propiedad de la vista cliente el resultado del método getCliente
        $this->view->cliente = $this->model->getCliente($id);

 
        # Comprobamos si existen errores
        // en caso de errores el formulario viene de una no validación
        if (isset($_SESSION["error"])) {
            // Añadimos a la vista el mensaje de error
            $this->view->error = $_SESSION["error"];

            // Autorellenamos el formulario
            $this->view->cliente = unserialize($_SESSION['cliente']);  // deserializamos e igulamos a cliente

            // Recuperamos el array con los errores
            $this->view->errores = $_SESSION['errores'];

            // Una vez usadas las variables de sesión, las eliminmamos
            unset($_SESSION['error']);
            unset($_SESSION['cliente']);
            unset($_SESSION['errores']);
        }

        # Cargamos la vista edit del cliente
        $this->view->render("clientes/editar/index");
    }

    # Método update.
    # Actualiza los detalles de un cliente a partir de los datos del formulario de edición
    public function update($param = [])
    {

        # Iniciamos o contiuamos sesión
        session_start();

        # Saneamos los datos del formulario
        $nombre = filter_var($_POST["nombre"] ??= '', FILTER_SANITIZE_SPECIAL_CHARS);
        $apellidos = filter_var($_POST["apellidos"] ??= '', FILTER_SANITIZE_SPECIAL_CHARS);
        $telefono = filter_var($_POST["telefono"] ??= '', FILTER_SANITIZE_SPECIAL_CHARS);
        $ciudad = filter_var($_POST['ciudad'] ??= '', FILTER_SANITIZE_SPECIAL_CHARS);
        $dni = filter_var($_POST['dni'] ??= '', FILTER_SANITIZE_SPECIAL_CHARS);
        $email = filter_var($_POST['email'] ??= '', FILTER_SANITIZE_EMAIL);

        # Creamos objeto con los datos saneados
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

        # Cargamos el id del cliente a actualizar
        $id = $param[0];

        # Obtenemos el objeto original
        $objetOriginal = $this->model->getCliente($id);

        // Creamos array para errores
        $errores = [];

        # Validación. Solo en caso de modificación de campo
        // En cada validación se va a comprar el dato del formulario con el original
        // En caso de ser diferentes se va a proceder a la validación correspomdiente

        // apellidos. 
        //->Campo obligatorio
        //-> Tamaño maximo de 45
        if (strcmp($apellidos, $objetOriginal->apellidos) !== 0) {
            if (empty($apellidos)) {
                $errores['apellidos'] = "Campo obligatorio";
            } else if (strlen($apellidos) > 45) {
                $errores['apellidos'] = "El campo admite un máximo de 45 caracteres";
            }
        }

        // nombre. 
        //-> Campo obligatorio
        //-> Tamaño maximo de 20
        if (strcmp($nombre, $objetOriginal->nombre) !== 0) {
            if (empty($nombre)) {
                $errores['nombre'] = "Campo obligatorio";
            } else if (strlen($nombre) > 20) {
                $errores['nombre'] = "El campo admite un máximo de 20 caracteres";
            }
        }

        // Teléfono. 
        //-> 9 dígitos numéricos
        // Inicializamos variable para almacenra la expresión regular
        if (strcmp($telefono, $objetOriginal->telefono)) {
            $optionsTel = [
                'options' => [
                    'regexp' => '/^[0-9]{9}$/'
                ]
            ];

            if (!empty($telefono) && !filter_var($telefono, FILTER_VALIDATE_REGEXP, $optionsTel)) {
                $errores['telefono'] = "Debe ser númerico de 9 dígitos";
            }
        }

        // Ciudad. 
        //-> Obligatorio
        //-> Tamaño máximo de 20
        if (strcmp($ciudad, $objetOriginal->ciudad) !== 0) {
            // Ciudad. Obligatorio, tamaño máximo de 20
            if (empty($ciudad)) {
                $errores['ciudad'] = "Campo obligatorio";
            } else if (strlen($ciudad) > 20) {
                $errores['ciudad'] = "Superaste el limite de caracteres";
            }
        }

        // dni. 
        //-> Campo obligatorio
        //-> Formato de 8 digitos y 1 mayúscula
        //-> Valor único en la BBDD
        // Creamos un regexp, que permita 8 digitos y 1 letra mayuscula
        if (strcmp($dni, $objetOriginal->dni) !== 0) {
            $dniRegexp = [
                'options' => [
                    'regexp' => '/^[0-9]{8}[A-Z]$/'
                ]
            ];

            if (empty($dni)) {
                $errores['dni'] = "Campo obligatorio";
            } else if (!filter_var($dni, FILTER_VALIDATE_REGEXP, $dniRegexp)) {
                $errores['dni'] = "Formato DNI incorrecto";
            } else if (!$this->model->validateUniqueDni($dni)) {
                $errores['dni'] = "El DNI introducido ya ha sido registrado";
            }
        }

        // email. 
        //-> Campo obligatorio
        //-> Formato valido para email
        //-> Valor único en la BBDD 
        if (strcmp($email, $objetOriginal->email) !== 0) {
            if (empty($email)) {
                $errores['email'] = "Campo obligatorio";
            } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errores['email'] = "Formato Email no válido";
            } else if (!$this->model->validateUniqueEmail($email)) {
                $errores['email'] = "El correo electrónico introducido ya está registrado";
            }
        }

        # Comprobamos la validación
        // Si el array de errores no está vacío, es que hemos tenido algún error de validación
        if (!empty($errores)) {
            // Almacenamos los errores en variables de sesión
            $_SESSION['cliente'] = serialize($cliente);
            $_SESSION['error'] = 'Formulario no validado';
            $_SESSION['errores'] = $errores;

            // Redireccionamos
            header('location:' . URL . 'clientes/editar/' . $id);
        } else {
            // Actualizamos el registro
            $this->model->update($cliente, $id);

            // Añadimos a la variable de sesión un mensaje
            $_SESSION['mensaje'] = 'Cliente actualizado correctamente';

            // Redireccionamos al main de clientes
            header("Location:" . URL . "clientes");
        }
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

?>