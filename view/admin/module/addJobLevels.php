<?php
include('../../../config/connect.php');
$pdo = connect();

$levelname = $_POST['level_name'];

try{

    $sql = "INSERT INTO job_level (level_name) VALUES (:catName)";
    $query = $pdo->prepare($sql);
    $query->execute(array('catName'=>$levelname));

    header("Location:../jobcategory.php?job1=done");

}catch(PDOException $e){
    header("Location:../../view/layouts/error.php");
}


