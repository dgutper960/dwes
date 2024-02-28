<?php
// Definimos la clase Album que extirnde de COntroller
class Album extends Controller
{

    function __construct()
    {

        parent::__construct();


    }

    function render()
    {

        # inicio o continuo sesión
        session_start();

        # compruebo usuario autentificado
        if (!isset($_SESSION['id'])) {
            $_SESSION['notify'] = "Usuario sin autentificar";
            header("location:" . URL . "login");
        } else if ((!in_array($_SESSION['id_rol'], $GLOBALS['album']['main']))) {
            $_SESSION['mensaje'] = "Ha intentado realizar operación sin privilegios";
            header('location:' . URL . 'index');
        } else {

            if (isset($_SESSION['mensaje'])) {
                $this->view->mensaje = $_SESSION['mensaje'];
                unset($_SESSION['mensaje']);
            }


            # Creo la propiedad title de la vista
            $this->view->title = "Home - Panel Control Albumes";

            # Creo la propiedad albumes dentro de la vista
            # Del modelo asignado al controlador ejecuto el método get();
            $this->view->albumes = $this->model->get();

            $this->view->render('album/main/index');
        }

    }

    function new()
    {

        # iniciar o continuar  sesión
        session_start();

        # compruebo usuario autentificado
        if (!isset($_SESSION['id'])) { // si no existe la variable de sesión 
            $_SESSION['notify'] = "El usuario debe autentificarse";
            // redirigimos al login
            header("location:" . URL . "login");
            // comprobamos si no existen las variables de sesión del rol y las globales para el método
        } else if ((!in_array($_SESSION['id_rol'], $GLOBALS['album']['new']))) {
            $_SESSION['mensaje'] = "Operación sin privilegios";
            header('location:' . URL . 'album'); // si no existen redirigimos al main de album
        } else { // en caso contrario, estamos autenticados y tenemos privilegios para new

            # Crear un objeto album vacio
            $this->view->album = new classAlbum();

            # Comprobar si vuelvo de un registro no validado
            if (isset($_SESSION['error'])) {

                # Mensaje de error
                $this->view->error = $_SESSION['error'];

                # Autorrellenar formulario con los detalles del album
                $this->view->album = unserialize($_SESSION['album']); // deserializamos para rellenar el formulario

                # Recupero array errores  específicos
                $this->view->errores = $_SESSION['errores'];

                # Elimino las variables de sesión -> Evita bucle infinito
                unset($_SESSION['error']);
                unset($_SESSION['album']);
                unset($_SESSION['errores']);
            }

            # etiqueta title de la vista
            $this->view->title = "Añadir - Gestión Albumes";

            # cargo la vista con el formulario nuevo album
            $this->view->render('album/new/index');
        }
    }

