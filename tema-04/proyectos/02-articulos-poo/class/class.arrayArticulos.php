<?php

/*
    class.arrayArticulos.php
    -> Simula la tabla articulos
    -> Cada elemento es un objeto de articulo
*/

class ArrayArticulos
{

    private $tabla;

    public function __construct(
        $tabla = []
    ) {
        // solo inicializa el array
        $this->tabla = $tabla;
    }

    /**
     * GETTERS Y SETTERS
     */
    /**
     * @return mixed
     */
    public function getTabla()
    {
        return $this->tabla;
    }

    /**
     * @param mixed $tabla 
     * @return self
     */
    public function setTabla($tabla): self
    {
        $this->tabla = $tabla;
        return $this;
    }

    # Cogemos el 
    static public function getCategorias()
    {
        $categorias = [
            'Portátiles',
            'PCs Sobremesa',
            'Componentes',
            'Pantallas',
            'Impresoras',
            'Tablets',
            'Móviles',
            'Fotografía',
            'Imagen',
            'Accesorios'

        ];
        // Ordenamos el array, manteniendo la asociación de indices
        asort($categorias);
        return $categorias;
    }

    static public function getMarcas()
    {
        $marcas = [
            'Apple',
            'Xiaomi',
            'Casio',
            'Nokia',
            'Logitech',
            'IBM',
            'BQ',
            'Hacendado'

        ];
        // Ordenamos el array, manteniendo la asociación de indices
        asort($marcas);
        return $marcas;
    }

    /**
     * Simula un acceso a una BBDD -> retorna un array de objetos
     */
    public function getDatos()
    {

        $tabla = [];

        $articulo = new Articulo(

            # Articulo 1

            1,
            'Laptop Acer Aspire 15',
            'A315-42',
            0,
            [1, 2, 3],
            10,
            799.99

        );

        # Añadimos el objeto a la tabla
        $this->tabla[] = $articulo;

        $articulo = new Articulo(

            # Articulo 2

            2,
            'Monitor HP 27 pulgadas',
            'HP27X',
            3,
            [1, 2, 0],
            15,
            299.99

        );

        # Añadimos el objeto a la tabla
        $this->tabla[] = $articulo;

        $articulo = new Articulo(

            # Articulo 3

            3,
            'Teclado mecánico Logitech G Pro',
            'G Pro X',
            5,
            [0, 0, 4],
            20,
            129.99

        );

        # Añadimos el objeto a la tabla
        $this->tabla[] = $articulo;

        $articulo = new Articulo(

            # Articulo 4

            4,
            'Mouse inalámbrico Logitech MX Master 3',
            'MX Master 3',
            3,
            [0, 2, 3],
            25,
            99.99

        );

        # Añadimos el objeto a la tabla
        $this->tabla[] = $articulo;

        $articulo = new Articulo(

            # Articulo 5

            5,
            'Smartphone Samsung Galaxy S21',
            'S21',
            2,
            [1, 1, 2],
            30,
            699.99

        );

        # Añadimos el objeto a la tabla
        $this->tabla[] = $articulo;

        return $tabla;
    }

    public function create(Articulo $data){
        // añadismo el nuevo elemento en la tabla
        $this->tabla[] = $data;
    } 

    /** 
     * podemos declararlo como estatico porque no modifica ningun atributo de la clase  
     * */
    static public function mostrarCategorias($categorias, $categoriasArticulos){

        $arrayCategorias = [];
        foreach($categoriasArticulos as $indice){
            $arrayCategorias[]=$categorias[$indice];
        }
        asort($arrayCategorias);
        return $arrayCategorias;

    }



}


?>