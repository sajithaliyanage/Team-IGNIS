<?php
include('../../../config/connect.php');
include ('../../../module/xssValidation.php');
$pdo = connect();

//post request data
$joc_cat_id = xss_clean($_POST['job_cat']);
$joc_cat_level_id = xss_clean($_POST['job_level']);
$leaveValues =xss_clean( $_POST['leave_type']);// Returns an array

try{
//    select leave id
    $sql0 = "SELECT leave_id FROM leave_type";
    $query0 = $pdo->prepare($sql0);
    $query0->execute();
    $result0 = $query0->fetchAll();


    $sql = "INSERT INTO leave_set_job (job_cat_id,level_id) VALUES (:job_cat_id,:level_id)";
    $query = $pdo->prepare($sql);
    $query->execute(array('job_cat_id'=>$joc_cat_id,'level_id'=>$joc_cat_level_id));

    $last_set_job_id = $pdo->lastInsertId();

//    set leave count related to job category and job level
    $sql2="";
    $expo = array();
    $count = 0;
    foreach($leaveValues as $number){

        $sql2 .="INSERT INTO leave_count_details(set_id,leave_id,leave_count)VALUES(?,?,?);";
        array_push($expo,$last_set_job_id);
        array_push($expo,$result0[$count][0]);
        array_push($expo,$number);
        $count++;
    }
    $query2 = $pdo->prepare($sql2);
    $query2->execute($expo);

    header("Location:../setleaves.php?job=done");

}catch(PDOException $e){
    //echo $e;
    header("Location:../../layouts/error.php");
}


