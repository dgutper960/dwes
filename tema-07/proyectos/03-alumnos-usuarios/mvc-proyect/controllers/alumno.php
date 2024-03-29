<?php

class Alumno extends Controller
{

    function __construct()
    {

        parent::__construct();


    }

    function render()
    {
        # Inicio o contiúo la sesión
        session_start();

        # Comprobamos si existe la variable de entorno $_SESSION['id']
        if (!isset($_SESSION['id'])) {
            $_SESSION['mensaje'] = "El usuario debe autentificarse";

            header('location:' . URL . 'login');
        } else {

            # Si existe un mensaje lo muestro
            if (isset($_SESSION['mensaje'])) {
                $this->view->mensaje = $_SESSION['mensaje'];
                unset($_SESSION['mensaje']);
            }

            # Creo la propiedad title de la vista
            $this->view->title = "Home - Panel Control Alumnos";

            # Creo la propiedad alumnos dentro de la vista
            # Del modelo asignado al controlador ejecuto el método get();
            $this->view->alumnos = $this->model->get();

            $this->view->render('alumno/main/index');
        }


    }



    function new()
    {
        # Inicio o contiúo la sesión
        session_start();

        # Comprobamos si existe la variable de entorno $_SESSION['id']
        if (!isset($_SESSION['id'])) {
            $_SESSION['mensaje'] = "El usuario debe autentificarse";

            header('location:' . URL . 'login');
        } else {

            # Creamos un objeto vacio
            $this->view->alumno = new classAlumno();

            # Comprobamos si hay errores -> esta variable se crea al lanzar un error de validacion
            if (isset($_SESSION['error'])) {
                // rescatemos el mensaje
                $this->view->error = $_SESSION['error'];

                // Autorellenamos el formulario
                $this->view->alumno = unserialize($_SESSION['alumno']);

                // Recupero array de errores específicos
                $this->view->errores = $_SESSION['errores'];

                // debemos liberar las variables de sesión ya que su cometido ha sido resuelto
                unset($_SESSION['error']);
                unset($_SESSION['errores']);
                unset($_SESSION['alumnos']);
                // Si estas variables existen cuando no hay errores, entraremos en los bloques de error en las condicionales
            }


            # etiqueta title de la vista
            $this->view->title = "Añadir - Gestión Alumnos";

            #  obtener los cursos  para generar dinámicamente lista cursos
            $this->view->cursos = $this->model->getCursos();

            # cargo la vista con el formulario nuevo alumno
            $this->view->render('alumno/new/index');
        }

    }

