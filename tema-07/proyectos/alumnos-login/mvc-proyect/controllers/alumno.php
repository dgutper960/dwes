<?php

class Alumno extends Controller
{

    function __construct()
    {

        parent::__construct();
    }

    function render()
    {
        # Inicio o continuo sesión
        session_start();

        # Compruebo ususario autentificado
        if (!isset($_SESSION['id'])) {
            $_SESSION['notify'] = "Usuario sin autentificar";

            header("location: " . URL . "login");
        } else {

            # Comprobar si existe mensaje
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
        # Iniciar o continuar sesión
        session_start();

        # Compruebo ususario autentificado
        if (!isset($_SESSION['id'])) {
            $_SESSION['notify'] = "Usuario sin autentificar";

            header("location: " . URL . "login");
        } else {

            # Crear un objeto alumno vacío
            $this->view->alumno = new classAlumno();

            # Comprobar si vuelvo de un registro no validado
            if (isset($_SESSION['error'])) {

                # Mensaje de error
                $this->view->error = $_SESSION['error'];

                # Autorrellenar formulario con los detalles del alumno
                $this->view->alumno = unserialize($_SESSION['alumno']);

                # Recupero array errores específicos
                $this->view->errores = $_SESSION['errores'];

                # Elimino las variables de sesión
                unset($_SESSION['error']);
                unset($_SESSION['alumno']);
                unset($_SESSION['errores']);
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
        # Iniciar sesión
        session_start();

        # Compruebo ususario autentificado
        if (!isset($_SESSION['id'])) {
            $_SESSION['notify'] = "Usuario sin autentificar";

            header("location: " . URL . "login");
        } else {

            # 1. Seguridad. Sanemaos los datos del formulario
            $nombre = filter_var($_POST['nombre'] ??= '', FILTER_SANITIZE_SPECIAL_CHARS);
            $apellidos = filter_var($_POST['apellidos'] ??= '', FILTER_SANITIZE_SPECIAL_CHARS);
            $email = filter_var($_POST['email'] ??= '', FILTER_SANITIZE_EMAIL);
            $telefono = filter_var($_POST['telefono'] ??= '', FILTER_SANITIZE_SPECIAL_CHARS);
            $poblacion = filter_var($_POST['poblacion'] ??= '', FILTER_SANITIZE_SPECIAL_CHARS);
            $dni = filter_var($_POST['dni'] ??= '', FILTER_SANITIZE_SPECIAL_CHARS);
            $fechaNac = filter_var($_POST['fechaNac'] ??= '', FILTER_SANITIZE_SPECIAL_CHARS);
            $id_curso = filter_var($_POST['id_curso'] ??= '', FILTER_SANITIZE_NUMBER_INT);

            # 2. Creamos alumno con los datos saneados
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

            # 3. Validación
            $errores = [];

            // Nombre: obligatorio
            $nombre = ''; //Prueba
            if (empty($nombre)) {
                $errores['nombre'] = 'El campo nombre es obligatorio';
            }

            // Apellidos: obligatorio
            if (empty($apellidos)) {
                $errores['apellidos'] = 'El campo apellidos es obligatorio';
            }

            // Email: obligatorio, formato válido y clave secundaria
            if (empty($email)) {
                $errores['email'] = 'El campo email es obligatorio';
            } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errores['email'] = 'Formato de email incorrecto';
            } else if (!$this->model->validateUniqueEmail($email)) {
                $errores['email'] = 'Este email ya está registrado';
            }

            // DNI: obligatorio, formato válido y clave secundaria
            $options = [
                'options' => [
                    'regexp' => '/^(\d{8})([A-Z])$/'
                ]
            ];

            if (empty($dni)) {
                $errores['dni'] = 'El campo DNI es obligatorio';
            } else if (!filter_var($dni, FILTER_VALIDATE_REGEXP, $options)) {
                $errores['dni'] = 'Formato de DNI incorrecto';
            } else if (!$this->model->validateUniqueDNI($dni)) {
                $errores['dni'] = 'Este DNI ya está registrado';
            }

            // FechaNac: obligatorio
            // $valores = explode('/', $fechaNac);

            // if (empty($fechaNac)) {
            //     $errores['fechaNac'] = 'El campo fecha nacimiento es obligatorio';
            // } else if (!checkdate($valores[1], $valores[0], $valores[2])) {
            //     $errores['fechaNac'] = 'Fecha no válida';
            // }

            // id_curso: obligatorio, entero, existente
            if (empty($id_curso)) {
                $errores['id_curso'] = 'Debe seleccionar un curso';
            } else if (!filter_var($id_curso, FILTER_VALIDATE_INT)) {
                $errores['id_curso'] = 'Curso no válido';
            } else if (!$this->model->validateCurso($id_curso)) {
                $errores['id_curso'] = 'Curso no existente';
            }

            # 4. Comprobar validación
            if (!empty($errores)) {
                // Errores de validación
                // Variables de sesión no admiten objetos
                $_SESSION['alumno'] = serialize($alumno);
                $_SESSION['error'] = 'Formulario no ha sido validado';
                $_SESSION['errores'] = $errores;

                # Redireccionamos a new
                header('location:' . URL . 'alumno/new');
            } else {
                # Añadir registro a la tabla
                $this->model->create($alumno);

                # Crear mensaje
                $_SESSION["mensaje"] = "Alumno creado correctamente";

                # Redirigimos al main de alumnos
                header('location:' . URL . 'alumno');
            }
        }
    }

    function edit($param = [])
    {
        # Iniciar sesión
        session_start();

        # Compruebo ususario autentificado
        if (!isset($_SESSION['id'])) {
            $_SESSION['notify'] = "Usuario sin autentificar";

            header("location: " . URL . "login");
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

            # Comprobar si el formulario viene de una no validación
            # Comprobar si vuelvo de un registro no validado
            if (isset($_SESSION['error'])) {

                # Mensaje de error
                $this->view->error = $_SESSION['error'];

                # Autorrellenar formulario con los detalles del alumno
                $this->view->alumno = unserialize($_SESSION['alumno']);

                # Recupero array errores específicos
                $this->view->errores = $_SESSION['errores'];

                # Elimino las variables de sesión
                unset($_SESSION['error']);
                unset($_SESSION['alumno']);
                unset($_SESSION['errores']);
            }

            # cargo la vista
            $this->view->render('alumno/edit/index');
        }
    }

    public function update($param = [])
    {
        # Iniciar sesión
        session_start();

        # Compruebo ususario autentificado
        if (!isset($_SESSION['id'])) {
            $_SESSION['notify'] = "Usuario sin autentificar";

            header("location: " . URL . "login");
        } else {

            # 1. Saneamos datos del formulario FILTER_SANITIZE
            $nombre = filter_var($_POST['nombre'] ??= '', FILTER_SANITIZE_SPECIAL_CHARS);
            $apellidos = filter_var($_POST['apellidos'] ??= '', FILTER_SANITIZE_SPECIAL_CHARS);
            $email = filter_var($_POST['email'] ??= '', FILTER_SANITIZE_EMAIL);
            $telefono = filter_var($_POST['telefono'] ??= '', FILTER_SANITIZE_SPECIAL_CHARS);
            $poblacion = filter_var($_POST['poblacion'] ??= '', FILTER_SANITIZE_SPECIAL_CHARS);
            $dni = filter_var($_POST['dni'] ??= '', FILTER_SANITIZE_SPECIAL_CHARS);
            $fechaNac = filter_var($_POST['fechaNac'] ??= '', FILTER_SANITIZE_SPECIAL_CHARS);
            $id_curso = filter_var($_POST['id_curso'] ??= '', FILTER_SANITIZE_NUMBER_INT);

            # 2. Creamos el objeto alumno con los datos saneados del formulario
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

            # Cargo id del alumno que voy a actualizar
            $id = $param[0];

            # Obtengo el objeto alumno original
            $alumno_orig = $this->model->read($id);

            // # Actualizo base  de datos
            // $this->model->update($alumno, $id);

            // # Cargo el controlador principal de alumno
            // header('location:' . URL . 'alumno');

            # 3. Validación
            // Sólo si es necesario
            // Sólo en caso de modificación del campo
            $errores = [];

            // Validar nombre
            if (strcmp($alumno->nombre, $alumno_orig->nombre) !== 0) {
                if (empty($nombre)) {
                    $errores['nombre'] = 'El campo nombre es obligatorio';
                }
            }

            // Validar apellidos
            if (strcmp($alumno->apellidos, $alumno_orig->apellidos) !== 0) {
                if (empty($apellidos)) {
                    $errores['apellidos'] = 'El campo apellidos es obligatorio';
                }
            }

            // Email: obligatorio, formato válido y clave secundaria
            if (strcmp($alumno->email, $alumno_orig->email) !== 0) {
                if (empty($email)) {
                    $errores['email'] = 'El campo email es obligatorio';
                } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $errores['email'] = 'Formato de email incorrecto';
                } else if (!$this->model->validateUniqueEmail($email)) {
                    $errores['email'] = 'Este email ya está registrado';
                }
            }

            // DNI: obligatorio, formato válido y clave secundaria
            if (strcmp($alumno->dni, $alumno_orig->dni) !== 0) {
                $options = [
                    'options' => [
                        'regexp' => '/^(\d{8})([A-Z])$/'
                    ]
                ];

                if (empty($dni)) {
                    $errores['dni'] = 'El campo DNI es obligatorio';
                } else if (!filter_var($dni, FILTER_VALIDATE_REGEXP, $options)) {
                    $errores['dni'] = 'Formato de DNI incorrecto';
                } else if (!$this->model->validateUniqueDNI($dni)) {
                    $errores['dni'] = 'Este DNI ya está registrado';
                }
            }

            // FechaNac: obligatorio
            // $valores = explode('/', $fechaNac);

            // if (empty($fechaNac)) {
            //     $errores['fechaNac'] = 'El campo fecha nacimiento es obligatorio';
            // } else if (!checkdate($valores[1], $valores[0], $valores[2])) {
            //     $errores['fechaNac'] = 'Fecha no válida';
            // }

            // id_curso: obligatorio, entero, existente
            if (strcmp($alumno->id_curso, $alumno_orig->id_curso) !== 0) {
                if (empty($id_curso)) {
                    $errores['id_curso'] = 'Debe seleccionar un curso';
                } else if (!filter_var($id_curso, FILTER_VALIDATE_INT)) {
                    $errores['id_curso'] = 'Curso no válido';
                } else if (!$this->model->validateCurso($id_curso)) {
                    $errores['id_curso'] = 'Curso no existente';
                }
            }

            # 4. Comprobar validación
            if (!empty($errores)) {
                // Errores de validación
                // Variables de sesión no admiten objetos
                $_SESSION['alumno'] = serialize($alumno);
                $_SESSION['error'] = 'Formulario no ha sido validado';
                $_SESSION['errores'] = $errores;

                # Redireccionamos a new
                header('location:' . URL . 'alumno/edit/' . $id);
            } else {
                # Actualizo registro
                $this->model->update($alumno, $id);

                # Crear mensaje
                $_SESSION["mensaje"] = "Alumno actualizado correctamente";

                # Redirigimos al main de alumnos
                header('location:' . URL . 'alumno');
            }

            # Con los detalles formulario creo objeto alumno
            // $alumno = new classAlumno(

            //     null,
            //     $_POST['nombre'],
            //     $_POST['apellidos'],
            //     $_POST['email'],
            //     $_POST['telefono'],
            //     null,
            //     $_POST['poblacion'],
            //     null,
            //     null,
            //     $_POST['dni'],
            //     $_POST['fechaNac'],
            //     $_POST['id_curso']

            // );
        }
    }

    public function order($param = [])
    {
        # Iniciar sesión
        session_start();

        # Compruebo ususario autentificado
        if (!isset($_SESSION['id'])) {
            $_SESSION['notify'] = "Usuario sin autentificar";

            header("location: " . URL . "login");
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
        # Iniciar sesión
        session_start();

        # Compruebo ususario autentificado
        if (!isset($_SESSION['id'])) {
            $_SESSION['notify'] = "Usuario sin autentificar";

            header("location: " . URL . "login");
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
}
