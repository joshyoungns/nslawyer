<?php
require_once ('./vendor/autoload.php');
require ('./vendor/phpmailer/phpmailer/src/Exception.php');
require ('./vendor/phpmailer/phpmailer/src/PHPMailer.php');
require ('./vendor/phpmailer/phpmailer/src/SMTP.php');

//use ('/vendor/phpmailer/phpmailer/src/PHPMailer');
//use ('/vendor/phpmailer/phpmailer/src/SMTP');
//use ('/vendor/phpmailer/phpmailer/srcException');

$name = $_POST['fullName']; // required
$email = $_POST['email']; // required
$message = $_POST['message']; // required

$mail = new PHPMailer;
//Enable SMTP debugging.
$mail->SMTPDebug = 3;                           
//Set PHPMailer to use SMTP.
$mail->isSMTP();        
//Set SMTP host name                      
$mail->Host = "smtp.gmail.com";
//Set this to true if SMTP host requires authentication to send email
$mail->SMTPAuth = true;                      
//Provide username and password
$mail->Username = "jy.ns.test@gmail.com";             
$mail->Password = "fightmoralpattern";                       
//If SMTP requires TLS encryption then set it
$mail->SMTPSecure = "tls";                       
//Set TCP port to connect to
$mail->Port = 587;                    
$mail->From = "jy.ns.test@gmail.com";
$mail->FromName = "Josh";
$mail->addAddress("joshyoung.ns@gmail.com", "Joshua Young");
$mail->isHTML(true);
$mail->Subject = "Inquiry from";
$mail->Body = "reply to: ";
$mail->AltBody = "This is the plain text version of the email content";
if(!$mail->send())
{
echo "Mailer Error: " . $mail->ErrorInfo;
}
else
{
echo "Message has been sent successfully";
}
?>