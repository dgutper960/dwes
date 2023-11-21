<?php

/*
        Tabla de Usuarios.

        Es un array donde cada elemento es un objeto de la clase
        Usuario.
    */

class TablaJugadores
{

    private $tabla;

    public function __construct(
        // inicializamos el array
        $tabla = []
    ) {
        $this->tabla = $tabla;
    }

    /**
     * Creamos los método estáticos para cargar los equipos, paises y posiciones
     */
    static public function getEquipos()
    {
        $equipos = [
            'Real Madrid',
            'Barcelona',
            'Betis',
            'Sevilla',
            'Valencia',
            'Rayo Vallecano',
            'Ath Bilbao',
            'Levante',
            'Real Sociedad',
            'Osasuna'
        ];
        // ordenamos la lista
        asort($equipos);
        return $equipos;
    }

    static public function getPaises()
    {
        $paises = array("Afganistán", "Albania", "Alemania", "Andorra", "Angola", "Antigua y Barbuda", "Arabia Saudita", "Argelia", "Argentina", "Armenia", "Australia", "Austria", "Azerbaiyán", "Bahamas", "Bangladés", "Barbados", "Baréin", "Bélgica", "Belice", "Benín", "Bielorrusia", "Birmania", "Bolivia", "Bosnia y Herzegovina", "Botsuana", "Brasil", "Brunéi", "Bulgaria", "Burkina Faso", "Burundi", "Bután", "Cabo Verde", "Camboya", "Camerún", "Canadá", "Catar", "Chad", "Chile", "China", "Chipre", "Ciudad del Vaticano", "Colombia", "Comoras", "Corea del Norte", "Corea del Sur", "Costa de Marfil", "Costa Rica", "Croacia", "Cuba", "Dinamarca", "Dominica", "Ecuador", "Egipto", "El Salvador", "Emiratos Árabes Unidos", "Eritrea", "Eslovaquia", "Eslovenia", "España", "Estados Unidos", "Estonia", "Etiopía", "Filipinas", "Finlandia", "Fiyi", "Francia", "Gabón", "Gambia", "Georgia", "Ghana", "Granada", "Grecia", "Guatemala", "Guyana", "Guinea", "Guinea ecuatorial", "Guinea-Bisáu", "Haití", "Honduras", "Hungría", "India", "Indonesia", "Irak", "Irán", "Irlanda", "Islandia", "Islas Marshall", "Islas Salomón", "Israel", "Italia", "Jamaica", "Japón", "Jordania", "Kazajistán", "Kenia", "Kirguistán", "Kiribati", "Kuwait", "Laos", "Lesoto", "Letonia", "Líbano", "Liberia", "Libia", "Liechtenstein", "Lituania", "Luxemburgo", "Madagascar", "Malasia", "Malaui", "Maldivas", "Malí", "Malta", "Marruecos", "Mauricio", "Mauritania", "México", "Micronesia", "Moldavia", "Mónaco", "Mongolia", "Montenegro", "Mozambique", "Namibia", "Nauru", "Nepal", "Nicaragua", "Níger", "Nigeria", "Noruega", "Nueva Zelanda", "Omán", "Países Bajos", "Pakistán", "Palaos", "Palestina", "Panamá", "Papúa Nueva Guinea", "Paraguay", "Perú", "Polonia", "Portugal", "Reino Unido", "República Centroafricana", "República Checa", "República de Macedonia", "República del Congo", "República Democrática del Congo", "República Dominicana", "República Sudafricana", "Ruanda", "Rumanía", "Rusia", "Samoa", "San Cristóbal y Nieves", "San Marino", "San Vicente y las Granadinas", "Santa Lucía", "Santo Tomé y Príncipe", "Senegal", "Serbia", "Seychelles", "Sierra Leona", "Singapur", "Siria", "Somalia", "Sri Lanka", "Suazilandia", "Sudán", "Sudán del Sur", "Suecia", "Suiza", "Surinam", "Tailandia", "Tanzania", "Tayikistán", "Timor Oriental", "Togo", "Tonga", "Trinidad y Tobago", "Túnez", "Turkmenistán", "Turquía", "Tuvalu", "Ucrania", "Uganda", "Uruguay", "Uzbekistán", "Vanuatu", "Venezuela", "Vietnam", "Yemen", "Yibuti", "Zambia", "Zimbabue");

        return $paises;
    }

    static public function getPosiciones()
    {
        $posiciones = [
            'Portero',
            'Central',
            'Lateral',
            'Mediocentro',
            'Centrocampista',
            'Extremo',
            'Delantero'
        ];
        // ordenamos la lista
        asort($posiciones);
        return $posiciones;

    }

    /**
     * Metodo getDatos que retorna la tabla de jugadores
     */
    public function getDatos()
    {

        // creamos un jugador y lo cargamos en la tabla
        $jugador = new Jugador(

            1,
            'Juaquín',
            10,
            5,
            2,
            [5, 6],
            50.000

        );
        // añadimos el jugador a la tabla
        $this->tabla[] = $jugador;

        // creamos un jugador y lo cargamos en la tabla
        $jugador = new Jugador(

            2,
            'Maradona',
            10,
            11,
            1,
            [1,2,3,4,5,6],
            500.000

        );
        // añadimos el jugador a la tabla
        $this->tabla[] = $jugador;

        // creamos un jugador y lo cargamos en la tabla
        $jugador = new Jugador(

            3,
            'Zubizarreta',
            1,
            20,
            1,
            [0],
            250.000

        );
        // añadimos el jugador a la tabla
        $this->tabla[] = $jugador;

    }


