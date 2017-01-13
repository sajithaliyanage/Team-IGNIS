<?php
include('../../../config/connect.php');
include('../../../controller/siteController.php');
$pdo = connect();

if (isset($_GET['p'])) {
    $JobCat = $_GET['p'];

    $smt = "SELECT job_cat_name FROM job_category where job_cat_name =:log AND (currentStatus =:log1 OR currentStatus=:log2) ";
    $query = $pdo->prepare($smt);
    $query->execute(array('log'=>$JobCat,'log1'=>"approved",'log2'=>'waiting'));
    $result = $query->fetch();
    $rownum = $query->rowCount();

    if($rownum>0){
        echo"This Job Category is already exists";
    }
}
if (isset($_GET['q'])) {
    $JobLevel = $_GET['q'];

    $smt = "SELECT level_name FROM job_level where level_name =:log";
    $query = $pdo->prepare($smt);
    $query->execute(array('log'=>$JobLevel));
    $result = $query->fetch();
    $rownum = $query->rowCount();

    if($rownum!=0){
        echo"This Job Level is already exists";
    }
}
?>