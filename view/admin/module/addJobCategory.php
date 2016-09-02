<?php
include('../../../config/connect.php');
$pdo = connect();

//post request data
$catName = $_POST['job_category'];

try{
//    create new job category for company
    $sql = "INSERT INTO job_category (job_cat_name,currentStatus) VALUES (:catName,:ststus)";
    $query = $pdo->prepare($sql);
    $query->execute(array('catName'=>$catName,'ststus'=>"waiting"));

    header("Location:../jobcategory.php?job=done");

}catch(PDOException $e){
    header("Location:../../view/layouts/error.php");
}


