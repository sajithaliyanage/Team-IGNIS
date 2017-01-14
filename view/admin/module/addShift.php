<?php
include('../../../controller/siteController.php');
include('../../../config/connect.php');
include ('../../../module/xssValidation.php');
$pdo = connect();

//post request data
$deptID = xss_clean($_POST['dept_id']);
$shiftName = xss_clean($_POST['shift_name']);
$start_time = xss_clean($_POST['start_time']);
$end_time = xss_clean($_POST['end_time']);

try {
//    create new shift for roster department
    $sql = "INSERT INTO shift_type(shift_name,start_time,end_time) VALUES (:shiftName,:start,:ends)";
    $query = $pdo->prepare($sql);
    $query->execute(array('shiftName'=>$shiftName,'start'=>$start_time,'ends'=>$end_time));

    header("Location:../roster.php?shift=done");

}catch(PDOException $e){
    header("Location:../../layouts/error.php");
}