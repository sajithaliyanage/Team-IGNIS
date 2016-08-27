<?php
include('../../../controller/siteController.php');
include('../../../config/connect.php');
$pdo = connect();

$deptID = $_POST['dept_id'];
$shiftName = $_POST['shift_name'];
$start_time = $_POST['start_time'];
$end_time = $_POST['end_time'];

try {
    $sql = "INSERT INTO shift_type(dept_id,shift_name,start_time,end_time) VALUES (:depID,:shiftName,:start,:ends)";
    $query = $pdo->prepare($sql);
    $query->execute(array('depID' => $deptID,'shiftName'=>$shiftName,'start'=>$start_time,'ends'=>$end_time));

    header("Location:../roster.php?shift=done");

}catch(PDOException $e){
    header("Location:../../layouts/error.php");
}