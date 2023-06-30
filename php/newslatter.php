<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $email = $_POST['email'];
  
  /* Como llegan los email de las personas */
  $to = 'cnmonsalvo@gmail.com';
  $subject = 'Nuevo suscriptor de newsletter';
  $message = 'Se ha suscrito al newsletter. Correo electrónico: ' . $email;
  $headers = 'From: cnmonsalvo@gmail.com' . "\r\n" .
      'Reply-To: cnmonsalvo@gmail.com' . "\r\n" .
      'X-Mailer: PHP/' . phpversion();

  if (mail($to, $subject, $message, $headers)) {
    /* El correo se envió exitosamente */

    /* Redirigir al usuario a una página de confirmación */
    header('Location:confirmacion.html');
    exit;
  } else {
    /* Ocurrió un error al enviar el correo */

    /* Mostrar un mensaje de error en la misma página */
    echo 'Ha ocurrido un error al enviar el correo. Por favor, intenta nuevamente más tarde.';
  }
}
?>