<?php
include('../config/connect.php');
$pdo = connect();

//director appovals
try{
    if(isset($_GET['depAccept'])){
        $depId = $_GET['depAccept'];

        $sql = "UPDATE department set currentStatus=:log WHERE dept_id=:d_id";
        $query = $pdo->prepare($sql);
        $query->execute(array('log'=>"approved",'d_id'=>$depId));

        header("Location:../view/site/director.php?depAdd=done");

    }else if(isset($_GET['depReject'])){
        $depId = $_GET['depReject'];

        $sql = "UPDATE department set currentStatus=:log WHERE dept_id=:d_id";
        $query = $pdo->prepare($sql);
        $query->execute(array('log'=>"rejected",'d_id'=>$depId));

        header("Location:../view/site/director.php?depRej=done");

    }else if(isset($_GET['jobAccept'])){
        $jobId = $_GET['jobAccept'];

        $sql = "UPDATE job_category set currentStatus=:log WHERE job_cat_id=:j_id";
        $query = $pdo->prepare($sql);
        $query->execute(array('log'=>"approved",'j_id'=>$jobId));

        header("Location:../view/site/director.php?jobAdd=done");

    }else if(isset($_GET['jobReject'])){
        $jobId = $_GET['jobReject'];

        $sql = "UPDATE job_category set currentStatus=:log WHERE job_cat_id=:j_id";
        $query = $pdo->prepare($sql);
        $query->execute(array('log'=>"rejected",'j_id'=>$jobId));

        header("Location:../view/site/director.php?jobRej=done");
    }else if(isset($_GET['leaveAccept'])){
        $leaveId = $_GET['leaveAccept'];

        $sql = "UPDATE leave_type set currentStatus=:log WHERE leave_id=:l_id";
        $query = $pdo->prepare($sql);
        $query->execute(array('log'=>"approved",'l_id'=>$leaveId));

        header("Location:../view/site/director.php?leaveAdd=done");

    }else if(isset($_GET['leaveReject'])){
        $leaveId = $_GET['leaveReject'];

        $sql = "UPDATE leave_type set currentStatus=:log WHERE leave_id=:l_id";
        $query = $pdo->prepare($sql);
        $query->execute(array('log'=>"rejected",'l_id'=>$leaveId));

        header("Location:../view/site/director.php?leaveRej=done");
    }




}catch (PDOException $e){
    header("Location:../view/layouts/error.php");
}