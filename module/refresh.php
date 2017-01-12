<?php
include('../controller/siteController.php');
include('../config/connect.php');
include ('xssValidation.php');
$pdo = connect();

$recId = xss_clean($_POST['receiverID']);

try{
    $sql="SELECT * FROM conversation WHERE (receiver_id=:receiver_id and sender_id=:sender_id) or (receiver_id=:sender_id and sender_id=:receiver_id)";
    $query =$pdo->prepare($sql);
    $query->execute(array('sender_id'=>$empID,'receiver_id'=>$recId));
    $result = $query->fetchAll();

    echo json_encode($result);

}catch(PDOException $e){
    header("Location:../view/layouts/error.php");
}

