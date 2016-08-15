<?php
include('../controller/siteController.php');
include('../config/connect.php');
$pdo = connect();

$recId = $_POST['receiverID'];
$message= $_POST['message'];
$dateSend = date('d/m/Y');

try{
    $sql="INSERT INTO conversation (sender_id,receiver_id,message,send_date) VALUES (:sender_id,:receiver_id,:message,:send_date)";
    $query =$pdo->prepare($sql);
    $query->execute(array('sender_id'=>$empID,'receiver_id'=>$recId,'message'=>$message,'send_date'=>$dateSend));

}catch(PDOException $e){
    header("Location:../view/layouts/error.php");
}

