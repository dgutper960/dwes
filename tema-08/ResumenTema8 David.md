# Gestión de Archivos y Directorios

PHP propone un sinfín de funciones La gestión de archivos.

→ Las más elementales requieren unicamente de nombre y path del archivo.

→ Las más complejas requieren de la apretura previa del archivo.

## Abrir un Archivo

Para abrir ficheros usaremos la función de PHP fopen()

- **fopen():**

  - Requiere dos parámetros:

    - Archivo que se quiere abrir
    - Modo en el que se abre

  - Si la apretura del fichero es satsifactoria:

    - La función devuelve un puntero en el archivo.

  - Si la apretura falla:

    - La función devuelve 0.

  - Los archivos se abren para realizar opreaciones de lectura o escritura.

  - Sintaxis

  ```
  $pf = fopen("miarchivo.txt", "r");
  ```

  - Se recomienda el control de fallos en la apertura:

  ```
  if($pf = fopen("miarchivo.txt", "r");){
      // mi codigo para manejar el contenido
  }else{
      echo "Error en la apertura del fichero";
  }
  ```

  ```
  if (!$fp = fopen("miarchivo.txt", "r")){
  echo "Error al abrir el archivo";
  }
  ```

### Modos de apertura para fopen():

- r

  - Lectura
  - Puntero al principio

- r+

  - Lectura y escritura
  - Puntero al principio (sobreescribe)
  - Si no existe lo crea

- w

  - Escritura
  - Puntero al principio
  - Si no existe se crea

- w+

  - Lecturta y escritura
  - Puntero al principio
  - Si no existe se crea

- a

  - Escritura
  - Puntero al final
  - Si no existe se crea

- a+

  - Lectura y escritura
  - Puntero al final
  - Si no existe se crea

- x

  - Creación y escritura
  - Puntero al principio
  - Si existe dará E_WARNING

- x+

  - Creación, lectura y escritura
  - Puntero al principio
  - Si existe dará E_WARNING

- c

  - Escritura
  - Puntero al principio
  - Si existe no sobreescribe y no da error
  - Si no existe se crea

- c+
  - Lectura y escritura
  - Puntero al principio
  - Si existe no sobreescribe y no da error
  - Si no existe se crea

#### Consideraciones de fopen()

- Si el archivo no es de escritura tendremos un fallo (retorna 0)

  - Incluso con aperturas en modo de solo lectura.

- w / w+

  - Eliminan el contenido previo de cualquer archivo

- a / a+

  - Para solo añadir contenido, sin riesgo sobreescribir

- x / x+ / c / c+

  - Para crear nuevos archivos sin riesgo a sobreescribir uno existente

- Para archivos binarios (imágentes) hay que añadir b después del modo.
  - ejemplo:
  $fp = fopen("/apr2/imagen.jpg", "r+b");

**IMPORTANTE:** los sistemas Windows usan \r\n como caracteres de final de línea, los basados
en UNIX usan \n y los sistemas basados en sistemas MACintosh usan \r:
**para evitar incompatibilidades es recomendable usar el modificador b.**

#### ejemplos de apertura en diferentes modos:

```
$fp = fopen("/apr2/fichero.txt", "r");
$fp = fopen("/apr2/fichero2.txt", "w");
$fp = fopen("http://www.aprenderaprogramar.com/texto.txt", "a+");
$fp = fopen("ftp://ftp.elmundo.es/fichero.txt", "w");
```

## Cerrar un Archivo

Una vez hayamos terminado de realizar las operaciones deseadas con el archivo es necesario cerrarlo usando la función **fclose()**

- Será en este momento cuando se escriban los cámbios pendientes en el buffer.


```
$gestor = fopen('archivo.txt', 'r');
// código para la manipulacion del archivo
fclose($gestor);

```

## Escribir en un Archivo

- Para insertar texto en un archivo usaremos las funciones **fwrite()** o **fputs()**

- En caso de error retornan false

