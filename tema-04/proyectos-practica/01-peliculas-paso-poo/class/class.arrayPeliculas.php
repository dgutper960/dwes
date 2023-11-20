<?php

/**
 * Creamos la clase arrayPeliculas
 * -> Solo dispondrá de un atributo, el cual será un array
 * -> Dicho array debe inicializar en el constructor
 * -> El resto de métodos de este proyecto serán de esta clase
 */

class ArrayPeliculas
{

    private $tabla;

    // constuctor que inicializa el array
    public function __construct(
        // declaramos que tabla es un array
        $tabla = []
    ) {
        $this->tabla = $tabla;
    }

    /**
     * Visibilidad de tabla privada
     */



    /**
     * Get the value of tabla
     */
    public function getTabla()
    {
        return $this->tabla;
    }

    /**
     * Set the value of tabla
     */
    public function setTabla($tabla): self
    {
        $this->tabla = $tabla;

        return $this;
    }

    /**
     * Creamos la funcion que carga los generos
     * -> Este metodo puede ser estático
     */
    static public function getGeneros()
    {

        $generos = [

            'Comedia',
            'Bélico',
            'Drama',
            'Crimen',
            'Terror',
            'Accion',
            'Histórico',
            'Animación',
            'Adaptación',
            'Romance',
            'Ciencia Ficción',
            'Documental',
            'Musical'
        ];
        // ordenamos el array manteniendo la sociación de índices
        asort($generos);
        return $generos;
    }

    /**
     * Creamos la funcion que carga los paises
     * -> Este metodo puede ser estático
     */
    static public function getPaises()
    {
        $paises = array("Afganistán", "Albania", "Alemania", "Andorra", "Angola", "Antigua y Barbuda", "Arabia Saudita", "Argelia", "Argentina", "Armenia", "Australia", "Austria", "Azerbaiyán", "Bahamas", "Bangladés", "Barbados", "Baréin", "Bélgica", "Belice", "Benín", "Bielorrusia", "Birmania", "Bolivia", "Bosnia y Herzegovina", "Botsuana", "Brasil", "Brunéi", "Bulgaria", "Burkina Faso", "Burundi", "Bután", "Cabo Verde", "Camboya", "Camerún", "Canadá", "Catar", "Chad", "Chile", "China", "Chipre", "Ciudad del Vaticano", "Colombia", "Comoras", "Corea del Norte", "Corea del Sur", "Costa de Marfil", "Costa Rica", "Croacia", "Cuba", "Dinamarca", "Dominica", "Ecuador", "Egipto", "El Salvador", "Emiratos Árabes Unidos", "Eritrea", "Eslovaquia", "Eslovenia", "España", "Estados Unidos", "Estonia", "Etiopía", "Filipinas", "Finlandia", "Fiyi", "Francia", "Gabón", "Gambia", "Georgia", "Ghana", "Granada", "Grecia", "Guatemala", "Guyana", "Guinea", "Guinea ecuatorial", "Guinea-Bisáu", "Haití", "Honduras", "Hungría", "India", "Indonesia", "Irak", "Irán", "Irlanda", "Islandia", "Islas Marshall", "Islas Salomón", "Israel", "Italia", "Jamaica", "Japón", "Jordania", "Kazajistán", "Kenia", "Kirguistán", "Kiribati", "Kuwait", "Laos", "Lesoto", "Letonia", "Líbano", "Liberia", "Libia", "Liechtenstein", "Lituania", "Luxemburgo", "Madagascar", "Malasia", "Malaui", "Maldivas", "Malí", "Malta", "Marruecos", "Mauricio", "Mauritania", "México", "Micronesia", "Moldavia", "Mónaco", "Mongolia", "Montenegro", "Mozambique", "Namibia", "Nauru", "Nepal", "Nicaragua", "Níger", "Nigeria", "Noruega", "Nueva Zelanda", "Omán", "Países Bajos", "Pakistán", "Palaos", "Palestina", "Panamá", "Papúa Nueva Guinea", "Paraguay", "Perú", "Polonia", "Portugal", "Reino Unido", "República Centroafricana", "República Checa", "República de Macedonia", "República del Congo", "República Democrática del Congo", "República Dominicana", "República Sudafricana", "Ruanda", "Rumanía", "Rusia", "Samoa", "San Cristóbal y Nieves", "San Marino", "San Vicente y las Granadinas", "Santa Lucía", "Santo Tomé y Príncipe", "Senegal", "Serbia", "Seychelles", "Sierra Leona", "Singapur", "Siria", "Somalia", "Sri Lanka", "Suazilandia", "Sudán", "Sudán del Sur", "Suecia", "Suiza", "Surinam", "Tailandia", "Tanzania", "Tayikistán", "Timor Oriental", "Togo", "Tonga", "Trinidad y Tobago", "Túnez", "Turkmenistán", "Turquía", "Tuvalu", "Ucrania", "Uganda", "Uruguay", "Uzbekistán", "Vanuatu", "Venezuela", "Vietnam", "Yemen", "Yibuti", "Zambia", "Zimbabue");
        return $paises;
    }

