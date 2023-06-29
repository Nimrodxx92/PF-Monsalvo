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

mail($to, $subject, $message, $headers);

// Puedes redirigir al usuario a una página de confirmación
header('Location: confirmacion.html');
exit;
}
?>