<?php
include('../../../config/connect.php');
$pdo = connect();

//post request data
$leaveType = strtolower($_POST['leave_type']);
$leavePeriod = $_POST['leave_period'];

try{
//    create ne leave type for company
    $sql = "INSERT INTO leave_type (leave_name,leave_period,currentStatus) VALUES (:leaveType,:period,:ststus)";
    $query = $pdo->prepare($sql);
    $query->execute(array('leaveType'=>$leaveType,'period'=>$leavePeriod,'ststus'=>"waiting"));

    header("Location:../leavetypes.php?job=done");

}catch(PDOException $e){
    header("Location:../../layouts/error.php");
}


