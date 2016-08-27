<?php
include('../controller/siteController.php');
include('../config/connect.php');
$pdo = connect();

$empName = $_POST['emp_name'];
$empEmail = $_POST['emp_email'];
$empTel = $_POST['emp_tele'];

try{
    $sql = "UPDATE employee SET name=:empName,email=:empEmail,tel_no=:empTel WHERE comp_id=:empID";
    $query = $pdo->prepare($sql);
    $query->execute(array('empName'=>$empName,'empEmail'=>$empEmail,'empTel'=>$empTel,'empID'=>$empID));


    header("Location:../view/site/profile.php?job=done");

}catch(PDOException $e){
    echo $e;
}


