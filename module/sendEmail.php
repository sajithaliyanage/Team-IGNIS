<?php
require 'PHPMAILER/PHPMailerAutoload.php';

$mail = new PHPMailer;

function sendApprovedEmail($email,$employeeName,$leaveCount,$startDate,$endDate){
    global $mail;
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'takeyourleaveproject@gmail.com';                 // SMTP username
    $mail->Password = 'teamignis@123';                           // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                    // TCP port to connect to

    $mail->setFrom('takeyourleaveproject@gmail.com', 'Take Your Leave');
    $mail->addAddress($email, 'Sajitha Liyanage');     // Add a recipient
    $mail->isHTML(true);                                  // Set email format to HTML

    $mail->Subject = "Take Your Leave - Online Leave Management System";
    $mail->Body    = "Hey ".$employeeName.", We are happy to inform that your ".$leaveCount."day medical is being APPROVED for the time period from ".$startDate." to ".$endDate." <br/><br/><br/><img src='http://www.teamwhileloop.com/email/lms.png' />";
    $mail->send();
}

function sendMedicalApprovedEmail($email,$employeeName,$leaveCount,$startDate,$endDate){
    global $mail;
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'takeyourleaveproject@gmail.com';                 // SMTP username
    $mail->Password = 'teamignis@123';                           // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                    // TCP port to connect to

    $mail->setFrom('takeyourleaveproject@gmail.com', 'Take Your Leave');
    $mail->addAddress($email, 'Sajitha Liyanage');     // Add a recipient
    $mail->isHTML(true);

    $mail->Subject = "Take Your Leave - Online Leave Management System";
    $mail->Body    = "Hey ".$employeeName.", We are happy to say your Manager has approved your medical for".$leaveCount."day leaves on ".$startDate." to ".$endDate. "<br/><br/><br/><img src='http://www.teamwhileloop.com/email/lms.png' />";
    $mail->send();
    // Set up parameters

}

function sendRejectEmail($email,$employeeName,$appliedDate){
    global $mail;
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'takeyourleaveproject@gmail.com';                 // SMTP username
    $mail->Password = 'teamignis@123';                           // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                    // TCP port to connect to

    $mail->setFrom('takeyourleaveproject@gmail.com', 'Take Your Leave');
    $mail->addAddress($email, 'Sajitha Liyanage');     // Add a recipient
    $mail->isHTML(true);

    $mail->Subject = "Take Your Leave - Online Leave Management System";
    $mail->Body    = "Hey ".$employeeName.",We are bad to say your leave has been rejected applied on ".$appliedDate."<br/><br/><br/><img src='http://www.teamwhileloop.com/email/lms.png' />";
    $mail->send();
}

function sendMedicalRejectEmail($email,$employeeName,$leaveCount,$startDate,$endDate){
    global $mail;
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'takeyourleaveproject@gmail.com';                 // SMTP username
    $mail->Password = 'teamignis@123';                           // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                    // TCP port to connect to

    $mail->setFrom('takeyourleaveproject@gmail.com', 'Take Your Leave');
    $mail->addAddress($email, 'Sajitha Liyanage');     // Add a recipient
    $mail->isHTML(true);

    $mail->Subject = "Take Your Leave - Online Leave Management System";
    $mail->Body    = "Hey ".$employeeName.",We are bad to say your leave has been rejected applied for ".$leaveCount."day leaves at ".$startDate." to ".$endDate."<br/><br/><br/><img src='http://www.teamwhileloop.com/email/lms.png' />";
    $mail->send();

}

function sendCanceledEmail($email,$employeeName,$appliedDate){
    global $mail;
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'takeyourleaveproject@gmail.com';                 // SMTP username
    $mail->Password = 'teamignis@123';                           // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                    // TCP port to connect to

    $mail->setFrom('takeyourleaveproject@gmail.com', 'Take Your Leave');
    $mail->addAddress($email, 'Sajitha Liyanage');     // Add a recipient
    $mail->isHTML(true);

    $mail->Subject = "Take Your Leave - Online Leave Management System";
    $mail->Body    = "Hey ".$employeeName.",Your leave has been canceled applied on ".$appliedDate."<br/><br/><br/><img src='http://www.teamwhileloop.com/email/lms.png' />";
    $mail->send();
}