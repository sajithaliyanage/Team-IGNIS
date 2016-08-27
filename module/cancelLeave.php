<?php
include('../config/connect.php');
include('../controller/siteController.php');
$pdo = connect();

$action = $_POST['submit'];
$appliedLeaveId = $_GET['app_leave_id'];

try{
    if($action == 'cancel'){
        $sql = "UPDATE apply_leave SET status=:log where comp_id=:employeeID AND apply_leave_id=:apply_leave_id";
        $query = $pdo->prepare($sql);
        $query->execute(array('log'=>"canceled",'employeeID'=>$empID,'apply_leave_id'=>$appliedLeaveId));

        header("Location:../view/site/leave_status.php?job=done");
    }

}catch (PDOException $e){
    header("Location:../view/layouts/error.php");
}