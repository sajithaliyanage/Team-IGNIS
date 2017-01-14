<?php
include('../../../config/connect.php');
include ('../../../module/xssValidation.php');
$pdo = connect();

//post request data
$catName = xss_clean($_POST['job_category']);

$smt = "SELECT job_cat_name FROM job_category where job_cat_name =:log AND (currentStatus =:log1 OR currentStatus=:log2) ";
$query = $pdo->prepare($smt);
$query->execute(array('log'=>$catName,'log1'=>"approved",'log2'=>'waiting'));
$result = $query->fetch();
$rownum = $query->rowCount();


$flag=1;
if (empty($catName)) {
    $flag = 0;
}else if($rownum>0){
    $flag = 0;

}

if($flag==1){


    try {
//    create new job category for company
        $sql = "INSERT INTO job_category (job_cat_name,currentStatus) VALUES (:catName,:ststus)";
        $query = $pdo->prepare($sql);
        $query->execute(array('catName' => $catName, 'ststus' => "waiting"));

        header("Location:../jobcategory.php?job=done");

    } catch (PDOException $e) {
        header("Location:../../view/layouts/error.php");
    }
}
else{
    header("Location:../jobcategory.php?jobCaterror");
}


