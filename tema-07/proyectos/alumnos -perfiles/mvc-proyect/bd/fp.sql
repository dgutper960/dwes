-- Actividad 6.1
-- 26/11/2017

BORRAR BASE DE DATOS SI EXISTE fp;
CREAR BASE DE DATOS SI NO EXISTE fp
	CONJUNTO DE CARACTERES PREDETERMINADO UTF8
    COLABORACIÓN PREDETERMINADA UTF8_GENERAL_CI;

USAR fp;
SOLTAR TABLA SI EXISTE cursos;
CREAR TABLA SI NO EXISTE cursos(
	id INT CLAVE PRIMARIA SIN FIRMAR AUTO_INCREMENT,
    nombre VARCHAR(50) NOT NULL,
    ciclo VARCHAR(50) NO NULO,
    nombreCorto VARCHAR(4) NOT NULL,
    nivel CHAR(1) NOT NULL
) MOTOR = INNODB CONJUNTO DE CARACTERES PREDETERMINADO = UTF8 COLLATE = UTF8_GENERAL_CI;

INSERTAR EN cursos VALORES
	(NULL, "Primero de Desarrollo de Aplicaciones Web", "Desarrollo de Aplicaciones Web", "1DAW", "1"),
    (NULL, "Segundo de Desarrollo de Aplicaciones Web", "Desarrollo de Aplicaciones Web", "2DAW", "2"),
    (NULL, "Primero de Sistemas Microinformáticos y Redes", "Sistemas Microinformáticos y Redes", "1SMR", "1"),
    (NULL, "Segundo de Sistemas Microinformáticos y Redes", "Sistemas Microinformáticos y Redes", "2SMR", "2"),
    (NULL, "Primero de Asistencia a la Dirección", "Asistencia a la Dirección", "1AD", "1"),
    (NULL, "Segundo de Asistencia a la Dirección", "Asistencia a la Dirección", "2AD", "2")
;

SOLTAR TABLA SI EXISTE alumnos;
CREAR TABLA alumnos (
    id INT CLAVE PRIMARIA SIN FIRMAR AUTO_INCREMENT,
    nombre VARCHAR(30) NOT NULL,
    apellidos VARCHAR(50) NOT NULL,
    correo electrónico VARCHAR(50) ÚNICO,
    teléfono CHAR(9),
    dirección VARCHAR(50),
    población VARCHAR(30),
    provincia VARCHAR(30),
    nacionalidad VARCHAR(30),
    dni CHAR(9) ÚNICO,
    fechaNac FECHA,
    id_curso INT SIN FIRMAR,
    CLAVE EXTRANJERA (id_curso) REFERENCIAS cursos(id)
    AL ELIMINAR RESTRICCIÓN AL ACTUALIZAR EN CASCADA
) MOTOR = INNODB CONJUNTO DE CARACTERES PREDETERMINADO = UTF8 COLLATE = UTF8_GENERAL_CI;

INSERTAR EN VALORES de alumnos
	(NULL, "Javier", "Fernández Román", "javier@correo.es", "956787454", "Una calle, 1", "Ubrique", "Cádiz", "Española", "45789654A", "1990- 05-15", "1"),
    (NULL, "Cristina", "Mena Holgado", "cristina@correo.es", "956000054", "Una calle, 2", "Ubrique", "Cádiz", "Española", "71465454B", "1993- 07-25", "3"),
    (NULL, "Paco", "Pérez Mota", "francisco@correo.es", "956000123", "Una calle, 3", "Ubrique", "Cádiz", "Española", "95789754B", "1995- 11-05", "2"),
    (NULL, "Yohana", "Ruíz Aguilera", "yohana@correo.es", "956001234", "Una calle, 4", "Ubrique", "Cádiz", "Española", "65457544C", "1991- 02-02", "5"),
	(NULL, "Antonio", "Rojo Atienza", "antonio@correo.es", "956123000", "Una calle, 5", "Ubrique", "Cádiz", "Española", "56897845D", "1989- 12-28", "4"),
    (NULL, "Alba", "Florencio Romero", "alba@correo.es", "956140055", "Una calle, 6", "Ubrique", "Cádiz", "Española", "12457836F", "1990- 05-15", "6")
;