<?php
include('../../../module/sendEmailLocalHost.php');

$sender = $_POST['senderEmail'];
$receier = $_POST['receiverEmail'];
$report = '../../../module/reports/Employee_Leave_Details.pdf';
/*
$subject = "Take Your Leave - Online Leave Management System";
$message ="Leave Details on ".date('F-Y')."\n\n";
$message .= <<<EOF
                <html>
                <body>
                    <img src="http://www.teamwhileloop.com/email/lms.png" />
                </body>
                </html>
EOF;
$from = "takeyourleave@gmail.com";

$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
$headers .= "From: $sender";

$file_tmp_name = $_FILES['report']['tmp_name'];
$file_name = $_FILES['report']['name'];
$file_size = $_FILES['report']['size'];
$file_type = $_FILES['report']['type'];
$file_error = $_FILES['report']['error'];

if($file_error > 0)
{
    die('Upload error or No files uploaded');
}
//read from the uploaded file & base64_encode content for the mail
$handle = fopen($file_tmp_name, "r");
$content = fread($handle, $file_size);
fclose($handle);

$encoded_content = chunk_split(base64_encode($content));

$boundary = md5("sanwebe");
//header
$headers = "MIME-Version: 1.0\r\n";
$headers .= "From:".$sender."\r\n";
$headers .= "Reply-To: ".$receier."" . "\r\n";
$headers .= "Content-Type: multipart/mixed; boundary = $boundary\r\n\r\n";

//plain text
$body = "--$boundary\r\n";
$body .= "Content-Type: text/plain; charset=ISO-8859-1\r\n";
$body .= "Content-Transfer-Encoding: base64\r\n\r\n";
$body .= chunk_split(base64_encode($message));

//attachment
$body .= "--$boundary\r\n";
$body .="Content-Type: $file_type; name=".$file_name."\r\n";
$body .="Content-Disposition: attachment; filename=".$file_name."\r\n";
$body .="Content-Transfer-Encoding: base64\r\n";
$body .="X-Attachment-Id: ".rand(1000,99999)."\r\n\r\n";
$body .= $encoded_content;

$sentMail = @mail($sender, $subject, $body, $headers);
if($sentMail) //output success or failure messages
{
    header("Location:../settings.php?emailSent");
}else{
    header("Location:../settings.php?emailSentFail");
}

*/
$sent = sendEmail($receier,$report);

if($sent){
    header("Location:../settings.php?emailSent");
}else{
    header("Location:../settings.php?emailSentFail");
}
//$sendgrid = new SendGrid('username', 'password');
//$mail = new SendGridMail();
//$mail->addTo('foo@bar.com')->
//setFrom('me@bar.com')->
//setSubject('Subject goes here')->
//setText('Hello World!')->
//setHtml('<strong>Hello World!</strong>');
//$sendgrid->smtp->send($mail);