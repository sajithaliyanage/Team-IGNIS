<?php

include('../../../controller/siteController.php');
include('../../../config/connect.php');
include ('../../../module/xssValidation.php');
$pdo = connect();

//post request data
$jobID = xss_clean($_GET['id']);


try{
//    delete leave type
    $sql = "DELETE FROM job_level WHERE level_id=:lid";
    $query = $pdo->prepare($sql);
    $query->execute(array('lid'=>$jobID));

    header("Location:../jobcategory.php?delete1=done");


}catch(PDOException $e){
    header("Location:../../view/layouts/error.php");
}


