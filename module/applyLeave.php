<?php
include('../config/connect.php');
include('../controller/siteController.php');
$pdo = connect();

$leaveType = $_POST['leave_type'];
$leavePriority = $_POST['leave_priority'];
$startDate = $_POST['start_date'];
$endDate = $_POST['end_date'];
$numDays = $_POST['numDays'];
$reason = $_POST['reason'];
$todayDate = date("d/m/Y");

try{
    if($empRole == 'executive' || $empRole == 'manager'){
        $sql = "INSERT INTO apply_leave (comp_id,leave_id,leave_priority,apply_date,start_date,end_date,number_of_days,reason,status,recommandBy) VALUES
            (:comp_id,:leave_id,:leave_priority,:apply_date,:start_date,:end_date,:number_of_days,:reason,:status,:myID)";
        $query = $pdo->prepare($sql);
        $query->execute(array('comp_id'=>$empID,'leave_id'=>$leaveType,'leave_priority'=>$leavePriority,'apply_date'=>$todayDate,'start_date'=>$startDate,'end_date'=>$endDate,
            'number_of_days'=>$numDays,'reason'=>$reason,'status'=>"recommended",'myID'=>$empName));
    }else{
        $sql = "INSERT INTO apply_leave (comp_id,leave_id,leave_priority,apply_date,start_date,end_date,number_of_days,reason,status) VALUES
            (:comp_id,:leave_id,:leave_priority,:apply_date,:start_date,:end_date,:number_of_days,:reason,:status)";
        $query = $pdo->prepare($sql);
        $query->execute(array('comp_id'=>$empID,'leave_id'=>$leaveType,'leave_priority'=>$leavePriority,'apply_date'=>$todayDate,'start_date'=>$startDate,'end_date'=>$endDate,
            'number_of_days'=>$numDays,'reason'=>$reason,'status'=>"waiting"));

    }

    header("Location:../view/site/apply.php?job=done");

}catch (PDOException $e){
    header("Location:../view/layouts/error.php");
}