    function create($param = [])
    {

        # Iniciamos sesión
        session_start();

        # Comprobamos si existe la variable de entorno $_SESSION['id']
        if (!isset($_SESSION['id'])) {
            $_SESSION['notify'] = "El usuario debe autentificarse";

            header('location:' . URL . 'login');
        } else {

            # Saneamos los datos del formulario
            // $nombre = filter_var($_POST['nombre'], FILTER_SANITIZE_SPECIAL_CHARS); sin operador de saignación de fusión de null
            $nombre = filter_var($_POST['nombre'] ??= '', FILTER_SANITIZE_SPECIAL_CHARS); // con operador de saignación de fusión de null
            $apellidos = filter_var($_POST['apellidos'] ??= '', FILTER_SANITIZE_SPECIAL_CHARS);
            $email = filter_var($_POST['email'] ??= '', FILTER_SANITIZE_EMAIL);
            $telefono = filter_var($_POST['telefono'] ??= '', FILTER_SANITIZE_SPECIAL_CHARS);
            $poblacion = filter_var($_POST['poblacion'] ??= '', FILTER_SANITIZE_SPECIAL_CHARS);
            $dni = filter_var($_POST['dni'] ??= '', FILTER_SANITIZE_SPECIAL_CHARS);
            $fechaNac = filter_var($_POST['fechaNac'] ??= '', FILTER_SANITIZE_SPECIAL_CHARS);
            $id_curso = filter_var($_POST['id_curso'] ??= '', FILTER_SANITIZE_NUMBER_INT);

            # Cargamos los datos del formulario
            $alumno = new classAlumno(
                null,
                $nombre,
                $apellidos,
                $email,
                $telefono,
                null,
                $poblacion,
                null,
                null,
                $dni,
                $fechaNac,
                $id_curso
            );

            # Validación
            $errores = [];

            // Nombre valor obligatorio
            // $nombre = ''; -> EJEMPLO PARA VERIFICAR QUE EL ERROR SE LANZA CORRECTAMENTE
            if (empty($nombre)) {
                $errores['nombre'] = 'El campo es obligatorio';
            }

            // Apellidos valor obligatorio
            if (empty($apellidos)) {
                $errores['apellidos'] = 'El campo es obligatorio';
            }

            // // Fecha Nacimiento:
            // $valores_fecha = explode('/', $fechaNac); // descomponemos la fecha en mes, día y año
            // if (empty($fechaNac)) {
            //     $errores['fechaNac'] = 'El campo es obligatorio';
            // } elseif (!checkdate($valores_fecha[1], $valores_fecha[0], $valores_fecha[2])) {
            //     $errores['fechaNac'] = 'La fecha introducida no es válida';
            // }

            // Email: obligatorio, formato válido y clave secundario
            if (empty($email)) {
                $errores['email'] = 'El campo es obligatorio';
            } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) { // VALIDAMOS EL EMAIL -> retorna booleano
                $errores['email'] = 'El formato del email no es válido';
            } else if (!$this->model->validateUniqueEmail($email)) {
                $errores['email'] = 'El email ya ha sido registrado';
            }

            // DNI: obligatorio, formato válido y único
            $options = [
                'options' => [ // ESTOS PARÁMETROS DEBEN LLAMARSE ASÍ
                    'regexp' => '/^(\d{8})([a-zA-Z])$/'
                ]
            ];

            if (empty($dni)) {
                $errores['dni'] = 'El campo es obligatorio';
            } else if (!filter_var($dni, FILTER_VALIDATE_REGEXP, $options)) { // VALIDAMOS EL EMAIL -> retorna booleano
                $errores['dni'] = 'El formato del dni no es válido';
            } else if (!$this->model->validateUniqueDni($dni)) {
                $errores['dni'] = 'El dni ya ha sido registrado';
            }

            // Validamos id_curso: obligatorio, número entero y existente
            if (empty($id_curso)) {
                $errores['id_curso'] = 'Debe seleccionar un curso';
            } else if (!filter_var($id_curso, FILTER_VALIDATE_INT)) { // VALIDAMOS EL EMAIL -> retorna booleano
                $errores['id_curso'] = 'El curso no es válido';
            } else if (!$this->model->validateCurso($id_curso)) {
                $errores['id_curso'] = 'El Curso no existe';
            }

            # Comprobamos validacion
            if (!empty($errores)) {
                // errores de validacion
                $_SESSION['alumno'] = serialize($alumno); // serializamos para tornar el objeto a string
                $_SESSION['error'] = 'Formulario no validado';
                $_SESSION['errores'] = $errores;

                # Redireccionamos a 
                header('location:' . URL . 'alumno/new');
            } else {
                # Añadir registro a la tabla
                $this->model->create($alumno);

                # Mensaje
                $_SESSION['mensaje'] = "Alumno creado correctamente";

                # Redirigimos al main de alumnos
                header('location:' . URL . 'alumno');
            }
        }
    }

    function edit($param = [])
    {
        # Mantenemos la sesion
        session_start();

        # Comprobamos si existe la variable de entorno $_SESSION['id']
        if (!isset($_SESSION['id'])) {
            $_SESSION['notify'] = "El usuario debe autentificarse";

            header('location:' . URL . 'login');
        } else {

            # obtengo el id del alumno que voy a editar
            // alumno/edit/4

            $id = $param[0];

            # asigno id a una propiedad de la vista
            $this->view->id = $id;

            # title
            $this->view->title = "Editar - Panel de control Alumnos";

            # obtener objeto de la clase alumno
            $this->view->alumno = $this->model->read($id);

            # obtener los cursos
            $this->view->cursos = $this->model->getCursos();

            # Para saber si el formulario viene de una no vaidacion
            # Comprobamos si hay errores -> esta variable se crea al lanzar un error de validacion
            if (isset($_SESSION['error'])) {
                // rescatemos el mensaje
                $this->view->error = $_SESSION['error'];

                // Autorellenamos el formulario
                $this->view->alumno = unserialize($_SESSION['alumno']);

                // Recupero array de errores específicos
                $this->view->errores = $_SESSION['errores'];

                // debemos liberar las variables de sesión ya que su cometido ha sido resuelto
                unset($_SESSION['error']);
                unset($_SESSION['errores']);
                unset($_SESSION['alumnos']);
                // Si estas variables existen cuando no hay errores, entraremos en los bloques de error en las condicionales
            }

            # cargo la vista
            $this->view->render('alumno/edit/index');

        }

    }

    public function update($param = [])
    {

        # Iniciamos sesion
        session_start();

        # Comprobamos si existe la variable de entorno $_SESSION['id']
        if (!isset($_SESSION['id'])) {
            $_SESSION['notify'] = "El usuario debe autentificarse";

            header('location:' . URL . 'login');
        } else {

            # 1. Saneamos los datos del formulario
            # Saneamos los datos del formulario
            // $nombre = filter_var($_POST['nombre'], FILTER_SANITIZE_SPECIAL_CHARS); sin operador de saignación de fusión de null
            $nombre = filter_var($_POST['nombre'] ??= '', FILTER_SANITIZE_SPECIAL_CHARS); // con operador de saignación de fusión de null
            $apellidos = filter_var($_POST['apellidos'] ??= '', FILTER_SANITIZE_SPECIAL_CHARS);
            $email = filter_var($_POST['email'] ??= '', FILTER_SANITIZE_EMAIL);
            $telefono = filter_var($_POST['telefono'] ??= '', FILTER_SANITIZE_SPECIAL_CHARS);
            $poblacion = filter_var($_POST['poblacion'] ??= '', FILTER_SANITIZE_SPECIAL_CHARS);
            $dni = filter_var($_POST['dni'] ??= '', FILTER_SANITIZE_SPECIAL_CHARS);
            $fechaNac = filter_var($_POST['fechaNac'] ??= '', FILTER_SANITIZE_SPECIAL_CHARS);
            $id_curso = filter_var($_POST['id_curso'] ??= '', FILTER_SANITIZE_NUMBER_INT);


            # Cargo id del alumno
            $id = $param[0];

            # Con los detalles formulario creo objeto alumno a partir de los datos saneados
            $alumno = new classAlumno(

                null,
                $nombre,
                $apellidos,
                $email,
                $telefono,
                null,
                $poblacion,
                null,
                null,
                $dni,
                $fechaNac,
                $id_curso

            );

            # Cargo id del alumno a original
            $id = $param[0]; /// lo tenemos más arriva solo como ejemplo

            $alumno_original = $this->model->read($id);

            # VALIDACION
            // Sólo si es necesario
            // Sólo en caso de modificación el campo

            $errores = [];

            // validar nombre
            if (strcmp($alumno->nombre, $alumno_original->nombre) !== 0) { // EN PHP NO PODEMOS COMPARAR DOS STRING CON ==
                // nombre oblogatiorio
                if (empty($nombre)) {
                    $errores['nombre'] = 'El campo es obligatorio';
                }
            }

            // validar nombre
            if (strcmp($nombre, $alumno_original->nombre) !== 0) { // EN PHP NO PODEMOS COMPARAR DOS STRING CON ==
                // nombre oblogatiorio
                if (empty($nombre)) {
                    $errores['nombre'] = 'El campo es obligatorio';
                }
            }

            // validar apellidos
            if (strcmp($apellidos, $alumno_original->apellidos) !== 0) { // EN PHP NO PODEMOS COMPARAR DOS STRING CON ==
                // nombre oblogatiorio
                if (empty($apellidos)) {
                    $errores['apellidos'] = 'El campo es obligatorio';
                }
            }

            // validar email
            if (strcmp($email, $alumno_original->email) !== 0) { // EN PHP NO PODEMOS COMPARAR DOS STRING CON ==
                // Email: obligatorio, formato válido y clave secundario
                if (empty($email)) {
                    $errores['email'] = 'El campo es obligatorio';
                } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) { // VALIDAMOS EL EMAIL -> retorna booleano
                    $errores['email'] = 'El formato del email no es válido';
                } else if (!$this->model->validateUniqueEmail($email)) {
                    $errores['email'] = 'El email ya ha sido registrado';
                }
            }



            // DNI: obligatorio, formato válido y único
            $options = [
                'options' => [ // ESTOS PARÁMETROS DEBEN LLAMARSE ASÍ
                    'regexp' => '/^(\d{8})([a-zA-Z])$/'
                ]
            ];
            // validar dni
            if (strcmp($dni, $alumno_original->dni) !== 0) {
                if (empty($dni)) {
                    $errores['dni'] = 'El campo es obligatorio';
                } else if (!filter_var($dni, FILTER_VALIDATE_REGEXP, $options)) { // VALIDAMOS EL EMAIL -> retorna booleano
                    $errores['dni'] = 'El formato del dni no es válido';
                } else if (!$this->model->validateUniqueDni($dni)) {
                    $errores['dni'] = 'El dni ya ha sido registrado';
                }
            }


            if (strcmp($id_curso, $alumno_original->id_curso) !== 0) {
                // Validamos id_curso: obligatorio, número entero y existente
                if (empty($id_curso)) {
                    $errores['id_curso'] = 'Debe seleccionar un curso';
                } else if (!filter_var($id_curso, FILTER_VALIDATE_INT)) { // VALIDAMOS EL EMAIL -> retorna booleano
                    $errores['id_curso'] = 'El curso no es válido';
                } else if (!$this->model->validateCurso($id_curso)) {
                    $errores['id_curso'] = 'El Curso no existe';
                }
            }


            # Comprobamos validacion
            if (!empty($errores)) {
                // errores de validacion
                $_SESSION['alumno'] = serialize($alumno); // serializamos para tornar el objeto a string
                $_SESSION['error'] = 'Formulario no validado';
                $_SESSION['errores'] = $errores;

                # Redireccionamos a 
                header('location:' . URL . 'alumno/edit/' . $id);
            } else {
                # Añadir registro a la tabla
                $this->model->update($alumno, $id);

                # Mensaje
                $_SESSION['mensaje'] = "Alumno editado correctamente";

                # Redirigimos al main de alumnos
                header('location:' . URL . 'alumno');
            }

        }
    }
    public function order($param = [])
    {


        # Iniciamos sesion
        session_start();

        # Comprobamos si existe la variable de entorno $_SESSION['id']
        if (!isset($_SESSION['id'])) {
            $_SESSION['notify'] = "El usuario debe autentificarse";

            header('location:' . URL . 'login');
        } else {

            # Obtengo criterio de ordenación
            $criterio = $param[0];

            # Creo la propiedad title de la vista
            $this->view->title = "Ordenar - Panel Control Alumnos";

            # Creo la propiedad alumnos dentro de la vista
            # Del modelo asignado al controlador ejecuto el método get();
            $this->view->alumnos = $this->model->order($criterio);

            # Cargo la vista principal de alumno
            $this->view->render('alumno/main/index');
        }
    }

    public function filter($param = [])
    {


        # Iniciamos sesion
        session_start();

        # Comprobamos si existe la variable de entorno $_SESSION['id']
        if (!isset($_SESSION['id'])) {
            $_SESSION['notify'] = "El usuario debe autentificarse";

            header('location:' . URL . 'login');
        } else {

            # Obtengo expresión de búsqueda
            $expresion = $_GET['expresion'];

            # Creo la propiedad title de la vista
            $this->view->title = "Buscar - Panel Control Alumnos";

            # Filtro a partir de la  expresión
            $this->view->alumnos = $this->model->filter($expresion);

            # Cargo la vista principal de alumno
            $this->view->render('alumno/main/index');
        }

    }




    public function delete($param = [])
    {

        # Iniciamos sesion
        session_start();

        # Comprobamos si existe la variable de entorno $_SESSION['id']
        if (!isset($_SESSION['id'])) {
            $_SESSION['notify'] = "El usuario debe autentificarse";

            header('location:' . URL . 'login');
        } else {

            $id = $param[0];

            # eliminar alumno 
            $this->model->delete($id);

            # generar mensaje
            $_SESSION['notify'] = 'Alumno eliminado correctamente';

            # redirecciono
            header('location:' . URL . 'alumno');
        }
    }
}

?>