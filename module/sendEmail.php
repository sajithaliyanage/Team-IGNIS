<?php

function sendApprovedEmail($email,$employeeName,$leaveCount,$startDate,$endDate){
    // Set up parameters
    $to = $email;
    $subject = "Take Your Leave - Online Leave Management System";
    $message ="Hey ".$employeeName.", We are happy to say your Manager has approved your ".$leaveCount."day leaves on ".$startDate." to ".$endDate." \n \n";
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
    $headers .= "From: $from";

// Send email
    mail($to,$subject,$message,$headers);
}

function sendMedicalApprovedEmail($email,$employeeName,$leaveCount,$startDate,$endDate){
    // Set up parameters
    $to = $email;
    $subject = "Take Your Leave - Online Leave Management System";
    $message ="Hey ".$employeeName.", We are happy to say your Manager has approved your medical for".$leaveCount."day leaves on ".$startDate." to ".$endDate." \n \n";
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
    $headers .= "From: $from";

// Send email
    mail($to,$subject,$message,$headers);
}

function sendRejectEmail($email,$employeeName,$appliedDate){
    // Set up parameters
    $to = $email;
    $subject = "Take Your Leave - Online Leave Management System";
    $message ="Hey ".$employeeName.", We are bad to say your leave has been rejected applied on ".$appliedDate." \n \n";
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
    $headers .= "From: $from";

// Send email
    mail($to,$subject,$message,$headers);
}

function sendMedicalRejectEmail($email,$employeeName,$leaveCount,$startDate,$endDate){
    // Set up parameters
    $to = $email;
    $subject = "Take Your Leave - Online Leave Management System";
    $message ="Hey ".$employeeName.", We are bad to say your leave has been rejected applied for ".$leaveCount."day leaves at ".$startDate." to ".$endDate." \n \n";
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
    $headers .= "From: $from";

// Send email
    mail($to,$subject,$message,$headers);
}

function sendCanceledEmail($email,$employeeName,$appliedDate){
    // Set up parameters
    $to = $email;
    $subject = "Take Your Leave - Online Leave Management System";
    $message ="Hey ".$employeeName.", Your leave has been canceled applied on ".$appliedDate." \n \n";
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
    $headers .= "From: $from";

// Send email
    mail($to,$subject,$message,$headers);
}