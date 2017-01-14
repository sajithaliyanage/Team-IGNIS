<?php

include('../../../controller/siteController.php');
include('../../../config/connect.php');
include ('../../../module/xssValidation.php');
$pdo = connect();

//post request data
$depID = xss_clean($_GET['id']);


try{
//    delete leave type
    $sql = "DELETE FROM department WHERE dept_id=:lid";
    $query = $pdo->prepare($sql);
    $query->execute(array('lid'=>$depID));

    header("Location:../department.php?delete=done");


}catch(PDOException $e){
    header("Location:../../view/layouts/error.php");
}


