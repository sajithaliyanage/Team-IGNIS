<?php
include('../config/connect.php');
include ('xssValidation.php');
$pdo = connect();

$appLeaveID = xss_clean($_POST['leaveID']);

$smt = "UPDATE apply_leave SET seen=:log WHERE apply_leave_id=:log2";
$query = $pdo->prepare($smt);
$query->execute(array('log'=>1,'log2'=>$appLeaveID));

?>