```
$file = "miarchivo.txt";
$texto = "Hola que tal";
$fp = fopen($file, "w");
fwrite($fp, $texto);
fclose($fp);
```

- Ejemplo para limitar la longitud de datos que queremos escribir:

```
$file = "miarchivo.txt";
$texto = "Hola que tal";
$fp = fopen($file, "w");
fwrite($fp, $texto, 4); // Escribirá sólo: Hola

```

- El tamaño del buffer para escritura suele ser de 8k

- Si hay dos procesos esperando a escribir en un archivo, cada uno se pausará después de
  escribir 8K de información para permitir que el otro escriba.

- **set_file_buffer()**

  - Define el tamaño del buffer

- **fflush()**
  - Fuerza a escribir los cámbios pendientes en el buffer

```
<?php
 // Abrir el archivo, creándolo si no existe:
 $archivo = fopen("datos.txt","w+b");
 if( $archivo == false ) {
    echo "Error al crear el archivo";
 }else{
    // Escribir en el archivo:
    fwrite($archivo, "Estamos probando\r\n");
    fwrite($archivo, "el uso de archivos ");
    fwrite($archivo, "en PHP");
    // Forzamos el guardado de los cámbios antes del close()
    fflush($archivo);
 }
 // Cerrar el archivo:
 fclose($archivo);
?>

```
- **file_get_contents()**
  - Retorena el contenido de un archivo:
  - Maneja de forma automática la apertura y cierre del archivo

- **file_put_contents():**

  - Permite insertar texto en un archivo:
  - Maneja de forma automática la apertura y cierre del archivo

```
<?php
    $cadena = file_get_contents("datos.txt");
    $cadena .= "\r\nMe encanta PHP!";
    file_put_contents("datos.txt", $cadena);
?>

```

## Leer un aerchivo

- **fread()**

  - Retorna una cadena con el texto del archivo
  - El archivo a leer se indica en el primer parámetro
  - 2º parámetro (opcional)
    - Indica el núm de bytes que se deben leer.
  - El puntero al archivo quedará en la última posición leída.

- **filezise()**

  - Retorna el núm de bytes de un archivo

- **rewind()**
  - Vuelve a situar el puntero al principio

#### ejemplo de uso

La variable ***$contents*** guardará el contenido que obtengamos con la función fread(). 

Esta función requiere dos parámetros, el archivo abierto y la longitud que queremos leer de dicho
archivo (en bytes). 

En este caso hemos empleado la función **filesize()**

```
<?php

  $file = "miarchivo.txt";
  $fp = fopen($file, "r");
  $contents = fread($fp, filesize($file));

  # Abrir el archivo en modo de sólo lectura:
  $archivo = fopen("datos.txt","rb");
  if( $archivo == false ) {
    echo "Error al abrir el archivo";
  }else{
    $cadena1 = fread($archivo, 18);
    rewind($archivo);
    $cadena2 = fread($archivo, filesize("datos.txt"));
  if(($cadena1 == false) || ($cadena2 == false)){
   echo "Error al leer el archivo";
  }else{
    echo "<p>\$contenido1 es: [".$cadena1."]</p>";
    echo "<p>\$contenido2 es: [".$cadena2."]</p>";
    }
  }
  # Cerrar el archivo:
  fclose($archivo);


```

- **file_get_contents()**

  - Retorna todo el contenido del archivo en una cadena de texto
  - Podemos indicar la posición inicial del puntero
  - Retorna false en caso de error

- **File()**
  - Obtiene un array donde cada índice corresponde a una línea del texto
  - En caso de error retorna false
  - No requiere de apertura previa con fopen()

```
<?php
 $aCadena = file("datos.txt");
 print_r($aCadena);

```

- **fgets()**

  - Retorna una cadena con el contenido de la línea en la que se encuentra el puntero
  - Retorna false en caso de error

- **fgetss()**
  - Mismo comportamiento que fgets()
  - Limpia carácteres HTML
  - Retorna false en caso de error

