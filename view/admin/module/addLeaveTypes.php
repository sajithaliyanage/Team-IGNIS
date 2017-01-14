<?php
include('../../../config/connect.php');
include ('../../../module/xssValidation.php');
$pdo = connect();

//post request data
$leaveType = xss_clean(strtolower($_POST['leave_type']));
$leavePeriod = xss_clean($_POST['leave_period']);

$smt = "SELECT leave_name FROM leave_type where leave_name =:log";
$query = $pdo->prepare($smt);
$query->execute(array('log'=>$leaveType));
$result = $query->fetchAll();
$rownum = $query->rowCount();

$flag = 1;
$flag1 = 1;

if (empty($leaveType)){
    $flag = 0;
}else if ($rownum != 0){
    $flag1 = 0;
}



try{
    if ($flag == 1 & $flag1 == 1) {
//    create ne leave type for company
        $sql = "INSERT INTO leave_type (leave_name,leave_period,currentStatus) VALUES (:leaveType,:period,:ststus)";
        $query = $pdo->prepare($sql);
        $query->execute(array('leaveType' => $leaveType, 'period' => $leavePeriod, 'ststus' => "waiting"));

        header("Location:../leavetypes.php?job=done");
    }else
        header("Location:../leavetypes.php?error");

}
catch(PDOException $e){
    header("Location:../../layouts/error.php");
}


