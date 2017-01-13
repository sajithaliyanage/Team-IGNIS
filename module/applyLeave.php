<?php
include('../config/connect.php');
include('../controller/siteController.php');
include('xssValidation.php');
$pdo = connect();

//leave post request
$leaveType = xss_clean($_POST['leave_type']);
$leavePriority = xss_clean($_POST['leave_priority']);
$startDate = xss_clean($_POST['start_date']);
$endDate = xss_clean($_POST['end_date']);
$numDays = xss_clean($_POST['numDays']);
$reason = xss_clean($_POST['reason']);
$todayDate = date("d/m/Y");


try {

    $date1 = DateTime::createFromFormat('d/m/Y', $startDate);
    $date2 = DateTime::createFromFormat('d/m/Y', $endDate);

    $flag = 1;
    $flag2 = 1;

    if (empty($startDate)) {
        $flag = 0;
    } else if (empty($endDate)) {
        $flag = 0;
    }else if (empty($numDays)) {
        $flag = 0;
    } else if (empty($reason)) {
        $flag = 0;
    } else if ($date1 > $date2) {
        $flag = 0;
    } else if (empty($reason)) {
        $flag = 0;
    } else if ($numDays == "Invalid") {
        $flag = 0;
    }else{
        $smt = "SELECT * FROM apply_leave WHERE comp_id=:empID AND (status =:log OR status =:log2 OR status =:log3 ) AND 
      (str_to_date('$startDate', '%d/%m/%Y') <= STR_TO_DATE(end_date,'%d/%m/%Y') 
    AND str_to_date('$endDate', '%d/%m/%Y') >= STR_TO_DATE(start_date, '%d/%m/%Y'))";
        $querySmt = $pdo->prepare($smt);
        $querySmt->execute(array('empID'=>$empID,'log'=>'approved','log2'=>'waiting','log3'=>'recommended'));
        $resultSmt = $querySmt->fetchAll();
        $leaveCount = $querySmt->rowCount();

        if($leaveCount > 0){
            $flag2 = 0;
        }
    }

    if ($flag == 0) {
        header("Location:../view/site/apply.php?invalid");

    }else if($flag2 == 0){
        header("Location:../view/site/apply.php?exists");

    }else{
        if ($empRole == 'executive' || $empRole == 'manager' || $empRole == 'admin') {

//            insert data to apply leave table
            $sql = "INSERT INTO apply_leave (comp_id,leave_id,leave_priority,apply_date,start_date,end_date,number_of_days,reason,status,recommandBy) VALUES
            (:comp_id,:leave_id,:leave_priority,:apply_date,:start_date,:end_date,:number_of_days,:reason,:status,:myID)";
            $query = $pdo->prepare($sql);
            $query->execute(array('comp_id' => $empID, 'leave_id' => $leaveType, 'leave_priority' => $leavePriority, 'apply_date' => $todayDate, 'start_date' => $startDate, 'end_date' => $endDate,
                'number_of_days' => $numDays, 'reason' => $reason, 'status' => "recommended", 'myID' => $empName));

            header("Location:../view/site/apply.php?job=done");

        } else {
            //            insert data to apply leave table
            $sql = "INSERT INTO apply_leave (comp_id,leave_id,leave_priority,apply_date,start_date,end_date,number_of_days,reason,status) VALUES
            (:comp_id,:leave_id,:leave_priority,:apply_date,:start_date,:end_date,:number_of_days,:reason,:status)";
            $query = $pdo->prepare($sql);
            $query->execute(array('comp_id' => $empID, 'leave_id' => $leaveType, 'leave_priority' => $leavePriority, 'apply_date' => $todayDate, 'start_date' => $startDate, 'end_date' => $endDate,
                'number_of_days' => $numDays, 'reason' => $reason, 'status' => "waiting"));

            header("Location:../view/site/apply.php?job=done");

        }
    }

} catch (PDOException $e) {
    //echo $e;
    header("Location:../view/layouts/error.php");
}