```
<?php
 # Abrir el archivo en modo de sólo lectura:
 $archivo = fopen("datos.txt","rb");
 # Recorremos el archivo mostando el contenido de cada línea:
 while( !feof($archivo)
 {
 Echo fgets($archivo). "<br />";
 }
 fclose($archivo);

```

## Puntero de un archivo

Un puntero de archivo (file pointer o handle) es una variable que apunta a un archivo en concreto y su posición dentro del mismo. 

Se obtiene al abrir con fopen().

### Funciones realccionadas con el manejo del puntero

- **rewind()**

  - Situa el puntero al principio

- **ftell()**

  - Retorna la posición actual del puntero

- **fseek()**

  - Desplaza el puntero a una posición exacta

- **feof()**
  - Informa si el puntero se encuentra al final del archivo
  
  - Útil para recorrer archivos con un while

  ````
  <?php
      $file = fopen("archivo.txt", "r");

      // Lee la primera línea del archivo
      $line = fgets($file);

      // Recorre el archivo hasta que se alcance el final
      while (!feof($file)) {
          // Procesa la línea
          echo $line;

          // Lee la siguiente línea
          $line = fgets($file);
      }

      // Cierra el archivo
      fclose($file);
  ````
    - Vemos un ejemplo más simplificado

  ```
    $archivo = "miarchivo.txt";
    # Abrimos el archivo
    $fp = fopen($archivo, "r");
    # Loop que parará al final del archivo, cuando feof sea true:
    while(!feof($fp)){
    echo fread($fp, 4092);
    }
  ```


- **fseek()**

  - Mueve el puntero a una posición (seeking)
  - Como 2º parámetro se indica la posición
  - El 3er parámetro toma como referencia una posición relativa:
    - SEEK_END = final
    - SEEK_CUR = donde nos encontramos (ver ejemplo)
  - Se puede mover el puntero a una posición sin contenido

- **ftell()**
  - Muestra la posición del puntero

```
$file = "miarchivo.txt";
$texto = "Hola que tal 12345";
$fp = fopen($file, "w");
fwrite($fp, $texto);
fclose($fp);

$fp = fopen($file, "r");
# Si lo hemos abierto con r, siempre empieza desde el principio:
Echo ftell($fp) . "<br>"; // Devuelve 0

# Colocamos el apuntador en la posición 10:
fseek($fp, 10);

# Mostramos la posición actual:
echoftell($fp) . "<br>"; // Devuelve 10

# Se puede indicar una posición sin contenido:
fseek($fp, 1000);
echo ftell($fp) . "<br>"; // Devuelve 1000

# Para ir al final del archivo se emplea un tercer argumento en fseek:
fseek($fp, 0, SEEK_END);
echo ftell($fp) . "<br>"; // Devuelve 18

# Para mover el apuntador a una posición relativa se emplea SEEK_CUR:
fseek($fp, -5, SEEK_CUR);
echo ftell($fp) . "<br>"; // Devuelve 13

# Cambiar el puntero leyendo un archivo:
$file = "miarchivo.txt";
$fp = fopen($file, "r");

# Leemos 10 bytes
$datos = fread($fp, 10);
Echo ftell($fp); // Devuelve 10

# Cambiar el puntero escribiendo un archivo:
$file = "miarchivo.txt";
$texto = "12345";
$fp = fopen($file, "w");

# Escribimos los 5 bytes del texto:
fwrite($fp, $texto);
echo ftell($fp); // Devuelve 5

```

PHP y su recolector de basuras cierra todos los punteros de archivos al final de la ejecución
del script. Se considera una buena práctica cerrar los archivos manualmente con fclose().

## Obtener información de un archivo:

### Vemos las principales funciones

- **filesize()**

  - Retorna el tamaño en bytes de un archivo

- **filetype()**

  - Retorna el tipo de fichero (file, dir, block, char, fifo, link or unknown)

- **filemtime()**

  - Retorna la última modificación de un archivo

- **fileperms()**

  - Retorna la máscara de permisos UNIX

