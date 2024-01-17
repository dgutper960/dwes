1. Cargamos el archivo menuBar en el main principal

2. Cargamos el archivo login en el controlador

## Tener en cuenta que:
- Cuando una auntetificacion falla, no debemos dar pistas a usuario de qué es lo que ha fallado; aunque en este proyecto lo vamos a mostrar completo

## En el index de login
- EL bloque if que determina si hay errores de validacion
- Se generan etiquetas de estilos de error de forma dinámica

- Cuidado con los enlaces de la Moodle

3. Controlador register
- Necesario para no introducir los campos de la contraseña en la BBDD sin hashear
- Comprobamos los bloques if que nos muestran las opciones en caso de que el formulario venga de vuelta
- Se recuperan los valores del formulario y se almacan en variables de sesion que se borran despues de ser usadas