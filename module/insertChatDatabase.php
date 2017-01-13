<?php
include('../controller/siteController.php');
include('../config/connect.php');
$pdo = connect();
include ('xssValidation.php');

$recId = xss_clean($_POST['receiverID']);
$message= xss_clean($_POST['message']);
$dateSend = date('d/m/Y');

try{
//    insert chat data to conversation table
    $sql="INSERT INTO conversation (sender_id,receiver_id,message,send_date) VALUES (:sender_id,:receiver_id,:message,:send_date)";
    $query =$pdo->prepare($sql);
    $query->execute(array('sender_id'=>$empID,'receiver_id'=>$recId,'message'=>$message,'send_date'=>$dateSend));

}catch(PDOException $e){
    header("Location:../view/layouts/error.php");
}