- **stat()** 
    - Retorna un array con infoemacion sobre un archivo abierto con fopen() 
    - Nombre del archivo como parametro

      ````
        $file = "miarchivo.txt";
        $texto = "Todos somos muy ignorantes, lo que ocurre es que no todos ignoramos las mismas cosas.";
        $fp = fopen($file, "w");
        fwrite($fp, $texto);
        $datos = stat($file);

        // recorremos los datos obtenidos con stat()
        $cont = 1;
        foreach($datos as $item){
            echo 'Informacion '.$cont.' => '.$item;
            $cont++,
        }

      ````

- **fstat()**

  - Mismo comportamiento que stat()
  - Recurso obtenido con fopen() como parametro

- **file_exist()**

  - Comprueba la existencia de un archivo

- **is_executable()**

  - Retorna booleano que indica si el archivo es ejecutable

- **is_writable()**

  - Retoprna booleano que indica si el archivo existe y es de escritura

- **file()**

  - Retorna booleano que indica si es un fichero

- **is_link**

  - Retorna booleano que indica si se trata de un enlace simbólico

- **is_dir**
  - Retorna booleano que indica si se trata de un directorio


## Copiar, renombrar, mover y eliminar archivos

- **copy()**
    - Equivalente a cp en Linux

- **unlink()**
    - Equivalente a rm en Linux

* Hay que tener en cuenta que al copiar un archivo a otro directorio, si existe uno con el mismo nombre será sobrescrito.

- **rename()**
    - Renombra un fichero
    - Mueve un fichero

Todas estas funciones devuelven true o false si ha ocurrido algún error.

````
    <?php
        # Copiar el archivo a otra ruta;
        copy("datos.txt", "c:\\datos.txt");

        # Copiar el archivo con otro nombre:
        copy("datos.txt", "datos-2.txt");
        copy("datos.txt", "datos-3.txt");
        copy("datos.txt", "datos-4.txt");

        # Renombrar el archivo:
        rename("datos-2.txt", "datos---2.txt");

        # Renombrar carpetas:
        rename("miCarpeta1", "miCarpeta1-1");
        rename("./miCarpeta2", "./miCarpeta2-2");

        # Mover el archivo:
        rename("datos-3.txt", "c:\\datos-3-3.txt");

        # Eliminar el archivo:
        unlink("datos-4.txt");

        echo "Proceso finalizado";

````

## Gestión de Directorios

* Las funciones de directorios vienen de la extensión directories de PHP

- **Chdir()** 
    -  Cambia de directorio

    ````
        Bool chdir (string $directory)
    ````

- **chroot()**
    - Cambia el directorio raíz
    - Requiere privilegios de administrador
    - El directorio que se indique ha de estar preparado para ser un directorio root.

- **closedir()**
    -  Cierra un gestor de directorio $dirhandle
        -  Si no se especifica se asumirá la última conexión abierta por opendir().

- **dir()**
    -  Devuelve una instancia de la clase Directory
    
- **getcwd()**
    -  Obtiene el directorio actual 
    ````
        String getcwd ( void )
        echo getcwd() . "\n"; // Directorio: /directorio/actual
        chdir('nuevo/directorio');
        echo getcwd() . "\n"; // Directorio: /directorio/actual/nuevo/directorio

    ````

- **opendir()**
    -  Abre un gestor de directorio para ser usado en llamadas posteriores (closerdir(), readdir(), rewinddir())

- **readdir()**
    -  Lee una entrada desde un gestor de directorio
    - $dirhandle es el gestor de directorio previamente abierto por opendir(). 
    - Si no se especifica se usa la última conexión abierta por 
    opendir(). 
    - Devuelve el nombre de la siguiente entrada del directorio.

    ````
    <?php
          $dir = '/ruta/al/directorio';
          if ($handle = opendir($dir)) {
              while (false !== ($entry = readdir($handle))) {
                  if ($entry != "." && $entry != "..") {
                      echo "$entry\n";
                  }
              }
              closedir($handle);
          }
    ````
  En este ejemplo, se abre el directorio especificado, se lee cada entrada con readdir(), y se imprime el nombre de cada entrada que no sea el directorio actual (.) ni el directorio padre (..). Finalmente, se cierra el directorio

