<?php
include('../controller/siteController.php');
include('../config/connect.php');
include('../module/sendSMS.php');
include('../module/sendEmail.php');
$pdo = connect();

$action = $_POST['submit'];
$note = $_POST['note'];
$appliedEmployeeId = $_GET['empId'];
$appliedLeaveId = $_GET['app_leave_id'];

$sql0 = "SELECT * FROM employee join apply_leave on apply_leave.comp_id = employee.comp_id where employee.comp_id=:employeeID AND apply_leave.apply_leave_id=:leaveID";
$query0 = $pdo->prepare($sql0);
$query0->execute(array('employeeID'=>$appliedEmployeeId,'leaveID'=>$appliedLeaveId));
$result = $query0->fetch();

try{
    if($empRole=='manager'){
        if($action =='done'){
            $sql = "UPDATE apply_leave SET status=:log, medical_status=:medical where comp_id=:employeeID AND apply_leave_id=:apply_leave_id";
            $query = $pdo->prepare($sql);
            $query->execute(array('log'=>"approved", 'medical'=>"no",'employeeID'=>$appliedEmployeeId,'apply_leave_id'=>$appliedLeaveId));

            $sql = "SELECT leave_id,number_of_days FROM apply_leave where comp_id=:employeeID AND apply_leave_id=:apply_leave_id";
            $query = $pdo->prepare($sql);
            $query->execute(array('employeeID'=>$appliedEmployeeId,'apply_leave_id'=>$appliedLeaveId));
            $getLeaveID = $query->fetch();

            $intValLeaveId = intval($getLeaveID['leave_id']);
            $intNumOfDays = intval($getLeaveID['number_of_days']);

            $sql = "SELECT leave_count FROM employee_leave_count where comp_id=:employeeID AND leave_id=:leave_id";
            $query = $pdo->prepare($sql);
            $query->execute(array('employeeID'=>$appliedEmployeeId,'leave_id'=>$intValLeaveId));
            $getLeaveID = $query->fetch();

            $currentVal = intval($getLeaveID['leave_count']);
            $newVal = $currentVal - $intNumOfDays;

            $sql = "UPDATE employee_leave_count SET leave_count =:newCount where comp_id=:employeeID AND leave_id=:leave_id";
            $query = $pdo->prepare($sql);
            $query->execute(array('newCount'=>$newVal,'employeeID'=>$appliedEmployeeId,'leave_id'=>$intValLeaveId));


            $var1 = +94;
            $var2 = intval(substr($result['tel_no'],1));
            $mobileNumber = sprintf( "%d%d", $var1, $var2 );

            //send SMS for approved
            sendApprovedSMS($textlocal,$mobileNumber,$result['name'],$result['number_of_days'],$result['start_date'],$result['end_date']);
            //send email
            sendApprovedEmail($result['email'],$result['name'],$result['number_of_days'],$result['start_date'],$result['end_date']);

            header("Location:../view/site/confirm_leave.php?job=done");

        }else if($action =='reject'){
            $sql = "UPDATE apply_leave SET status=:log, special_note=:note where comp_id=:employeeID AND apply_leave_id=:apply_leave_id";
            $query = $pdo->prepare($sql);
            $query->execute(array('note'=>$note,'log'=>"rejected",'employeeID'=>$appliedEmployeeId,'apply_leave_id'=>$appliedLeaveId));

            $var1 = +94;
            $var2 = intval(substr($result['tel_no'],1));
            $mobileNumber = sprintf( "%d%d", $var1, $var2 );

            //send SMS for reject
            sendRejetSMS($textlocal,$mobileNumber,$result['name'],$result['apply_date']);
            //send email
            sendRejectEmail($result['email'],$result['name'],$result['apply_date']);

            header("Location:../view/site/confirm_leave.php?job=done");

        }else if($action == 'cancel'){

            $sql = "UPDATE apply_leave SET status=:log where comp_id=:employeeID AND apply_leave_id=:apply_leave_id";
            $query = $pdo->prepare($sql);
            $query->execute(array('log'=>"canceled",'employeeID'=>$appliedEmployeeId,'apply_leave_id'=>$appliedLeaveId));

            $var1 = +94;
            $var2 = intval(substr($result['tel_no'],1));
            $mobileNumber = sprintf( "%d%d", $var1, $var2 );

            //send SMS for reject
            sendCanceledSMS($textlocal,$mobileNumber,$result['name'],$result['apply_date']);
            //send email
            sendCanceledEmail($result['email'],$result['name'],$result['apply_date']);

            header("Location:../view/site/confirm_leave.php?job=done");

        }
    }else if($empRole=='executive'){
        if($action == 'done'){

            $sql = "UPDATE apply_leave SET status=:log where comp_id=:employeeID AND apply_leave_id=:apply_leave_id";
            $query = $pdo->prepare($sql);
            $query->execute(array('log'=>"recommended",'employeeID'=>$appliedEmployeeId,'apply_leave_id'=>$appliedLeaveId));

            header("Location:../view/site/confirm_leave.php?job=done");

        }else if($action == 'reject'){

            $sql = "UPDATE apply_leave SET status=:log,special_note=:note where comp_id=:employeeID AND apply_leave_id=:apply_leave_id";
            $query = $pdo->prepare($sql);
            $query->execute(array('note'=>$note,'log'=>"rejected",'employeeID'=>$appliedEmployeeId,'apply_leave_id'=>$appliedLeaveId));

            $var1 = +94;
            $var2 = intval(substr($result['tel_no'],1));
            $mobileNumber = sprintf( "%d%d", $var1, $var2 );

            //send SMS for reject
            //sendRejetSMS($textlocal,$mobileNumber,$result['name'],$result['apply_date']);
            //send email
            sendRejectEmail($result['email'],$result['name'],$result['apply_date']);

            header("Location:../view/site/confirm_leave.php?job=done");

        }else if($action == 'cancel'){


            $sql = "UPDATE apply_leave SET status=:log where comp_id=:employeeID AND apply_leave_id=:apply_leave_id";
            $query = $pdo->prepare($sql);
            $query->execute(array('log'=>"canceled",'employeeID'=>$appliedEmployeeId,'apply_leave_id'=>$appliedLeaveId));

            $var1 = +94;
            $var2 = intval(substr($result['tel_no'],1));
            $mobileNumber = sprintf( "%d%d", $var1, $var2 );

            //send SMS for reject
            sendCanceledSMS($textlocal,$mobileNumber,$result['name'],$result['apply_date']);
            //send email
            sendCanceledEmail($result['email'],$result['name'],$result['apply_date']);

            header("Location:../view/site/confirm_leave.php?job=done");

        }
    }

}catch (PDOException $e){
    header("Location : ../view/layouts/error.php");
}