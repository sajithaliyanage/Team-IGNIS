<?php
include('../../../config/connect.php');
include ('../../../module/xssValidation.php');
$pdo = connect();

//post request data
$levelname = xss_clean($_POST['level_name']);

$smt = "SELECT level_name FROM job_level where level_name =:log";
$query = $pdo->prepare($smt);
$query->execute(array('log'=>$levelname));
$result = $query->fetch();
$rownum = $query->rowCount();

$flag=1;
if (empty($levelname)) {
    $flag = 0;
}else if($rownum>0){
    $flag = 0;

}

if($flag==1) {
    try {
//    create new job level for company
        $sql = "INSERT INTO job_level (level_name) VALUES (:catName)";
        $query = $pdo->prepare($sql);
        $query->execute(array('catName' => $levelname));

        header("Location:../jobcategory.php?job1=done");

    } catch (PDOException $e) {
        header("Location:../../view/layouts/error.php");
    }
}
else{
    header("Location:../jobcategory.php?jobLevelerror");
}