- **rewinddir()**
    - Restablece la secuencia de directorio indicada por $dirhandle al comienzo del directorio. 
    - Si no se especifica el gestor, se asumirá la última conexión abierta por opendir().

- **scandir()**
    -  Enumera los ficheros y directorios ubicados en la ruta especificada

    ````
    array_scandir (string $directory [, int $sorting_order = SCANDIR_SORT_ASCENDING [, resource $context ]] )
    ````

    - Devuelve un array con los archivos y directorios que se encuentran en $directory
    - $sorting_order indica el orden en que se devuelve el listado

    ````
      $directorio = "Slim";
      $archivos = scandir($directorio, 1);
      print_r($archivos);
        /*
            Array
            (
                [0] =>View.php
                [1] =>Slim.php
                [2] =>Router.php
                [3] =>Middleware
                [4] =>LogWriter.php
                [5] =>Log.php
                [6] => Http
                [7] =>Helper
                [8] =>Environment.php
                [9] =>..
                [10] => .
            )
        */
    ````
    - Ejemplo con scandir() para mostar los archivos .txt de un directorio

    ````
      if ($gestor = opendir('uploads/')) {
        while ($archivo = readdir($gestor)) {
          if (strpos($archivo, ".txt") !== false) {
          echo "$archivo\n";
          }
        }
        closedir($gestor);
      }
  ````

- **Glob()**
    - Devuelve un array de nombres de archivos o directorios que coinciden con un patrón especificado.
    - Permite especificar un patrón para los elementos a listar

        - Ejemplo para listar los archivos .png con glob()
        ````
            $directorio = "/home/DaPa/images/";
            $archivos = glob("" . $directorio . "*.png");
            foreach($archivos as $archivo) {
              echo "$archivo\n";
            }
        ````
        - Veamos otro ejemplo básico del uso de glob()
        ````
            <?php
                # Cambiar el directorio actual:
                chdir("c:\\");
                # Mostrar el contenido del directorio actual:
                foreach( glob("*.*") as $archivo )
                  echo $archivo."<br />";

        ````


    #### Ejemplo de las funciones opendir, readdir y closedir:

    ````
          if ($gestor = opendir('Slim')) {
      
          echo "Gestor de directorio: $gestor\n";
          echo "Entradas:\n";
          
          # Iteramos sobre el directorio:
          while ( $entrada = readdir($gestor)) {
          echo "$entrada\n";
          }
          closedir($gestor);
          }
          # Devuelve todos los archivos del directorio especificado
    ````

## Crear, renombrar, eliminar y cambiar de directorio

* Sabemos que:
    - getcwd() -> retorna el directorio actual
    - chdir() -> permite cambiar de directorio

- **mkdir()**
    - Crea un directorio con el nombre indicado en el primer parámetro
    - 2º parámetro (opcional) indica los permisos en UNIX
    - 3er parámetro indicdo como true, permite crear directrrios de forma recursiva.

- **rmdir()**
    - Elimina el directorio indicado.
    - Debemos tener los permisos adecuados

````
<?php
    // Obtener el directorio actual:
    echo "El directorio actual es: [".getcwd()."]<br />";

    // Cambiar el directorio actual:
    chdir("c:\\");
    
    // Obtener el directorio actual:
    echo "Ahora el directorio actual es: [".getcwd()."]<br />";
    
    // Crear directorio en esta ubicación:
    mkdir("miCarpeta58975-01-1");
    mkdir("./miCarpeta58975-02-1");

    // Crear directorios de forma recursiva
    mkdir("./miCarpeta58975-03-1/miCarpeta58975-03-2/miCarpeta589752-03-3/", null, true);

    // Renombrar directorio
    rename("miCarpeta58975-01-1", "miCarpeta58975--01--1");
    
    // Borrar un directorio (no borra los subdirectorios):
    rmdir("./miCarpeta58975-02-1");
