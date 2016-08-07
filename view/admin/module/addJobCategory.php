<?php
include('../../../config/connect.php');
$pdo = connect();

$catName = $_POST['job_category'];

try{

    $sql = "INSERT INTO job_category (job_cat_name) VALUES (:catName)";
    $query = $pdo->prepare($sql);
    $query->execute(array('catName'=>$catName));

    header("Location:../jobcategory.php?job=done");

}catch(PDOException $e){
    header("Location:../../view/layouts/error.php");
}


