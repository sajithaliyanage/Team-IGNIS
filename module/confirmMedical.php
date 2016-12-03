<?php
include('../controller/siteController.php');
include('../config/connect.php');
include('../module/sendSMS.php');
include('../module/sendEmail.php');
$pdo = connect();

//get post request from medicl upload form
$action = $_POST['submit'];
$appliedEmployeeId = $_GET['empId'];
$appliedMedId = $_GET['app_medical_id'];

$sqlQ = "SELECT apply_leave_id FROM medical_report where med_id=:medID";
$queryQ = $pdo->prepare($sqlQ);
$queryQ->execute(array('medID'=>$appliedMedId));
$resultQ = $queryQ->fetch();

$applyLeaveId = $resultQ['apply_leave_id'];

$sql0 = "SELECT * FROM employee join medical_report on medical_report.comp_id = employee.comp_id JOIN apply_leave ON apply_leave.apply_leave_id= medical_report.apply_leave_id where employee.comp_id=:employeeID AND medical_report.med_id=:med_id ";
$query0 = $pdo->prepare($sql0);
$query0->execute(array('employeeID'=>$appliedEmployeeId,'med_id'=>$appliedMedId));
$result = $query0->fetch();

try{
        if($action =='done'){
//            approve medicl
            $sql = "UPDATE medical_report SET status=:log where comp_id=:employeeID AND med_id=:apply_med_id";
            $query = $pdo->prepare($sql);
            $query->execute(array('log'=>"approved",'employeeID'=>$appliedEmployeeId,'apply_med_id'=>$appliedMedId));

            $sql = "UPDATE apply_leave SET medical_status=:log WHERE comp_id=:employeeID AND apply_leave_id=:apply_id ";
            $query = $pdo->prepare($sql);
            $query->execute(array('log'=>"done",'employeeID'=>$appliedEmployeeId,'apply_id'=>$applyLeaveId));

            //decrement medical leave count
            $sql = "SELECT leave_id FROM leave_type where leave_name=:lname";
            $query = $pdo->prepare($sql);
            $query->execute(array('lname'=>'Medical Leave'));
            $getMedID = $query->fetch();
            $intMedeId = $getMedID['leave_id'];

            $sql = "SELECT leave_count FROM employee_leave_count where comp_id=:employeeID AND leave_id=:leave_id";
            $query = $pdo->prepare($sql);
            $query->execute(array('employeeID'=>$appliedEmployeeId,'leave_id'=>$intMedeId));
            $getLeaveID = $query->fetch();

            $currentVal = intval($getLeaveID['leave_count']);
            $newVal = $currentVal - $intNumOfDays;

            if($newVal>0){
                $sql = "UPDATE employee_leave_count SET leave_count =:newCount where comp_id=:employeeID AND leave_id=:leave_id";
                $query = $pdo->prepare($sql);
                $query->execute(array('newCount'=>$newVal,'employeeID'=>$appliedEmployeeId,'leave_id'=>$intMedeId));

                //recover casual leave count
                $sql = "SELECT leave_id,number_of_days FROM apply_leave where comp_id=:employeeID AND apply_leave_id=:apply_leave_id";
                $query = $pdo->prepare($sql);
                $query->execute(array('employeeID'=>$appliedEmployeeId,'apply_leave_id'=>$applyLeaveId));
                $getLeaveID = $query->fetch();

                $intValLeaveId = intval($getLeaveID['leave_id']);
                $intNumOfDays = intval($getLeaveID['number_of_days']);

                $sql = "SELECT leave_count FROM employee_leave_count where comp_id=:employeeID AND leave_id=:leave_id";
                $query = $pdo->prepare($sql);
                $query->execute(array('employeeID'=>$appliedEmployeeId,'leave_id'=>$intValLeaveId));
                $getLeaveID = $query->fetch();

                $currentVal = intval($getLeaveID['leave_count']);
                $newVal = $currentVal + $intNumOfDays;

                $sql = "UPDATE employee_leave_count SET leave_count =:newCount where comp_id=:employeeID AND leave_id=:leave_id";
                $query = $pdo->prepare($sql);
                $query->execute(array('newCount'=>$newVal,'employeeID'=>$appliedEmployeeId,'leave_id'=>$intValLeaveId));
            }


            $var1 = +94;
            $var2 = intval(substr($result['tel_no'],1));
            $mobileNumber = sprintf( "%d%d", $var1, $var2 );

            //send SMS for approved
            //sendMedicalApprovedSMS($textlocal,$mobileNumber,$result['name'],$result['number_of_days'],$result['start_date'],$result['end_date']);
            //send email
            //sendMedicalApprovedEmail($result['email'],$result['name'],$result['number_of_days'],$result['start_date'],$result['end_date']);

            header("Location:../view/site/medicalUpload.php?job=done");

        }else if($action =='reject'){
//            reject leave
            $sql = "UPDATE medical_report SET status=:log where comp_id=:employeeID AND med_id=:apply_med_id";
            $query = $pdo->prepare($sql);
            $query->execute(array('log'=>"rejected",'employeeID'=>$appliedEmployeeId,'apply_med_id'=>$appliedMedId));

            $sql = "UPDATE apply_leave SET medical_status=:log WHERE comp_id=:employeeID AND apply_leave_id=:apply_id ";
            $query = $pdo->prepare($sql);
            $query->execute(array('log'=>"done",'employeeID'=>$appliedEmployeeId,'apply_id'=>$applyLeaveId));

            $var1 = +94;
            $var2 = intval(substr($result['tel_no'],1));
            $mobileNumber = sprintf( "%d%d", $var1, $var2 );

            //send SMS for reject
            sendMedicalRejetSMS($textlocal,$mobileNumber,$result['name'],$result['number_of_days'],$result['start_date'],$result['end_date']);
            //send email
            //sendMedicalRejectEmail($result['email'],$result['name'],$result['number_of_days'],$result['start_date'],$result['end_date']);

            header("Location:../view/site/medicalUpload.php?job=done");

        }
}catch (PDOException $e){
    header("Location : ../view/layouts/error.php");
}