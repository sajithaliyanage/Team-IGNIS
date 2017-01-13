<?php
include('../controller/siteController.php');
include('../config/connect.php');
include ('xssValidation.php');
$pdo = connect();

//get post request data from edit form
$empName = xss_clean($_POST['emp_name']);
$empEmail = xss_clean($_POST['emp_email']);
$empTel = xss_clean($_POST['emp_tele']);

try{
//    edit employee details
    $sql = "UPDATE employee SET name=:empName,email=:empEmail,tel_no=:empTel WHERE comp_id=:empID";
    $query = $pdo->prepare($sql);
    $query->execute(array('empName'=>$empName,'empEmail'=>$empEmail,'empTel'=>$empTel,'empID'=>$empID));


    header("Location:../view/site/profile.php?job=done");

}catch(PDOException $e){
    echo $e;
}


