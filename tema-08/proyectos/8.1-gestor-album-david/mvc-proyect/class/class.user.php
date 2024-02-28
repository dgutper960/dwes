<?php 


    /*
        Creamos classUser
        -> Crear y editar usuarios
            -> No se atiende a la propiedad de encapsulamiento.
            -> Respetamos nombre y orden de la tabla en la BBDD
            -> Parámetros del constructor opcioneles

    */
    class classUser{

        public $id;
        public $name;
        public $email;
        public $password;
        public $password_confirm;

        public function __construct(
            $id = null, 
            $name = null,
            $email = null,
            $password = null,
            $password_confirm = null
    ){
            $this->id = $id;
            $this->name = $name;
            $this->email = $email;
            $this->password = $password;
            $this->password_confirm = $password_confirm;
    }

  
    }

