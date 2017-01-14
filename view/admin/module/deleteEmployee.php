<?php

include('../../../controller/siteController.php');
include('../../../config/connect.php');
include ('../../../module/xssValidation.php');
$pdo = connect();

//post request data
$empID = xss_clean($_GET['id']);


try{
//    delete user
    $sql = "DELETE FROM employee WHERE comp_id=:lid";
    $query = $pdo->prepare($sql);
    $query->execute(array('lid'=>$empID));

    header("Location:../allEmployee.php?delete=done");


}catch(PDOException $e){
    header("Location:../../view/layouts/error.php");
}