````

### Otras funciones útiles sobre directorios

- **dirname()**
    - Retorna el directorio padre de la ruta pasada como parámetro

- **pathinfo()**
    - Retorna información sobre una ruta de archivo
    - Se obtiene un array asociativo

## Subir archivos al servidor

En primer lugar debemos crear un formulario HTML con los atributos: 
    - method="post"
    - enctype="multipart/form-data"
y que contenga un componente de tipo: 
````
<input type="file" ... />.
````
Tras seleccionar un archivo y enviarse el formulario, la información del archivo subido quedará 
guardada en el array asociativo **$_FILES**, que tiene las siguientes claves:

- **name:** nombre original del archivo
- **tmp_name** nombre temporal del archivo en la ruta temporal (antes de ser subido)
- **type** tipo de archivo
- **error** código de error, si es que sucede
- **size** tamaño del archivo en bytes

Para acceder al archivo usaremos las siguientes funcionalidades PHP
- **is_uploaded_file()**
    - Permite comprobar si el archivo fue subido con el método POST
- **move_uploaded_file()**
    - Permite mover el archivo temporal a la ruta actual

#### Veamos un ejemplo de subida
##### HTML:
````
    <html>
        <head>
            <title>Enviar E-Mail desde PHP | informaticapc.com</title>
            </head>
        <body>
            <form name="frmUpload" action="upload.php" method="post" enctype="multipart/form-data">
            Archivo: 
            <input type="file" name="txtFile" id="txtFile" />
            
            <input type="submit" name="btnSubmit" value="Enviar" />

            </form>
        </body>
    </html>
````

###### PHP:
````
<?php
    if( empty($_FILES['txtFile']['name']) == false )
    {
    if (is_uploaded_file($_FILES['txtFile']['tmp_name']))
    {
    if( move_uploaded_file($_FILES['txtFile']['tmp_name'], 
    $_FILES['txtFile']['name']) == false )
    echo "No se ha podido el mover el archivo.";
    else
    echo "Archivo [".$_FILES['txtFile']['name']."] subido y movido al 
    directorio actual.";
    }
    else
    {
    echo "Posible ataque al subir el archivo 
    [".$_FILES['txtFile']['nombre_tmp']."]";
    }
    }
    else
    {
    echo "No se seleccionó ningún archivo.";
    }

````

* Si no se selecciona ningún archivo, el array $_FILES contendrá un elemento con un valor en la clave error de '4': dicho código informa de que no se subió ningún archivo.


## Archivos CSV

Son archivos de texto normales en los que se utiliza un determinado carácter para separar cada campo.

ej:
````
    David;Gutiérrez;Pérez;333666999;david@mail.es
````

### Funciones para el manejo de CSV

- **fgetcsv()**
    - Permite leer en un CSV
    - Obtiene una línea del puntero a un archivo y la examina para tratar campos CSV

- **fputcsv()**
    - Permite escribir en un CSV
    - Da formato a una línea como CSV y la escribe en un puntero a un archivo

Si bien podemos usar también las explicadas anteriormente como fwrite(), fread(), etc

````
<?php
    $linea = "Antonia,Martel,Calvo,http://www.antoniamc74924.com/";
    $aDatos = array("Rosa", "Castellano", "Herrera", "http://www.rosach3729023.com/");

    // Abrimos el archivo situando el puntero al final del archivo:
    $archivo = fopen( "datos.csv", "ab" );
    fputcsv( $archivo, explode(",", $linea), ";" );
    fputcsv( $archivo, $aDatos, ";" );
    fclose( $archivo );
````

* Observa que como tercer parámetro podemos indicar el carácter delimitador que debe escribirse en el archivo CSV
    - Si lo que deseamos es que no se use ningún carácter podemos utilizar la función **fwrite()**.


