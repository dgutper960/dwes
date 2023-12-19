<?php

    class Alumno Extends Controller {

        function __construct() { /**Descriptivo (no necesario, usa constructor de Controller) */

            parent ::__construct();
            
            
        } // no es necesario pero lo dejamos por convención

        /*** Este método se carga de forma automática si no se especifica segundo parámetro en la url */
        function render() { /** Vista acociada a este controlador */

            /** Panel decontrol */
            $this->view->title = "Home - Panel de control";

            /** Cargamos los alumnos de la tabla */
            $this->view->alumnos = $this->model->get(); // propiedad objeto de la clase statment

            $this->view->render('alumno/main/index');
        }

        /**
         * Método new
         * - Crea un nuevo alumno
         */
        function new(){

            # Etiqueta title 
            # Cargar lista de cursos
            $this->view->cursos = $this->model->getCursos();'Añadir - Gestión Alumnos';

            

            # Cargamos la vista del formulario
            $this->view->render('alumno/new/index');

        }


        /**
         * Metodo Show
         * - Muestra los valores de un  registro
         */
        function show($param = []) {
            $this->view->render('alumno/show/index');	

        }

        /**
         * Metodo create
         * - como entrada
         */
        function create($param = []) {
            # Cargamos los datos del formulario
            $alumno = new classAlumno(
                null,
                $_POST['nombre'],
                $_POST['apellidos'],
                $_POST['email'],
                null,
                null,
                $_POST['poblacion'],
                null,
                null,
                $_POST['dni'],
                $_POST['fecaNac'],
                $_POST['id_curso']

            );

            # Validacion

            # Añadir registro a la tabla
            $this->model->create($alumno);

            # Redirigimos al main de alumnos
            header('location:'.URL.'alumno');
         }
    }
