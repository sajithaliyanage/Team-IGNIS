<?php
require('textlocal.class.php');
$textlocal = new Textlocal('athulaliyanage54@gmail.com', '8d483106caefb0c90a887699a4acbb82eb5d6170');

function sendApprovedSMS($textlocal,$mobileNumber,$employeeName,$leaveCount,$startDate,$endDate){

    $numbers = array($mobileNumber);
    $sender = 'Take Your Leave';
    $message ="Hey ".$employeeName.", We are happy to say your Manager has approved your ".$leaveCount."day leaves on ".$startDate." to ".$endDate." \n \n
            - Take Your Leave";

    try {
        $result = $textlocal->sendSms($numbers, $message, $sender);
    } catch (Exception $e) {
        die('Error: ' . $e->getMessage());
    }
}

function sendRejetSMS($textlocal,$mobileNumber,$employeeName,$appliedDate){

    $numbers = array($mobileNumber);
    $sender = 'Take Your Leave';
    $message ="Hey ".$employeeName.", We are bad to say your leave has been rejected applied on ".$appliedDate." \n \n
            - Take Your Leave";

    try {
        $result = $textlocal->sendSms($numbers, $message, $sender);
    } catch (Exception $e) {
        die('Error: ' . $e->getMessage());
    }
}

function sendCanceledSMS($textlocal,$mobileNumber,$employeeName,$appliedDate){

    $numbers = array($mobileNumber);
    $sender = 'Take Your Leave';
    $message = "Hey ".$employeeName.", Your leave has been canceled applied on ".$appliedDate." \n \n
            - Take Your Leave";

    try {
        $result = $textlocal->sendSms($numbers, $message, $sender);
    } catch (Exception $e) {
        die('Error: ' . $e->getMessage());
    }
}

?>