* En caso de que hubiese espacios en un campo éste será escrito entre comillas dobles en el archivo de texto, como puedes ver en el siguiente ejemplo:

````
<?php
    $linea = "Antonia;Martel H;C/Cuadrada,8;http://www.antoniamh74924.com/";
    $aDatos = array("Pedro", "Ramírez Quevedo", "C/Redonda,7",  "http://www.pedrorq89876.com/");

    // Abrimos el archivo (si existe será sobreescrito):
    $archivo = fopen( "datos.csv", "w+b" );
    fputcsv( $archivo, explode(";", $linea), ";" );
    fputcsv( $archivo, $aDatos, ";" );
    fclose( $archivo );


````


Para obtener los datos de un archivo csv:
1. Usaremos fgetcsv() pasándole como parámetro un puntero al archivo abierto con fopen()
2. Como segundo parámetro (opcional) el número de caracteres a leer, debiendo ser un número mayor que la longitud de la línea más larga.
3. Como tercer y cuarto parámetros (opcionales también) podemos indicar el carácter delimitador y el carácter de cierre, respectivamente.

Si fgetcsv() encuentra una línea en blanco se devolverá un array conteniendo un sólo campo con valor null, no siendo considerado como un error.
##### Veamos un ejemplo:

````
<?php
    $archivo = fopen( "datos.csv", "rb" );

    // Leer la primera línea:
    $aDatos = fgetcsv( $archivo, 100, ";");
    print_r( $aDatos );
    echo "<br />";

    // Tras la lectura anterior, el puntero ha quedado en la segunda línea:
    $aDatos = fgetcsv( $archivo, 100, ";" );
    print_r( $aDatos );
    echo "<br />-------------------------------------<p />";
    
    // Volvemos a situar el puntero al principio del archivo:
    fseek($archivo, 0);

    // Recorremos el archivo completo:
    while(feof($archivo) == false ){
        $aDatos = fgetcsv( $archivo, 100, ";");
        echo "Nombre: ".$aDatos[0]."<br />";
        echo "Apellido 1: ".$aDatos[1]."<br />";
        echo "Apellido 2: ".$aDatos[2]."<br />";
        echo "WEB: ".$aDatos[3]."<br />";
        echo "--------------------------<br />";
    }
    fclose( $archivo );
?>
````

##### Veamos otro ejemplo de uso de la función fgetcsv()


````
<?php
    $path = "/home/usr/data3.csv";
    if (!file_exists($path))
        exit("File notfound");

    $file = fopen($path, "r");
    echo "<html><body><tableborder=1>";
    echo 
    "<tr><th>Country</th><th>Area</th><th>Population</th><th>Density</th></tr>";
    while ($fields = fgetcsv($file,",")) {
        echo "<tr><td>".$fields[0]."</td><td>".$fields[1]."</td><td>".
        $fields[2]."</td><td>".$fields[3]."</td></tr>";
    }
    echo "</table></body></html>";
    fclose($file);
?>

````

## Comprimir y Descomprimir Archivos

Para la creación de archivos ZIP se usa la clase ZipArchive que está integrada en PHP.

### Sintaxis de las principales funciones 
- **Open(string $filename [, int $flags])**
  - Abre un archivo en formato ZIP

- **Close()**
  - Cierra el fichero y guarda los cámbios
  - Es llamado de forma automñatica al finalizar el script

- **addFile(string *$filename* [, string *$localname* = NULL [, int$start = 0 [, int $length = 0 ]]])**
  - Añade un fichero al arcivo ZIP
  - Parámetro ***$fileneme***
    - Establece la ruta del fichero a añadir
  - Parámetro ***$localname***
    - Ruta local dentro de del archivo ZIP que reemplazará el ***filename***

- **extractTo(string *$destination* [,mixed *$entries* ])**
  - Extrae el fichero o los archivos dados a la ruta estableciada
  - Parámetro ***$destination***
    - Ruta donde se extraen los ficheros
  - Parámetro ***$entries***
    - Las entradas a extraer. 
    - Acepta tanto un solo nombre o un array de nombres.

