<?php

function send_mail($rand)
{  //Na metatapei se function
    require '../vendor/phpmailer/phpmailer/PHPMailerAutoload.php';
    $mail = new PHPMailer;

//$mail->SMTPDebug = 3;                               // Enable verbose debug output

    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';              // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'ch.ioannides93@gmail.com';                 // SMTP username
    $mail->Password = 'X99310725I';                           // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                    // TCP port to connect to

    $mail->From = 'aelg34@gmail.com';
    $mail->FromName = 'E-pals';
//$mail->addAddress('joe@example.net', 'Joe User');     // Add a recipient
    $mail->addAddress($_POST['email']);               // Name is optional

//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
    $mail->isHTML(true);                                  // Set email format to HTML

    $mail->Subject = 'Hi! from E-pals"';
    $mail->Body = "Hi,\n\nHow are you?\n\n
    Please click the link below to reset your password to E-pals

    http://e_pals/viewer/forgot_password.php?code=$rand";

    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    if (!$mail->send()) {
        echo 'Message could not be sent.';
        echo 'Mailer Error: ' . $mail->ErrorInfo;
    } else {
        echo 'Message has been sent';
    }
}
?>