    /**
     * Declartamos las primeras películas con las que iniciamos el proyecto
     */
    public function getDatos()
    {

        // usamos un nombre genérico para un array vacío
        $tabla = [];

        // instanciamos pelicula y esta variable la vamos a sobreescribir después
        $pelicula = new Pelicula(

            1,
            "El Gran Lebowski",
            "Joel Coen",
            [0],
            54,
            1998
        );
        // añadimos los valores a la tabla
        $this->tabla[] = $pelicula;

        // reiniciamos $pelicula y esta variable la vamos a sobreescribir después
        $pelicula = new Pelicula(

            2,
            "El Padrino",
            "Francis Ford Coppola",
            [2, 3],
            2,
            1972
        );
        // añadimos los valores a la tabla
        $this->tabla[] = $pelicula;

        // reiniciamos $pelicula y esta variable la vamos a sobreescribir después
        $pelicula = new Pelicula(

            3,
            "Inception",
            "Christopher Nolan",
            [10, 5],
            56,
            2010
        );
        // añadimos los valores a la tabla
        $this->tabla[] = $pelicula;

        // reiniciamos $pelicula y esta variable la vamos a sobreescribir después
        $pelicula = new Pelicula(
            4,
            "La La Land",
            "Damien Chazelle",
            [3, 8],
            89,
            2016
        );
        // añadimos los valores a la tabla
        $this->tabla[] = $pelicula;

        // reiniciamos $pelicula y esta variable la vamos a sobreescribir después
        $pelicula = new Pelicula(

            5,
            "Parásitos",
            "Bong Joon-ho",
            [5, 8, 9],
            22,
            2019
        );
        // añadimos los valores a la tabla
        $this->tabla[] = $pelicula;

        // reiniciamos $pelicula y esta variable la vamos a sobreescribir después
        $pelicula = new Pelicula(

            6,
            "Coco",
            "Lee Unkrich",
            [12, 2, 9],
            87,
            2017
        );
        // añadimos los valores a la tabla
        $this->tabla[] = $pelicula;

        // reiniciamos $pelicula y esta variable la vamos a sobreescribir después
        $pelicula = new Pelicula(

            7,
            "Matrix",
            "Lana Wachowski, Lilly Wachowski",
            [5, 10],
            86,
            1999
        );
        // añadimos los valores a la tabla
        $this->tabla[] = $pelicula;

        // retornamos la tabla
        return $tabla;
    }

    /**
     * Debemos tener una función para mostrar las categorñias como string
     * -> Toma la tabla de generos y los generos de una pelicula dada
     * -> Al no modificar la tabla de la clase puede ser un método estático
     */
    static public function mostrarGeneros($generos, $generosPelicula){
        // creamos un array vacio
        $arrayGeneros = [];
        // recorremos los generos de la pelicula (contiene una serie de numeros)
        foreach($generosPelicula as $indice){
            $arrayGeneros[] = $generos[$indice]; //igualamos el nuevo array con los valores que correspondan de $generos
        }
        // ordenamos el nuevo array
        asort($arrayGeneros);
        // converimos el array a string
        $listaGeneros = implode(", ", $arrayGeneros); // separador

        // retonamos la lista de generos
        return $listaGeneros;
    }


}


?>