<?php
include('../../../config/connect.php');
$pdo = connect();

$joc_cat_id = $_POST['job_cat'];
$joc_cat_level = $_POST['job_level'];
$leaveValues = $_POST['leave_type'];// Returns an array

try{
    $sql0 = "SELECT leave_id FROM leave_type";
    $query0 = $pdo->prepare($sql0);
    $query0->execute();
    $result0 = $query0->fetchAll();

    $sql = "INSERT INTO leave_set_job (job_cat_id,level_name) VALUES (:job_cat_id,:level_name)";
    $query = $pdo->prepare($sql);
    $query->execute(array('job_cat_id'=>$joc_cat_id,'level_name'=>$joc_cat_level));

    $last_set_job_id = $pdo->lastInsertId();

//    $sql = "INSERT INTO leave_set_job (set_id,job_cat_id,leave_count) VALUES (:set_id,IN :job_cat_id, IN :leave_count)";
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


