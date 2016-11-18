<?php
include('../../../controller/siteController.php');
include('../../../config/connect.php');
$pdo = connect();

//post request data
$deptID = $_POST['dept_id'];
$shiftName = $_POST['shift_name'];
$start_time = $_POST['start_time'];
$end_time = $_POST['end_time'];

try {
//    create new shift for roster department
    $sql = "INSERT INTO shift_type(shift_name,start_time,end_time) VALUES (:shiftName,:start,:ends)";
    $query = $pdo->prepare($sql);
    $query->execute(array('shiftName'=>$shiftName,'start'=>$start_time,'ends'=>$end_time));

    header("Location:../roster.php?shift=done");

}catch(PDOException $e){
    header("Location:../../layouts/error.php");
}