<?php

include('../../../controller/siteController.php');
include('../../../config/connect.php');
$pdo = connect();

//post request data
$depID = $_GET['id'];


try{
//    delete leave type
    $sql = "DELETE FROM department WHERE dept_id=:lid";
    $query = $pdo->prepare($sql);
    $query->execute(array('lid'=>$depID));

    header("Location:../department.php?delete=done");


}catch(PDOException $e){
    header("Location:../../view/layouts/error.php");
}


