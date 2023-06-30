<?php
 error_reporting(E_ALL);
 ini_set('display_errors', 1);

/* Conetactar mi form con el server */
$nombre = $_POST ['nombre'];
$mail = $_POST ['email'];
$asunto = $_POST ['asunto'];
$telefono = $_POST ['telefono'];
$mensaje = $_POST ['mensaje'];

/* Mostrar texto plano */
$header .= "Content-Type: text/plain";

/* Como llegan los email de las personas */
$mensaje = "Este mensaje fue enviado por " . $nombre . ",\r\n";
$mensaje .= "Su e-mail es: " . $mail . ",\r\n";
$mensaje .= "Su teléfono es: " . $telefono . "\r\n";
$mensaje .= "El asunto es: " . $asunto . ",\r\n";
$mensaje .= "Mensaje: " . $_POST . ['mensaje'] ",\r\n";
$mensaje .= "Enviado el " . date('d/m/Y', time());

$para = 'cnmonsalvo@gmail.com'; /* Donde llegan los msj */
$asunto = 'Mensaje de mi sitio web'; /* El asunto que llegan de los mails */

/* A quien lo envía, el título, el msj */
mail($para, $asunto, utf8_decode($mensaje));

/* Redirección al mandar el form */
header('Location:exito.html');
?>