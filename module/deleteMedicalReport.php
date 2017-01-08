<?php

include('../controller/siteController.php');
include('../config/connect.php');
$pdo = connect();

//post request data
$medID = $_GET['id'];
$leaveID = $_GET['leaveid'];

try{
//    delete medcal report
    $path = "../uploads/medicalReport/".$leaveID."/";
    array_map('unlink', glob("$path/*.*"));
    rmdir($path);

    $sql = "UPDATE apply_leave set medical_status=:log WHERE apply_leave_id=:leave_id";
    $query = $pdo->prepare($sql);
    $query->execute(array('log'=>"no",'leave_id'=>$leaveID));

    $sql = "DELETE FROM medical_report WHERE med_id=:lid";
    $query = $pdo->prepare($sql);
    $query->execute(array('lid'=>$medID));

    header("Location:../view/site/medicalUpload.php?delete=done");


}catch(PDOException $e){
    header("Location:../../view/layouts/error.php");
}


