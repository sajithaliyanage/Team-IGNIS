<?php
require('textlocal.class.php');
$textlocal = new Textlocal('chandanisriyani57@gmail.com', '99f069463c44a34fbc6bc194a96e7867b0581c36');

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