    function create($param = [])
    {

        # Iniciar sesión
        session_start();

        if (!isset($_SESSION['id'])) {
            $_SESSION['mensaje'] = "El usuario debe autentificarse";

            header("location:" . URL . "login");

        } else if ((!in_array($_SESSION['id_rol'], $GLOBALS['album']['new']))) {
            $_SESSION['mensaje'] = "Operación sin privilegios";
            header('location:' . URL . 'album');
        } else {

            # 1. Seguridad. Saneamos los  datos del formulario
            $titulo = filter_var($_POST['titulo'] ??= '', FILTER_SANITIZE_SPECIAL_CHARS);
            $descripcion = filter_var($_POST['descripcion'] ??= '', FILTER_SANITIZE_SPECIAL_CHARS);
            $autor = filter_var($_POST['autor'] ??= '', FILTER_SANITIZE_SPECIAL_CHARS);
            $fecha = filter_var($_POST['fecha'] ??= '', FILTER_SANITIZE_SPECIAL_CHARS);
            $lugar = filter_var($_POST['lugar'] ??= '', FILTER_SANITIZE_SPECIAL_CHARS);
            $categoria = filter_var($_POST['categoria'] ??= '', FILTER_SANITIZE_SPECIAL_CHARS);
            $etiquetas = filter_var($_POST['etiquetas'] ??= '', FILTER_SANITIZE_SPECIAL_CHARS);
            $carpeta = filter_var($_POST['carpeta'] ??= '', FILTER_SANITIZE_SPECIAL_CHARS);

            # 2. Creamos album con los datos saneados
            $album = new classAlbum(
                null, // id -> autocompletado por la BBDD
                $titulo,
                $descripcion,
                $autor,
                $fecha,
                $lugar,
                $categoria,
                $etiquetas,
                null, // num_fotos
                null, // num_visitas
                $carpeta,
                null, // create_at
                null // update_at
            );

            # 3. Validación
            // creamos array para almacenar posibles errores
            $errores = [];

            // Titulo:
            //-> obligatorio
            //-> max 100 char
            if (empty($titulo)) { // comprobamos si el campo está vacío
                $errores['titulo'] = 'El campo titulo es obligatorio';
            }

            // Descripcion: 
            //-> obligatorio
            if (empty($descripcion)) {
                $errores['descripcion'] = 'El campo descripción es obligatorio';
            }

            // Autor: 
            //-> obligatorio

            if (empty($autor)) {
                $errores['autor'] = 'El campo autor es obligatorio';
            }

            // Fecha
            //-> obligatorio
            if (empty($fecha)) {
                $errores['fecha'] = 'Campo obligatorio';
            }

            // Lugar
            //-> obligatorio
            if (empty($lugar)) {
                $errores['lugar'] = 'Campo obligatorio';
            }

            // Categoría
            //-> obligatorio
            if (empty($categoria)) {
                $errores['categoria'] = 'Campo obligatorio';
            }

            // Etiquetas
            //-> obligatorio
            if (empty($etiquetas)) {
                $errores['etiquetas'] = 'EL campo etiquetas es obligatorio';
            }

            // Carpeta
            //-> obligatorio
            //-> espacios no permitidos
            if (empty($carpeta)) {
                $errores['carpeta'] = 'Campo obligatorio';
                // comprobamos si tiene espacios con el método PHP strpos()
                //-> busca la concurrencia en el 2ºparametro y retorna false en caso de no encontarla (negamos la comparación)
            } else if (strpos($carpeta, ' ') !== false) {
                echo "Espacios en blanco no permitidos.";

            }


            # 4. Comprobar  validación

            if (!empty($errores)) { // Si el array no está vació -> hay errores
                # errores de validación
                // variables sesión no admiten objetos
                $_SESSION['album'] = serialize($album); // autorrellenamos
                $_SESSION['error'] = 'El El formulario no ha sido validado';
                $_SESSION['errores'] = $errores;

                # redireccionamos a new
                header('location:' . URL . 'album/new');


            } else {

                # Añadir registro a la tabla
                $this->model->create($album);

                //Crear carpeta en images
                $carpeta = $album->carpeta;
                $newDir = "images/$carpeta";
                if (!file_exists($newDir)) {
                    mkdir($newDir, 0777, true);
                }

                # Mensaje
                $_SESSION['mensaje'] = "Album creado correctamente ;) ";

                # Redirigimos al main de albumes
                header('location:' . URL . 'album');

            }

        }
    }

    function edit($param = [])
    {

        # iniciamos sesión
        session_start();

        if (!isset($_SESSION['id'])) {
            $_SESSION['mensaje'] = "El usuario debe autentificarse";

            header("location:" . URL . "login");

        } else if ((!in_array($_SESSION['id_rol'], $GLOBALS['album']['edit']))) {
            $_SESSION['mensaje'] = "Operación sin privilegios";
            header('location:' . URL . 'album');
        } else {

            # obtengo el id del album que voy a editar
            // album/edit/4

            $id = $param[0];

            # asigno id a una propiedad de la vista
            $this->view->id = $id;

            # title
            $this->view->title = "Editar - Panel de control Albumes";

            # obtener objeto de la clase album
            $this->view->album = $this->model->read($id);

            # Comprobar si el formulario viene de una no validación
            if (isset($_SESSION['error'])) {

                # Mensaje de error
                $this->view->error = $_SESSION['error'];

                # Autorrellenar formulario con los detalles del  album
                $this->view->album = unserialize($_SESSION['album']);

                # Recupero array errores  específicos
                $this->view->errores = $_SESSION['errores'];

                # Elimino las variables de sesión
                unset($_SESSION['error']);
                unset($_SESSION['album']);
                unset($_SESSION['errores']);
            }

            # cargo la vista
            $this->view->render('album/edit/index');

        }
    }

