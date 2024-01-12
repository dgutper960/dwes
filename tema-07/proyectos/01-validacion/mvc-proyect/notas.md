# Notas de clase para la validacion de parte del servidor

## 1. En primer lugar se establecen las reglas de validación
- Nombre. campo obligatorio
- Apellidos. campo obligatorio
- Población. campo opcional
- Email. Obligatorio, validado y único
- Fecha Nacimiento. Obligatorio
- Dni. obligatorio, formato válido y único
- Curso. obligatorio, número entero y existente en la tabla cursos

## 2. Mensajes Errores de Validación

Se creará un array asociativo llamado:

  $errores  = []
En el caso de no ser validado uno de los campos, por ejemplo el dni, se procede de la siguiente manera

  $errores['dni'] = "DNI ha sido registrado en la base de datos

## 3. Datos Formulario Nuevo Alumno No Validado

Una vez detectados errores de validación la aplicación volverá al formulario y tendrá que cumplir con los siguientes requisitos:

Autocompletado de los campos. Mostrará en cada uno de los campos los valores que ya introduzco el usuario en su primer intento
Error. Mostrará en cabecera un mensaje de Error, Formulario no validado
Mensajes de error de validación. Además justo debajo de cada campo no validado mostrará el correspondiente mensaje de error de validación.

## 4. Mensaje Formulario Validado

Una vez que el formulario quede validado, se añadirá un nuevo registro en la tabla corredores y la aplicación mostrará un mensaje en la cabecera de la tabla corredores.

"Alumno añadido con éxito"

# PASOS

## Saneamiento de datos obtenidos del formulario nuevo alumno:
- Vamos al controlador y la funcion create
- Saneamos los datos
- Con la expresión abreviada ( ??='') evitamos errores en campos vacíos
    - Esta expresion es como un isset pero que inicializa como campo vacío
    - Observamos que el operador va en el mismo parámetro que el $POS['dato']
- Tenemos una constante para tipo de dato email

    **Esto filtra los datos introducidos y elimina lo que no que no sirve**

### En este momento creamos el objeto con los datos saneados

## Validacion
- Generamos un array vacío ($errores = [])

## Vamos completando los requerimientos del enunciado

- Nombre. campo obligatorio
- Apellidos. campo obligatorio
- Población. campo opcional
- Email. Obligatorio, validado y único
- Fecha Nacimiento. Obligatorio
- Dni. obligatorio, formato válido y único
- Curso. obligatorio, número entero y existente en la tabla cursos

**Se observa que podemos usar diferentes constantes de validacion**

### Para validaciones con expresiones regulares
- Hay que crear un array $optons = []

### Para validaciones unique hay que ir al modelo para la consulta en la BBDD

## Comprobamos validacion
- metemos el array errores en la funcion empty()

**Si no hay errores hay que serializar -> de objeto a string (las variables de sesion no admiten objetos)**

## Debemos crear un menstaje de feedback para el usuario


### Si create da campos no validadoss debemos reenviar al formulario 





