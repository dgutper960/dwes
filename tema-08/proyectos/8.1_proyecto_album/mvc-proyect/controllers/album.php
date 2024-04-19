<?php

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
            $_SESSION['notify'] = "El usuario debe autenticarse";
            header("location:" . URL . "login");
        } else if ((!in_array($_SESSION['id_rol'], $GLOBALS['album']['main']))) {
            $_SESSION['mensaje'] = "Acción restringida. Usuario sin privilegios";
            header('location:' . URL . 'index');
        } else {

            if (isset($_SESSION['mensaje'])) {
                $this->view->mensaje = $_SESSION['mensaje'];
                unset($_SESSION['mensaje']);
            }

            # Creo la propiedad title de la vista
            $this->view->title = "Home - Panel Control Albumes";

            # Creo la propiedad albums dentro de la vista
            # Del modelo asignado al controlador ejecuto el método get();
            $this->view->albumes = $this->model->get();

            $this->view->render('album/main/index');
        }
    }

    # Método show
    # Muestra en un formulario de solo lectura los detalles de un album
    public function show($param = [])
    {

        //Iniciar o continuar sesión
        session_start();

        //Comprobar si el usuario está identificado
        if (!isset($_SESSION['id'])) {
            $_SESSION['mensaje'] = "El usuario debe autenticarse";
            header("location:" . URL . "login");
        } else if ((!in_array($_SESSION['id_rol'], $GLOBALS['album']['show']))) {
            $_SESSION['mensaje'] = "Acción restringida. Usuario sin privilegios";
            header('location:' . URL . 'album');
        } else {

            $id = $param[0];

            // Método que incrementa el campo núm visitas
            $this->model->sumNumVisitas($id);

            $this->view->title = "Formulario Álbum Mostar";
            $this->view->album = $this->model->getAlbum($id);
            $this->view->render("album/show/index");
        }
    }


    function new()
    {

        # iniciar o continuar  sesión
        session_start();

        # compruebo usuario autentificado
        if (!isset($_SESSION['id'])) {
            $_SESSION['notify'] = "El usuario debe autenticarse";

            header("location:" . URL . "login");
        } else if ((!in_array($_SESSION['id_rol'], $GLOBALS['album']['new']))) {
            $_SESSION['mensaje'] = "Acción restringida. Usuario sin privilegios";
            header('location:' . URL . 'album');
        } else {

            # Crear un objeto album vacio
            $this->view->album = new classAlbum();

            # Comprobar si vuelvo de  un registro no validado
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

            # etiqueta title de la vista
            $this->view->title = "Añadir - Gestión Album";


            # cargo la vista con el formulario nuevo album
            $this->view->render('album/new/index');
        }
    }

    function create($param = [])
    {
        # Iniciar sesión
        session_start();

        if (!isset($_SESSION['id'])) {
            $_SESSION['mensaje'] = "El usuario debe autenticarse";
            header("location:" . URL . "login");
        } else if ((!in_array($_SESSION['id_rol'], $GLOBALS['album']['new']))) {
            $_SESSION['mensaje'] = "Acción restringida. Usuario sin privilegios";
            header('location:' . URL . 'album');
        } else {
            # Seguridad. Saneamos los datos del formulario
            $titulo = filter_var($_POST['titulo'] ?? '', FILTER_SANITIZE_SPECIAL_CHARS);
            $descripcion = filter_var($_POST['descripcion'] ?? '', FILTER_SANITIZE_SPECIAL_CHARS);
            $autor = filter_var($_POST['autor'] ?? '', FILTER_SANITIZE_SPECIAL_CHARS);
            $fecha = filter_var($_POST['fecha'] ?? '', FILTER_SANITIZE_SPECIAL_CHARS);
            $lugar = filter_var($_POST['lugar'] ?? '', FILTER_SANITIZE_SPECIAL_CHARS);
            $categoria = filter_var($_POST['categoria'] ?? '', FILTER_SANITIZE_SPECIAL_CHARS);
            $etiquetas = filter_var($_POST['etiquetas'] ?? '', FILTER_SANITIZE_SPECIAL_CHARS);
            $carpeta = filter_var($_POST['carpeta'] ?? '', FILTER_SANITIZE_SPECIAL_CHARS);

            # Crear el objeto de álbum con los datos saneados
            $album = new classAlbum(
                null,
                $titulo,
                $descripcion,
                $autor,
                $fecha,
                $lugar,
                $categoria,
                $etiquetas,
                null,
                null,
                $carpeta
            );

            # Validación
            $errores = [];

            // Título
            //-> Campo obligatorio
            //-> MAX caracteres menor a 100
            if (empty($titulo)) {
                $errores['titulo'] = 'El campo es obligatorio';
            } else if (mb_strlen($titulo) > 100) {
                $errores['titulo'] = 'Máximo de caracteres permitidos 99';
            }

            // Descripción
            //-> Campo obligatorio
            if (empty($descripcion)) {
                $errores['descripcion'] = 'El campo es obligatorio';
            }

            // Autor
            //-> Campo obligatorio
            if (empty($autor)) {
                $errores['autor'] = 'El campo es obligatorio';
            }

            // Fecha
            //-> Campo obligatorio
            //-> Fecha Valida
            if (empty($fecha)) {
                $errores['fecha'] = 'El campo Fecha es obligatorio';
            } else if (!$this->model->validateFecha($fecha)) {
                $errores['fecha'] = 'La fecha no es válida';
            }

            // Lugar
            //-> Campo obligatorio
            if (empty($lugar)) {
                $errores['lugar'] = 'El campo es obligatorio';
            }

            // Categoría
            //-> Campo obligatorio
            if (empty($categoria)) {
                $errores['categoria'] = 'El campo es obligatorio';
            }

            // Carpeta
            //-> Campo obligatorio
            //-> Sin espacios en blanco
            if (empty($carpeta)) {
                $errores['carpeta'] = 'El campo es obligatorio';
            } else if (strpos($carpeta, ' ') !== false) {
                $errores['carpeta'] = 'No se permiten espacios en blanco';
            }

            # Comprobar validación
            if (!empty($errores)) {
                # Errores de validación
                $_SESSION['album'] = serialize($album);
                $_SESSION['error'] = 'Formulario no ha sido validado';
                $_SESSION['errores'] = $errores;
                header('location:' . URL . 'album/new');
            } else {
                # Añadir registro a la tabla
                $this->model->create($album);

                //Crear carpeta en imagenes
                $carpeta = $album->carpeta;
                $rutaCarpeta = "imagenes/$carpeta";
                if (!file_exists($rutaCarpeta)) {
                    mkdir($rutaCarpeta, 0777, true);
                }
                $_SESSION['mensaje'] = "Álbum creado correctamente";
                header('location:' . URL . 'album');
            }
        }
    }

    function edit($param = [])
    {

        # iniciamos sesión
        session_start();

        if (!isset($_SESSION['id'])) {
            $_SESSION['mensaje'] = "El usuario debe autenticarse";

            header("location:" . URL . "login");
        } else if ((!in_array($_SESSION['id_rol'], $GLOBALS['album']['edit']))) {
            $_SESSION['mensaje'] = "Acción restringida. Usuario sin privilegios";
            header('location:' . URL . 'album');
        } else {

            $id = $param[0];

            # asigno id a una propiedad de la vista
            $this->view->id = $id;

            # title
            $this->view->title = "Editar - Panel de control Albumes";

            # obtener objeto de la clase album
            $this->view->album = $this->model->getAlbum($id);

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
            $_SESSION['mensaje'] = "El usuario debe autenticarse";

            header("location:" . URL . "login");
        } else if ((!in_array($_SESSION['id_rol'], $GLOBALS['album']['edit']))) {
            $_SESSION['mensaje'] = "Acción restringida. Usuario sin privilegios";
            header('location:' . URL . 'album');
        } else {

            # 1. Seguridad. Saneamos los  datos del formulario
            $titulo = filter_var($_POST['titulo'] ?? '', FILTER_SANITIZE_SPECIAL_CHARS, 100);
            $descripcion = filter_var($_POST['descripcion'] ?? '', FILTER_SANITIZE_SPECIAL_CHARS);
            $autor = filter_var($_POST['autor'] ?? '', FILTER_SANITIZE_SPECIAL_CHARS);
            $fecha = filter_var($_POST['fecha'] ?? '', FILTER_SANITIZE_SPECIAL_CHARS);
            $lugar = filter_var($_POST['lugar'] ?? '', FILTER_SANITIZE_SPECIAL_CHARS);
            $categoria = filter_var($_POST['categoria'] ?? '', FILTER_SANITIZE_SPECIAL_CHARS);
            $etiquetas = filter_var($_POST['etiquetas'] ?? '', FILTER_SANITIZE_SPECIAL_CHARS);
            $num_fotos = filter_var($_POST['num_fotos'] ?? '', FILTER_SANITIZE_SPECIAL_CHARS);
            $num_visitas = filter_var($_POST['num_visitas'] ?? '', FILTER_SANITIZE_SPECIAL_CHARS);
            $carpeta = filter_var($_POST['carpeta'] ?? '', FILTER_SANITIZE_SPECIAL_CHARS);

            # 2. Creamos el objeto album a partir de  los datos saneados del  formuario
            $album = new classAlbum(
                null,
                $titulo,
                $descripcion,
                $autor,
                $fecha,
                $lugar,
                $categoria,
                $etiquetas,
                $num_fotos,
                $num_visitas,
                $carpeta
            );

            # Cargo id del album que voya a actualizar
            $id = $param[0];

            # Obtengo el  objeto album original
            $album_orig = $this->model->getAlbum($id);

            // Obtenemos la ruta de la carpeta original
            $rutaCarpetaOriginal = "imagenes/" . $album_orig->carpeta;

            // Obtenemos la ruta de la carpeta nueva
            $nuevaRutaCarpeta = "imagenes/" . $carpeta;

            # Validación
            $errores = [];

            // Título 
            //-> Campo obligatorio 
            //-> MAX caracteres menor a 100
            if (empty($titulo)) {
                $errores['titulo'] = 'El campo Título es obligatorio';
            } else if (mb_strlen($titulo) > 100) {
                $errores['titulo'] = 'Máximo de caracteres permitidos 99';
            }

            // Descripción
            //-> Campo obligatorio 
            if (empty($descripcion)) {
                $errores['descripcion'] = 'El campo es obligatorio';
            }

            // Autor
            //-> Campo obligatorio 
            if (empty($autor)) {
                $errores['autor'] = 'El campo es obligatorio';
            }

            // Fecha
            //-> Campo obligatorio 
            //-> Validar fecha
            if (empty($fecha)) {
                $errores['fecha'] = 'El campo es obligatorio';
            } else if (!$this->model->validateFecha($fecha)) {
                $errores['fecha'] = 'La fecha no es válida, formato no correcto';
            }

            // Lugar
            //-> Campo obligatorio 
            if (empty($lugar)) {
                $errores['lugar'] = 'El campo es obligatorio';
            }

            // Categoría
            //-> Campo obligatorio 
            if (empty($categoria)) {
                $errores['categoria'] = 'El campo es obligatorio';
            }

            // Carpeta
            //-> Campo obligatorio
            //-> Espacios en blanco no permitidos en el nombre
            if (empty($carpeta)) {
                $errores['carpeta'] = 'El campo es obligatorio';
            } else if (strpos($carpeta, ' ') !== false) {
                $errores['carpeta'] = 'No se permiten espacios en blanco';
            }

            # Comprobar validación
            if (!empty($errores)) {
                # Errores de validación
                $_SESSION['album'] = serialize($album);
                $_SESSION['error'] = 'Formulario no ha sido validado';
                $_SESSION['errores'] = $errores;
                header('location:' . URL . 'album/edit/' . $id);
            } else {
                if (!empty($carpeta) && is_dir($rutaCarpetaOriginal)) {
                    // Renombramos la carpeta
                    if (rename($rutaCarpetaOriginal, $nuevaRutaCarpeta)) {
                        // Actualizamos el valor de la carpeta en el objeto del álbum
                        $album->carpeta = $carpeta;
                    } else {
                        // Si no se puede renombrar la carpeta, agregar un mensaje de error
                        $errores['carpeta'] = 'Error al renombrar la carpeta';
                    }

                    # Actualizar registro
                    $this->model->update($album, $id, $rutaCarpetaOriginal);

                    # Mensaje
                    $_SESSION['mensaje'] = "Álbum actualizado correctamente";

                    # Redirigimos al main de álbumes
                    header('location:' . URL . 'album');
                }
            }
        }
    }

    public function order($param = [])
    {

        # inicio o continúo sesión
        session_start();

        if (!isset($_SESSION['id'])) {
            $_SESSION['mensaje'] = "El usuario debe autenticarse";

            header("location:" . URL . "login");
        } else if ((!in_array($_SESSION['id_rol'], $GLOBALS['album']['order']))) {
            $_SESSION['mensaje'] = "Acción restringida. Usuario sin privilegios";
            header('location:' . URL . 'album');
        } else {

            # Obtengo criterio de ordenación
            $criterio = $param[0];

            # Creo la propiedad title de la vista
            $this->view->title = "Ordenar - Panel Control Album";

            # Creo la propiedad albumes dentro de la vista
            # Del modelo asignado al controlador ejecuto el método get();
            $this->view->albumes = $this->model->order($criterio);

            # Cargo la vista principal de albumes
            $this->view->render('album/main/index');
        }
    }

    public function filter($param = [])
    {

        # inicio o continúo sesión
        session_start();

        if (!isset($_SESSION['id'])) {
            $_SESSION['mensaje'] = "El usuario debe autenticarse";
            header("location:" . URL . "login");
        } else if ((!in_array($_SESSION['id_rol'], $GLOBALS['album']['filter']))) {
            $_SESSION['mensaje'] = "Acción restringida. Usuario sin privilegios";
            header('location:' . URL . 'album');
        } else {

            # Obtengo expresión de búsqueda
            $expresion = $_GET['expresion'];

            # Creo la propiedad title de la vista
            $this->view->title = "Buscar - Panel de Albumes";

            # Filtro a partir de la  expresión
            $this->view->albumes = $this->model->filter($expresion);

            # Cargo la vista principal de albumes
            $this->view->render('album/main/index');
        }
    }

    public function add($param = [])
    {

        # iniciar o continuar  sesión
        session_start();

        # compruebo usuario autentificado
        if (!isset($_SESSION['id'])) {
            $_SESSION['notify'] = "El usuario debe autenticarse";

            header("location:" . URL . "login");
        } else if ((!in_array($_SESSION['id_rol'], $GLOBALS['album']['add']))) {
            $_SESSION['mensaje'] = "Acción restringida. Usuario sin privilegios";
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

            // Instanciamos objeto de la clase Album con id de entrada
            $album = $this->model->getAlbum($param[0]);

            $this->model->subirFicheros($_FILES['archivos'], $album->carpeta);
            // Contamos todo el contenido de la carpeta
            $num_fotos = count(glob("imagenes/" . $album->carpeta . "/*"));

            $this->model->updateNumFotos($album->id, $num_fotos);

            header("location:" . URL . "album");
        }
    }

    public function delete($param = [])
    {

        # inicar sesión
        session_start();

        if (!isset($_SESSION['id'])) {
            $_SESSION['mensaje'] = "El usuario debe autenticarse";

            header("location:" . URL . "login");
        } else if ((!in_array($_SESSION['id_rol'], $GLOBALS['album']['delete']))) {
            $_SESSION['mensaje'] = "Acción restringida. Usuario sin privilegios";
            header('location:' . URL . 'album');
        } else {

            # obtenemos id del  album
            $id = $param[0];

            //Para borrar la carpeta del album
            //Obtenemos el nombre de la carpeta del álbum
            $album = $this->model->getAlbum($id);
            $carpeta = $album->carpeta;
            $rutaCarpeta = "imagenes/$carpeta";

            # eliminar carpeta si existe
            if (is_dir($rutaCarpeta)) {
                $this->EliminarCarpeta($rutaCarpeta);
            }

            # eliminar album
            $this->model->delete($id);

            # generar mensaje
            $_SESSION['mensaje'] = 'album eliminado correctamente';

            # redirecciono al main de albumes
            header('location:' . URL . 'album');
        }
    }

    /**
     * Elimina el contenido de una carpeta de forma recursiva
     */
    private function EliminarCarpeta($carpeta)
    {
        if (!file_exists($carpeta)) return true;
        if (!is_dir($carpeta)) return unlink($carpeta);
        foreach (scandir($carpeta) as $item) {
            if ($item == '.' || $item == '..') continue;
            if (!$this->EliminarCarpeta($carpeta . DIRECTORY_SEPARATOR . $item)) return false;
        }
        return rmdir($carpeta);
    }
}