## Crear archivo comprimido

* Una imagen vale más que mil palabras

````
<?php
  $archivo_origen1 = "logo.jpg";
  $archivo_origen2 = "archivo.html";
  $archivo_zip = "comprimido.zip";

  // Creamos una instancia de la clase ZipArchive:
  $zip = new ZipArchive();

  // Creamos el archivo zip:
  if ($zip->open($archivo_zip, ZipArchive::CREATE) === true )
  {
    // Añadimos archivos:
    $zip->addFile( $archivo_origen1 );
    $zip->addFile( $archivo_origen2 );

    // Cerramos el archivo zip:
    $zip->close();
    echo "Proceso finalizado";
  } else {
    echo "Ha ocurrido un error";
  }

````

* Deberíamos comprobar si un archivo ya existe antes de sobreescribirlo
````
  if (is_file($nombreZip)) {
  exit("El archivo ya existe");
  }

````

* También podemos cambiar el nombre del archivo que estamos comprimiendo indicándolo en el segundo parámetro.

````
$miInstanciaZip->addFile("miarchivo.jpg", "nuevoNombre.jpg");

````

## Descomprimir Archivo

- **extractTo()**
  - Extrae los archivos de un ZIP a un directorio dado
  - Si la carpeta indicada no existe se crea

  ````
  <?php
      $archivo_zip = "comprimido.zip";

      // Creamos una instancia de la clase ZipArchive:
      $zip = new ZipArchive();

      // Abrimos el archivo zip:
      if($zip->open($archivo_zip) === true)
      {
        $zip->extractTo('./temp/');
        $zip->close();

      echo 'Archivo descomprimido';
      } else {
        echo 'Error al descomprimir';
      }
  ````

* Si quisiéramos extraer sólo determinados archivos, como segundo parámetro pasaríamos un array con sus respectivos nombres y extensiones:

````
<?php
    $zip = new ZipArchive();
    if ($zip->open('test_im.zip')) {
      $zip->extractTo('/my/destination/dir/', array('pear_item.gif', 'testfromfile.php'));

      $zip->close();
      echo 'ok';
    } else {
      echo 'error';
    }

````

## Crear Carpeta en Archivo Comprimido

- **addEmptyDir()**
  - Crea una carpeta vacía dentro de un archivo comprimido
  ````
  <?php
      // Creamos un instancia de la clase ZipArchive
      $zip = new ZipArchive();

      // Creamos y abrimos un archivo zip temporal
      $zip->open("miarchivo.zip",ZipArchive::CREATE); 

      // Añadimos un directorio
      $dir = 'miDirectorio';
      $zip->addEmptyDir($dir);

      // Añadimos un archivo en la raiz del zip.
      $zip->addFile("imagen1.jpg","mi_imagen1.jpg");

      //Añadimos un archivo dentro del directorio que hemos creado
      $zip->addFile("imagen2.jpg", $dir."/mi_imagen2.jpg"); 

      // Una vez añadido los archivos deseados cerramos el zip.
      $zip->close();
  ````
## Descarga Archivos

Se establecen encabezados HTTP que indican al navegador que debe interpretar el contenido como un archivo descargable. 
Los encabezados incluyen información sobre el tipo de contenido, la disposición del archivo, la codificación de transferencia, la longitud del contenido, entre otros:

````
<?php
    $file = 'fichero.pdf';
    if (file_exists($file)) {
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename=' . basename($file));
        header('Content-Transfer-Encoding: binary');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($file));
        ob_clean();
        flush();
        readfile($file);
        exit;
    } else {
        echo 'El archivo no existe.';
    }
?>
````

Las funciones ob_clean() y flush() limpian el búfer de salida y fuerzan la escritura de todos los datos pendientes al navegador, y la función readfile() lee el contenido del archivo y lo imprime en le flujo de salida, permitiendo que el navegador inicie la descarga del archivo