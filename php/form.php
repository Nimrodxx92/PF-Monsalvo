<?php
/* Dirección de correo electrónico a la que se enviará el formulario */
$to_email = 'sideralis.design@gmail.com';

/* Verificar si se envió el formulario */
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  /* Obtener los datos del formulario */
  $nombre = $_POST['nombre'];
  $email = $_POST['email'];
  $telefono = $_POST['telefono'];
  $consulta = $_POST['mensaje'];

  /* Verificar si todos los campos están completos */
  if (!empty($nombre) && !empty($email) && !empty($telefono) && !empty($consulta)) {
    /* Enviar el formulario por correo electrónico */
    sendFormEmail($nombre, $email, $telefono, $consulta);
    echo '<h1>Gracias por contactarte con nosotros.</h1>';
    echo '<p>Serás redirigido al inicio en unos segundos...</p>';
    echo '<script>setTimeout(function() { window.location.href = "../index.html"; }, 3000);</script>';
    exit(); /* Terminar la ejecución del script después de la redirección */
  } else {
    echo 'Por favor, complete todos los campos del formulario.';
  }
}

/* Función para enviar el formulario por correo electrónico */
function sendFormEmail($nombre, $email, $telefono, $consulta) {
  global $to_email;

  $subject = 'Nuevo formulario de contacto';
  $message = "Se ha recibido un nuevo formulario de contacto:\n\n";
  $message .= "Nombre: $nombre\n";
  $message .= "Email: $email\n";
  $message .= "Teléfono: $telefono\n";
  $message .= "Consulta:\n$consulta";

  /* Enviar el correo electrónico del formulario */
  mail($to_email, $subject, $message);
}
?>
 