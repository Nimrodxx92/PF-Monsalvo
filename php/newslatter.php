<?php
/* Dirección de correo electrónico a la que se enviará la notificación */ 
$to_email = 'sideralis.design@gmail.com';

/* Procesar la suscripción cuando se envía el formulario */
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  /* Validar y limpiar el correo electrónico ingresado */
  $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);

  /* Verificar si el correo electrónico es válido */
  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    /* El correo electrónico no es válido, mostrar un mensaje de error */
    echo 'El correo electrónico ingresado no es válido.';
    exit;
  }

  /* Guardar el correo electrónico en un archivo o base de datos */
  saveEmailToFile($email);

  /* Enviar notificación por correo electrónico */
  sendNotificationEmail($email);

  echo '<h1>Gracias por suscribirte.</h1>';
  echo '<p>Serás redirigido al inicio en unos segundos...</p>';
  echo '<script>setTimeout(function() { window.location.href = "../index.html"; }, 3000);</script>';
}

/* Función para enviar notificación por correo electrónico */
function sendNotificationEmail($email) {
  global $to_email;

  $subject = 'Nueva suscripción a tu boletín';
  $message = "Se ha suscrito un nuevo correo electrónico al boletín:\n\n";
  $message .= "Correo electrónico: $email";

  /* Enviar el correo electrónico de notificación */
  mail($to_email, $subject, $message);
}
?>