    public function update($param = [])
    {

        # iniciar sesión
        session_start();

        if (!isset($_SESSION['id'])) {
            $_SESSION['mensaje'] = "El usuario debe autentificarse";

            header("location:" . URL . "login");

        } else if ((!in_array($_SESSION['id_rol'], $GLOBALS['album']['edit']))) {
            $_SESSION['mensaje'] = "Operación sin privilegios";
            header('location:' . URL . 'album');
        } else {

            # 1. Saneamos datos del formulario FILTER_SANITIZE
            $titulo = filter_var($_POST['titulo'] ??= '', FILTER_SANITIZE_SPECIAL_CHARS);
            $descripcion = filter_var($_POST['descripcion'] ??= '', FILTER_SANITIZE_SPECIAL_CHARS);
            $autor = filter_var($_POST['autor'] ??= '', FILTER_SANITIZE_SPECIAL_CHARS);
            $fecha = filter_var($_POST['fecha'] ??= '', FILTER_SANITIZE_SPECIAL_CHARS);
            $lugar = filter_var($_POST['lugar'] ??= '', FILTER_SANITIZE_SPECIAL_CHARS);
            $categoria = filter_var($_POST['categoria'] ??= '', FILTER_SANITIZE_SPECIAL_CHARS);
            $etiquetas = filter_var($_POST['etiquetas'] ??= '', FILTER_SANITIZE_SPECIAL_CHARS);
            $carpeta = filter_var($_POST['carpeta'] ??= '', FILTER_SANITIZE_NUMBER_INT);

            # 2. Creamos el objeto album a partir de  los datos saneados del  formuario
            $album = new classAlbum(
                null, // id -> autocompletado por la BBDD
                $titulo,
                $descripcion,
                $autor,
                $fecha,
                $lugar,
                $categoria,
                $etiquetas,
                null, // num_fotos
                null, // num_visitas
                $carpeta,
                null, // create_at
                null // update_at
            );

            # Cargo id del album que voy a a actualizar
            $id = $param[0];

            # Obtengo el  objeto album original
            $album_orig = $this->model->read($id);

            # 3. Validación
            // Sólo si es necesario
            // Sólo en caso de modificación del campo

            $errores = [];

            //Validar titulo
            if (strcmp($titulo, $album_orig->titulo) !== 0) {
                if (empty($titulo)) {
                    $errores['titulo'] = 'Campo obligatorio';
                }
            }

            //Validar descripcion
            if (strcmp($descripcion, $album_orig->descripcion) !== 0) {
                if (empty($descripcion)) {
                    $errores['descripcion'] = 'Campo obligatorio';
                }
            }
            //Validar autor
            if (strcmp($autor, $album_orig->autor) !== 0) {
                if (empty($autor)) {
                    $errores['autor'] = 'Campo obligatorio';
                }
            }
            // Validar fecha
            if (strcmp($fecha, $album_orig->fecha) !== 0) {
                if (empty($fecha)) {
                    $errores['fecha'] = 'Campo obligatorio';
                }
            }

            // Validar lugar
            if (strcmp($lugar, $album_orig->lugar) !== 0) {
                if (empty($lugar)) {
                    $errores['lugar'] = 'Campo obligatorio';
                }
            }

            // Validar categoria
            if (strcmp($categoria, $album_orig->categoria) !== 0) {
                if (empty($categoria)) {
                    $errores['categoria'] = 'Campo obligatorio';
                }
            }

            // Validar carpeta
            if (strcmp($carpeta, $album_orig->carpeta) !== 0) {
                if (empty($carpeta)) {
                    $errores['carpeta'] = 'Campo obligatorio';
                } else if (strpos($carpeta, ' ') !== false) {
                    $errores['carpeta'] = 'Espacios en blanco no permitidos';
                }
            }


            # 4. Comprobar  validación

            if (!empty($errores)) {
                # errores de validación
                // variables sesión no admiten objetos
                $_SESSION['album'] = serialize($album);
                $_SESSION['error'] = 'El formulario no ha sido validado';
                $_SESSION['errores'] = $errores;

                # redireccionamos a new
                header('location:' . URL . 'album/edit/' . $id);


            } else {

                # Actualizo registro
                $this->model->update($album, $id);

                # Mensaje
                $_SESSION['mensaje'] = "Album actualizado correctamente";

                # Redirigimos al main de albumes
                header('location:' . URL . 'album');

            }

        }
    }

