<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//Load composer's autoloader
require 'vendor/autoload.php';

function sendConfirmationMail($nomUser, $emailUser, $token) {
  $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
  try {
      //Server settings
      //$mail->SMTPDebug = 2;                                 // Enable verbose debug output
      $mail->isSMTP();                                      // Set mailer to use SMTP
      $mail->Host = '80.12.242.10';                         // Specify main and backup SMTP servers
      $mail->SMTPAuth = false;                               // Enable SMTP authentication
      //$mail->Username = 'user@example.com';                 // SMTP username
      //$mail->Password = 'secret';                           // SMTP password
      //$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
      $mail->Port = 25;                                    // TCP port to connect to

      //Recipients
      $mail->setFrom('noreply@domaineduverger.fr', 'Domaine du Verger');
      $mail->addAddress($emailUser, $nomUser);     // Add a recipient
      //$mail->addAddress('ellen@example.com');               // Name is optional
      //$mail->addReplyTo('info@example.com', 'Information');
      //$mail->addCC('cc@example.com');
      //$mail->addBCC('bcc@example.com');

      //Attachments
      //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
      //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

      //Content
      $mail->isHTML(true);                                  // Set email format to HTML
      $mail->Subject = 'Inscription au domaine du verger';
      $mail->Body    = 'Bonjour ' . $nomUser . ' !<br>Votre demande d\'inscription a été acceptée par un de nos administrateurs. Pour la finaliser, cliquez sur le lien suivant : <a href="http://172.17.0.10/PPE_PIO/index.php?uc=utilisateur&action=finalisation&token='.$token.'">ledomaineduverger.fr</a>' ;
      $mail->AltBody = 'Bonjour ' . $nomUser . ' !\nVotre demande d\'inscription a été acceptée par un de nos administrateurs. Pour la finaliser, cliquez sur le lien suivant : http://172.17.0.10/PPE_PIO/index.php?uc=utilisateur&action=finalisation&token='.$token ;

      $mail->send();
      echo 'Message has been sent';
  } catch (Exception $e) {
      echo 'Message could not be sent.';
      echo 'Mailer Error: ' . $mail->ErrorInfo;
  }
}
?>
