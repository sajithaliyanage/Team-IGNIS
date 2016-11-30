<?php

include('../../../controller/siteController.php');
include('../../../config/connect.php');
$pdo = connect();

//post request data
$catID = $_POST['catid'];
$levelID = $_POST['levelid'];


try{
    $sql = "SELECT set_id FROM leave_set_job where job_cat_id=:lop AND level_id=:lop2";
    $query = $pdo->prepare($sql);
    $query->execute(array('lop'=>$catID,'lop2'=>$levelID));
    $result = $query->fetch();
    $setID = $result['set_id'];
//    delete leave type
    $sql = "DELETE FROM leave_set_job WHERE set_id=:lid";
    $query = $pdo->prepare($sql);
    $query->execute(array('lid'=>$setID));

    $sql = "DELETE FROM leave_count_details WHERE set_id=:lid";
    $query = $pdo->prepare($sql);
    $query->execute(array('lid'=>$setID));

    header("Location:../setleaves.php?delete=done");


}catch(PDOException $e){
    header("Location:../../view/layouts/error.php");
}


