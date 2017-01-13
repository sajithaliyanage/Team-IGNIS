<?php
require 'PHPMAILER/PHPMailerAutoload.php';

$mail = new PHPMailer;

function sendEmail($receiver,$attachment){
//$mail->SMTPDebug = 3;                               // Enable verbose debug output
global $mail;
$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'takeyourleaveproject@gmail.com';                 // SMTP username
$mail->Password = 'teamignis@123';                           // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                                    // TCP port to connect to

$mail->setFrom('takeyourleaveproject@gmail.com', 'Take Your Leave');
$mail->addAddress($receiver, 'Sajitha Liyanage');     // Add a recipient
//$mail->addAddress('ellen@example.com');               // Name is optional
//$mail->addReplyTo('info@example.com', 'Information');
//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');


$mail->addAttachment($attachment);         // Add attachments
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Leave Sheet of Employees on '.date('F');
$mail->Body    = 'Attached file is <b>below!</b> <br/><br/><br/><img src="http://www.teamwhileloop.com/email/lms.png" />';
//$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
    if(!$mail->send()) {
        return false;
    } else {
        return true;
    }
}

