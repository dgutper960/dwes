<?php


/**
 * Gestión de Directorio
 *  copiar, mover, renombrar, eliminar
 */

 # Mostramos el directorio actual ruta absoluta de todo el sistema (desde C:)
 echo 'Directorio Actual'.getcwd();

 # Cambiamos el directorio actual
 chdir('files');
 echo '<br>';
 echo 'Directorio Actual'.getcwd();

  # Cambiamos el directorio actual
  chdir('..');
  echo '<br>';
  echo 'Directorio Actual'.getcwd();

  # Cambiamos el directorio actual
  chdir('files');
  echo '<br>';
  echo 'Directorio Actual'.getcwd();