<?php

include('../../../controller/siteController.php');
include('../../../config/connect.php');
include ('../../../module/xssValidation.php');
$pdo = connect();

//post request data
$depID = xss_clean($_GET['id']);
$dName = xss_clean($_POST['deptName']);
$dColor = xss_clean($_POST['dept_color']);
$dStatus = xss_clean($_POST['dept_status']);


try{
//    delete leave type
    $sql = "UPDATE department SET dept_name=:lop, dept_color=:lop2,roster_status=:lop3 WHERE dept_id=:lid";
    $query = $pdo->prepare($sql);
    $query->execute(array('lid'=>$depID ,'lop'=>$dName,'lop2'=>$dColor,'lop3'=>$dStatus));

    header("Location:../department.php?edit=done");


}catch(PDOException $e){
    header("Location:../../view/layouts/error.php");
}


