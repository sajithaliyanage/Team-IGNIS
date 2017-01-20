<?php
require 'PHPMAILER/PHPMailerAutoload.php';

$mail = new PHPMailer;

function sendEmail($receiver,$encode){
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
$mail->addAddress($receiver, 'Employee');     // Add a recipient

     // Add attachments
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Reset Your Take Your Leave Password';
$mail->Body    = "Click the below link to reset your password 
            <br><a href='http://localhost/lms/Team-IGNIS/view/layouts/reset_password.php?id=".$encode."&email=".$receiver."'>Click Here to reset your password in Take Your Leave</a>
            <br/><br/><br/><img src='http://www.teamwhileloop.com/email/lms.png' />";
//$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
    if(!$mail->send()) {
        return false;
    } else {
        return true;
    }
}