    public function order($param = [])
    {

        # inicio o continúo sesión
        session_start();

        if (!isset($_SESSION['id'])) {
            $_SESSION['mensaje'] = "El usuario debe autentificarse";

            header("location:" . URL . "login");

        } else if ((!in_array($_SESSION['id_rol'], $GLOBALS['album']['order']))) {
            $_SESSION['mensaje'] = "Operación sin privilegios";
            header('location:' . URL . 'album');
        } else {

            # Obtengo criterio de ordenación
            $criterio = $param[0];

            # Creo la propiedad title de la vista
            $this->view->title = "Ordenar - Panel Control Album";

            # Creo la propiedad albumes dentro de la vista
            # Del modelo asignado al controlador ejecuto el método get();
            $this->view->albumes = $this->model->order($criterio);

            # Cargo la vista principal de album
            $this->view->render('album/main/index');
        }
    }

    public function filter($param = [])
    {

        # inicio o continúo sesión
        session_start();

        if (!isset($_SESSION['id'])) {
            $_SESSION['mensaje'] = "El usuario debe autentificarse";
            header("location:" . URL . "login");
        } else if ((!in_array($_SESSION['id_rol'], $GLOBALS['album']['filter']))) {
            $_SESSION['mensaje'] = "Operación sin privilegios";
            header('location:' . URL . 'album');
        } else {

            # Obtengo expresión de búsqueda
            $expresion = $_GET['expresion'];

            # Creo la propiedad title de la vista
            $this->view->title = "Buscar - Panel Control albumes";

            # Filtro a partir de la  expresión
            $this->view->albumes = $this->model->filter($expresion);

            # Cargo la vista principal de album
            $this->view->render('album/main/index');
        }
    }

    public function delete($param = [])
    {

        # inicar sesión
        session_start();

        if (!isset($_SESSION['id'])) {
            $_SESSION['mensaje'] = "El usuario debe autentificarse";

            header("location:" . URL . "login");

        } else if ((!in_array($_SESSION['id_rol'], $GLOBALS['album']['delete']))) {
            $_SESSION['mensaje'] = "Operación sin privilegios";
            header('location:' . URL . 'album');
        } else {

            # obtenemos id del  album
            $id = $param[0];

            # eliminar album
            $this->model->delete($id);

            # generar mensaje
            $_SESSION['mensaje'] = 'album eliminado correctamente';

            # redirecciono al main de albumes
            header('location:' . URL . 'album');
        }
    }