    # Create()
    # Delete()
    # Read()
    # Update()
    # getPaises()

    // $paises = array("Afganistán", "Albania", "Alemania", "Andorra", "Angola", "Antigua y Barbuda", "Arabia Saudita", "Argelia", "Argentina", "Armenia", "Australia", "Austria", "Azerbaiyán", "Bahamas", "Bangladés", "Barbados", "Baréin", "Bélgica", "Belice", "Benín", "Bielorrusia", "Birmania", "Bolivia", "Bosnia y Herzegovina", "Botsuana", "Brasil", "Brunéi", "Bulgaria", "Burkina Faso", "Burundi", "Bután", "Cabo Verde", "Camboya", "Camerún", "Canadá", "Catar", "Chad", "Chile", "China", "Chipre", "Ciudad del Vaticano", "Colombia", "Comoras", "Corea del Norte", "Corea del Sur", "Costa de Marfil", "Costa Rica", "Croacia", "Cuba", "Dinamarca", "Dominica", "Ecuador", "Egipto", "El Salvador", "Emiratos Árabes Unidos", "Eritrea", "Eslovaquia", "Eslovenia", "España", "Estados Unidos", "Estonia", "Etiopía", "Filipinas", "Finlandia", "Fiyi", "Francia", "Gabón", "Gambia", "Georgia", "Ghana", "Granada", "Grecia", "Guatemala", "Guyana", "Guinea", "Guinea ecuatorial", "Guinea-Bisáu", "Haití", "Honduras", "Hungría", "India", "Indonesia", "Irak", "Irán", "Irlanda", "Islandia", "Islas Marshall", "Islas Salomón", "Israel", "Italia", "Jamaica", "Japón", "Jordania", "Kazajistán", "Kenia", "Kirguistán", "Kiribati", "Kuwait", "Laos", "Lesoto", "Letonia", "Líbano", "Liberia", "Libia", "Liechtenstein", "Lituania", "Luxemburgo", "Madagascar", "Malasia", "Malaui", "Maldivas", "Malí", "Malta", "Marruecos", "Mauricio", "Mauritania", "México", "Micronesia", "Moldavia", "Mónaco", "Mongolia", "Montenegro", "Mozambique", "Namibia", "Nauru", "Nepal", "Nicaragua", "Níger", "Nigeria", "Noruega", "Nueva Zelanda", "Omán", "Países Bajos", "Pakistán", "Palaos", "Palestina", "Panamá", "Papúa Nueva Guinea", "Paraguay", "Perú", "Polonia", "Portugal", "Reino Unido", "República Centroafricana", "República Checa", "República de Macedonia", "República del Congo", "República Democrática del Congo", "República Dominicana", "República Sudafricana", "Ruanda", "Rumanía", "Rusia", "Samoa", "San Cristóbal y Nieves", "San Marino", "San Vicente y las Granadinas", "Santa Lucía", "Santo Tomé y Príncipe", "Senegal", "Serbia", "Seychelles", "Sierra Leona", "Singapur", "Siria", "Somalia", "Sri Lanka", "Suazilandia", "Sudán", "Sudán del Sur", "Suecia", "Suiza", "Surinam", "Tailandia", "Tanzania", "Tayikistán", "Timor Oriental", "Togo", "Tonga", "Trinidad y Tobago", "Túnez", "Turkmenistán", "Turquía", "Tuvalu", "Ucrania", "Uganda", "Uruguay", "Uzbekistán", "Vanuatu", "Venezuela", "Vietnam", "Yemen", "Yibuti", "Zambia", "Zimbabue");

    # getPosiciones()
    /*
    
        $posiciones = [
            'Portero',
            'Central',
            'Lateral',
            'Mediocentro',
            'Centrocampista',
            'Extremo',
            'Delantero'
        ];

    */

    # getEquipos()

    /*
        $equipos = [
            'Real Madrid',
            'Barcelona',
            'Betis',
            'Sevilla',
            'Valencia',
            'Rayo Vallecano',
            'Ath Bilbao',
            'Levante',
            'Real Sociedad',
            'Osasuna'
        ];
    */

    # getDatos()

    # getEncabezado()

    /*
         $encabezado = [
             'Id',
             'Nombre',
             'Num',
             'Pais',
             'Equipo',
             'Posiciones',
             'Contrato',
             'Acciones'
         ];
     */



    # Devuelve el array con los nombres de las posiciones de un jugador
    // Hacemos el metodo estático para facilitar el manejo, ya que no modifica la clase
    static public function listaPosiciones($indicesPosiciones, $posiciones)
    {
        // creamos array lista
        $lista = [];
        // recorremos las posiciones del jugador y cargamos la lista con loss nombres de indices coincidentes 
        foreach ($indicesPosiciones as $indice) {
            $lista[] = $posiciones[$indice];
    }
    // ordenamos la lista 
    asort($lista);
    // la retornamos como string
    return implode(', ',$lista);

}

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
     * Funcion create -> nuevo.php
     */
    public function create(Jugador $data){ // se espera un objeto de la clase Jugador
        $this->tabla[] = $data;
    }

    public function read($indice){
        return $this->tabla[$indice];
    }
}
