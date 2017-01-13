<?php
include('../../../config/connect.php');
include ('../../../module/xssValidation.php');
$pdo = connect();

//post request data
$deptName = xss_clean($_POST['dept_name']);
$deptColor = xss_clean($_POST['dept_color']);
$rosterStatus = xss_clean($_POST['roster_status']);

try{
//    insert new dept to department table
    $sql = "INSERT INTO department (dept_name,dept_color,roster_status,currentStatus) VALUES (:deptName,:deptColor,:rosterStatus,:status)";
    $query = $pdo->prepare($sql);
    $query->execute(array('deptName'=>$deptName." Department",'deptColor'=>$deptColor,'rosterStatus'=>$rosterStatus,'status'=>"waiting"));

    header("Location:../department.php?job=done");

}catch(PDOException $e){
    //echo $e;
    header("Location:../../layouts/error.php");
}


