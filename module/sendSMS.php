<?php
require('textlocal.class.php');
$textlocal = new Textlocal('projectucsc16@gmail.com', '6c5b7ff3040eb9b44123faf6c6c8a35b8270b5cb');

function sendApprovedSMS($textlocal,$mobileNumber,$employeeName,$leaveCount,$startDate,$endDate){

    $numbers = array($mobileNumber);
    $sender = 'Take Your Leave';
    $message ="Hey ".$employeeName.", We are happy to inform that your ".$leaveCount."day leave request is being APPROVED for the time period from ".$startDate." to ".$endDate." \n \n
            - Take Your Leave";

    try {
        $result = $textlocal->sendSms($numbers, $message, $sender);
    } catch (Exception $e) {
        die('Error: ' . $e->getMessage());
    }
}

function sendMedicalApprovedSMS($textlocal,$mobileNumber,$employeeName,$leaveCount,$startDate,$endDate){

    $numbers = array($mobileNumber);
    $sender = 'Take Your Leave';
    $message ="Hey ".$employeeName.", We are happy to inform that your ".$leaveCount."day medical is being APPROVED for the time period from ".$startDate." to ".$endDate." \n \n
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
    $message ="Hey ".$employeeName.", we are regret to inform that your leave request is being REJECTED for the time period start on ".$appliedDate." \n \n
            - Take Your Leave";

    try {
        $result = $textlocal->sendSms($numbers, $message, $sender);
    } catch (Exception $e) {
        die('Error: ' . $e->getMessage());
    }
}

function sendMedicalRejetSMS($textlocal,$mobileNumber,$employeeName,$leaveCount,$startDate,$endDate){

$numbers = array($mobileNumber);
    $sender = 'Take Your Leave';
    $message ="Hey ".$employeeName.", We are bad to say your medical has been rejected applied for ".$leaveCount."day leaves at ".$startDate." to ".$endDate." \n \n
            - Take Your Leave";

    try {
        $result = $textlocal->sendSms($numbers, $message, $sender);
    } catch (Exception $e) {
        die('Error: ' . $e->getMessage());
    }
}

//function sendCanceledSMS($textlocal,$mobileNumber,$employeeName,$appliedDate){
//
//    $numbers = array($mobileNumber);
//    $sender = 'Take Your Leave';
//    $message = "Hey ".$employeeName.", Your leave has been canceled applied on ".$appliedDate." \n \n
//            - Take Your Leave";
//
//    try {
//        $result = $textlocal->sendSms($numbers, $message, $sender);
//    } catch (Exception $e) {
//        die('Error: ' . $e->getMessage());
//    }
//}

?>