<?php
require('textlocal.class.php');
$textlocal = new Textlocal('chandanisriyani57@gmail.com', '99f069463c44a34fbc6bc194a96e7867b0581c36');

function sendApprovedSMS($textlocal,$mobileNumber,$employeeName,$leaveCount,$startDate,$endDate){

    $numbers = array($mobileNumber);
    $sender = 'Take Your Leave';
    $message ="Hey ".$employeeName.", We are happy to say your manager has approved your ".$leaveCount."day leaves on ".$startDate." to ".$endDate." \n \n
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
    $message ="Hey ".$employeeName.", We are happy to say your manager has approved your medical for ".$leaveCount."day leaves at ".$startDate." to ".$endDate." \n \n
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