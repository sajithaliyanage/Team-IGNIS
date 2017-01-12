<?php
include('../config/connect.php');
include('../controller/siteController.php');
include ('xssValidation.php');
$pdo = connect();

$action = xss_clean($_POST['submit']);
$appliedLeaveId = xss_clean($_GET['app_leave_id']);

try{
    if($action == 'cancel'){

        //recover casual leave count
        $sql = "SELECT leave_id,number_of_days FROM apply_leave where comp_id=:employeeID AND apply_leave_id=:apply_leave_id";
        $query = $pdo->prepare($sql);
        $query->execute(array('employeeID'=>$empID,'apply_leave_id'=>$appliedLeaveId));
        $getLeaveID = $query->fetch();

        $intValLeaveId = intval($getLeaveID['leave_id']);
        $intNumOfDays = intval($getLeaveID['number_of_days']);
        echo  $intNumOfDays;
        $sql = "SELECT leave_count FROM employee_leave_count where comp_id=:employeeID AND leave_id=:leave_id";
        $query = $pdo->prepare($sql);
        $query->execute(array('employeeID'=>$empID,'leave_id'=>$intValLeaveId));
        $getLeaveID = $query->fetch();

        $currentVal = intval($getLeaveID['leave_count']);
        $newVal = $currentVal + $intNumOfDays;

        $sql = "UPDATE employee_leave_count SET leave_count =:newCount where comp_id=:employeeID AND leave_id=:leave_id";
        $query = $pdo->prepare($sql);
        $query->execute(array('newCount'=>$newVal,'employeeID'=>$empID,'leave_id'=>$intValLeaveId));

        $sql = "UPDATE apply_leave SET status=:log where comp_id=:employeeID AND apply_leave_id=:apply_leave_id";
        $query = $pdo->prepare($sql);
        $query->execute(array('log'=>"canceled",'employeeID'=>$empID,'apply_leave_id'=>$appliedLeaveId));

        header("Location:../view/site/leave_status.php?job=done");
    }

}catch (PDOException $e){
    header("Location:../view/layouts/error.php");
}