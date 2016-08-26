<?php
include('../controller/siteController.php');
include('../config/connect.php');
$pdo = connect();

$empName = $_POST['emp_name'];
$empEmail = $_POST['emp_email'];
$empTel = $_POST['emp_tele'];
$empJob = $_POST['emp_category'];
$empLevel = $_POST['emp_level'];

try{
    $sql = "UPDATE employee SET name=:empName,email=:empEmail,tel_no=:empTel,job_cat_id=:empJob,emp_level=:empLevel WHERE comp_id=:empID";
    $query = $pdo->prepare($sql);
    $query->execute(array('empID'=>$empID));


    header("Location:../view/site/editProfile.php?job=done");

}catch(PDOException $e){
    echo $e;
}