    /**
     * Function add
     * -> Permite añadir archivos al album
     * -> Verifica que existen privilegios 
     * -> Muestra la vista de añadir archivos
     */
    public function add($param = [])
    {

        # iniciar o continuar  sesión
        session_start();

        # compruebo usuario autentificado
        if (!isset($_SESSION['id'])) {
            $_SESSION['notify'] = "Usuario debe autentificarse";

            header("location:" . URL . "login");
        } else if ((!in_array($_SESSION['id_rol'], $GLOBALS['album']['add']))) {
            $_SESSION['mensaje'] = "Operación sin privilegios";
            header('location:' . URL . 'album');
        } else {

            # Comprobar si vuelvo de  un registro no validado
            if (isset($_SESSION['error'])) {

                # Mensaje de error
                $this->view->error = $_SESSION['error'];

                # Recupero array errores  específicos
                $this->view->errores = $_SESSION['errores'];

                # Elimino las variables de sesión
                unset($_SESSION['error']);
                unset($_SESSION['errores']);
            }

            //Obtnego objeto de la clase album
            $album = $this->model->getAlbumProp($param[0]);

            $this->model->uploadFiles($_FILES['archivos'], $album->carpeta);

            $numFotos = count(glob("images/" . $album->carpeta . "/*"));

            $this->model->numPhotosUpdate($album->id, $numFotos);

            header("location:" . URL . "album");
        }
    }

    /**
     * Function upload
     * -> Permite subir archivos al album
     * -> Verifica que existen privilegios 
     * -> Muestra la vista de añadir archivos
     */

    public function upload($param = [])
    {
        // Continuamos sesión
        session_start();

        // comprobamos la variable id y los permisos
        if (!isset($_SESSION['id'])) {
            $_SESSION['notify'] = "Usuario debe autentificarse";

            header("location:" . URL . "login");

        } else if ((!in_array($_SESSION['id_rol'], $GLOBALS['album']['upload']))) {
            $_SESSION['mensaje'] = "Operación sin privilegios";
            header('location:' . URL . 'album');
        } else {

            // comprobamos si volvemos de un intento previo
            if (isset($_SESSION['error'])) { // si existen errores:
                // cargamos los errores en las propiedades de la vista
                $this->view->error = $_SESSION['error'];
                $this->view->errores = $_SESSION['errores'];


                // Eliminamos las variables de sesion para evitar el bucle
                unset($_SESSION['error']);
                unset($_SESSION['errores']);
            }

            // Cargamos el resultado de read del modelo con el parametro de entrada
            $albumFolder = $this->model->read($param[0]);
            // Validamos el fichero con la funcion definida en el modelo
            $this->model->uploadFiles($_FILES['files'], $albumFolder->carpeta);
            // redireccionamos al main del album
            header('location:' . URL . 'album');
        }
    }

    /**
     * Function show
     * -> Muestra formulario con los detalles del album
     */
    public function show($param = [])
    {
        // Iniciar o continuar sesión
        session_start();

        // Comprobar si el usuario está autenticado
        if (!isset($_SESSION['id'])) {
            $_SESSION['mensaje'] = "El usuario debe autenticarse";
            header('location:' . URL . 'login');
        } else if (!in_array($_SESSION['id_rol'], $GLOBALS['album']['show'])) {
            $_SESSION['mensaje'] = "Necesitas ser premium para esta operación";
            header('location:' . URL . 'album');
        } else {
            // Cargamos el album con el id de entrada
            $id = $param[0];

            // Incrementamos el núm de visitas del album
            $this->model->numViewIncrement($id);

            // Propiedades de la vista
            $this->view->title = "Propiedades del album $id";
            $this->view->album = $this->model->getAlbumProp($id);

            // Redirigimos a la vista show
            $this->view->render('album/show/index');
        }
    }

    // Function removeDir
    // Funcion recursiva que elimina por completo el contenido de un directorio
    public function removeDir($dir)
    {
        // control por si el directorio no existe
        if (!file_exists($dir)) {
            $_SESSION['mensaje'] = "El directorio indicado no existe";
            return true;
        }
        // control por si el parametro es un fichero
        if (!is_dir($dir)) {
            return unlink($dir);
        }

        // Recorremos de forma recursiva el directorio hasta el final y eliminamos el contenido con cada llamada de la pila
        foreach (scandir($dir) as $item) {
            if ($item == '.' || $item == '..') {
                continue;
            }
            if (!$this->removeDir($dir . DIRECTORY_SEPARATOR . $item)) {
                return false;
            }

        }
        return rmdir($dir);
    }
}

