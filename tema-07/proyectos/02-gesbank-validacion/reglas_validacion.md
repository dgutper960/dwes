# Validación Formulario MVC - Gesbank


1. Inicio

Este proyecto parte del proyecto Gesbank realizado en el tema7 MVC durante las navidades.

2. Objetivo

El objetivo del siguiente proyecto es la validación de los formularios del proyecto MVC - Gesbank.

Los formularios que hay que validar en el presente proyecto son:

Formulario Añadir Nueva Cuenta
Formulario Editar cuenta
Formulario Añadir Cliente
Formulario Editar Cliente
Formulario Añadir Nuevo Movimiento

3. Proceso de Validación.

Si un formulario no es validado:

Redirecciona de nuevo al formulario en cuestión
Muestra mensaje de Error - Formulario no validado
Autorrellena los campos del formulario con los valores iniciales
Muestra los errores de validación correspondientes.

4. Reglas de Validación

### Formulario Añadir Nuevo Cliente:

- Nombre. Obligatorio, tamaño máximo 20
- Apellidos. Obligatorio. tamaño máximo de 45
- Teléfono. No obligatorio, 9 dígitos numéricos
- Ciudad. Obligatorio, tamaño máximo de 20
- Dni. Obligatorio, formato 8 dídgitos y letra mayúscula, ha de ser único en la tabla de clientes.
- Email. Obligatorio, formato EMAIL válido, ha de ser único en la tabla de clientes.

### Formulario Añadir Nueva Cuenta:

- Cuenta. Obligatorio, formato 20 dígitos numéricos, valor con restricción unique en la tabla cuentas.
- Cliente. Obligatorio, valor numérico, ha de existir en la tabla clientes.