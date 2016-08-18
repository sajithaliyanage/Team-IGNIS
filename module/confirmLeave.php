<?php
include('../controller/siteController.php');
include('../config/connect.php');
$pdo = connect();

$action = $_POST['submit'];
$note = $_POST['note'];
$appliedEmployeeId = $_GET['empId'];

try{
    if($empRole=='manager'){
        echo "hello";
    }else if($empRole=='executive'){
        if($action=='done'){
            $sql = "UPDATE apply_leave SET status=:log where comp_id=:employeeID";
            $query = $pdo->prepare($sql);
            $query->execute(array('log'=>"recommended",'employeeID'=>$appliedEmployeeId));

            header("Location:../view/site/confirm_leave.php?job=done");

        }else if($action='reject'){

        }else if($action = 'cancel'){

        }
    }

}catch (PDOException $e){
    header("Location : ../view/layouts/error.php");
}