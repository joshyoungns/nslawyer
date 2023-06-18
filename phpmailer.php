<?php

use phpmailer/phpmailer/src/PHPMailer;
use phpmailer/phpmailer/src/SMTP;
use phpmailer/phpmailer/srcException;

require_once ('./vendor/autoload.php');
require ('./vendor/phpmailer/phpmailer/src/Exception.php');
require ('./vendor/phpmailer/phpmailer/src/PHPMailer.php');
require ('./vendor/phpmailer/phpmailer/src/SMTP.php');

$name = $_POST['fullName']; // required
$email = $_POST['email']; // required
$message = $_POST['message']; // required

$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'jy.ns.test@gmail.com';                     //SMTP username
    $mail->Password   = 'fightmoralpattern';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;            //Enable implicit TLS encryption
    $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('jy.ns.test@gmail.com', 'Mailer');
    $mail->addAddress('joshyoung.ns@gmail.com');     //Add a recipient
    //$mail->addReplyTo('info@example.com', 'Information');
    //$mail->addCC('cc@example.com');
    //$mail->addBCC('bcc@example.com');

    //Attachments
    //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Inquiry';
    $mail->Body    = $message;
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
