<?php

include('../../../controller/siteController.php');
include('../../../config/connect.php');
include ('../../../module/xssValidation.php');
$pdo = connect();

//post request data
$leaveID = xss_clean($_GET['id']);


try{
//    delete leave type
    $sql = "DELETE FROM leave_type WHERE leave_id=:lid";
    $query = $pdo->prepare($sql);
    $query->execute(array('lid'=>$leaveID));

    header("Location:../leavetypes.php?delete=done");


}catch(PDOException $e){
    header("Location:../../view/layouts/error.php");
}


