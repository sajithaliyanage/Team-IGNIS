<?php

include('../../../controller/siteController.php');
include('../../../config/connect.php');
include ('../../../module/xssValidation.php');
$pdo = connect();

//post request data
$jobID = xss_clean($_GET['id']);


try{
//    delete leave type
    $sql = "DELETE FROM job_category WHERE job_cat_id=:lid";
    $query = $pdo->prepare($sql);
    $query->execute(array('lid'=>$jobID));

    header("Location:../jobcategory.php?delete=done");


}catch(PDOException $e){
    header("Location:../../view/layouts/error.php");
}


