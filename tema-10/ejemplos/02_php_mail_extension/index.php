<?php
/**
 * Debemos incluir la librería
 * -> Intalacionproporcionadas en el github
 */
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
// Eliminamos del nombre carpeta padre '-Master'
// sustituimos /path/to/ por nuestra ruta (en este caso donde estamos)
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';


/**
 * En caso de error lo podemos controlar con la clase Exeption
 */
try {
// Creamos un objeto de la clase PHPMailer
// -> Deberíamos crearlo en un método del controlador
$mail = new PHPMailer(true);
//  Configuración juego de caracteres
$mail->CharSet = "UTF-8";
$mail->Encoding = "quoted-printable";

// Credenciales SMTP gmail
$mail->Username = 'dagutper.dev@gmail.com';
// Configuramos el password en la cuenta para 
$mail->Password = '';

} catch (\Throwable $th) {
    //throw $th;
}



















/*
SINTAXIX
mail($destinatario, $asunto, $mensaje, "From: Remitente 
<dgutper960@g.educaand.es>"); // este valor se puede cambiar
 */

//Destinatario
$destinatario = "dgutper960@g.educaand.es";

//Asunto
$asunto = "La función mail() de PHP";

//Mensaje
$mensaje = "<h1>Titulo de email</h1>";
$mensaje .= "<br>Aquí aprenderán cómo enviar mensajes con la función <b>mail()</b> 
de PHP con código <b>HTML</b> incrustado!";

//Cabecera. Debe establecerse la cabecera Content-type
$header = "Mime-Versión: 1.0". "\r\n";
$header .= "Content-Type: text/html; charset=UTF-8"."\r\n";

//Cabeceras adicionales
$header .= "To: dgutper960 <dgutper960@g.educaand.es>\n"; //dirección respuesta
$header .= "From: David<dgutper960@g.educaand.es>\n"; //remitente
$header .= "XMailer: PHP/".phpversion();
$header .= "cc: dgutper960@g.educaand.es"."\r\n"; // Con copia
$header .= "Bcc: dgutper960@g.educaand.es"."\r\n"; // Con copia oculta


// controlamos si el email se ha envado correctamante
if (mail($destinatario , $asunto , $mensaje , $header )){
echo('<p>Mensaje enviado correctamente.</p>');
} else {
echo('<p>Error de Envío.</p>');
};