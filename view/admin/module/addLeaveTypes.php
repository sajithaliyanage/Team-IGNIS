<?php
include('../../../config/connect.php');
$pdo = connect();

$leaveType = $_POST['leave_type'];

try{

    $sql = "INSERT INTO leave_type (leave_name) VALUES (:leaveType)";
    $query = $pdo->prepare($sql);
    $query->execute(array('leaveType'=>$leaveType));

    header("Location:../leavetypes.php?job=done");

}catch(PDOException $e){
    header("Location:../../view/layouts/error.php");
}


