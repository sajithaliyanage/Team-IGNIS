<?php
include('../config/connect.php');
include ('xssValidation.php');
$pdo = connect();

$msgID = xss_clean($_POST['msgID']);

$smt = "UPDATE conversation SET seen=:log WHERE chat_id=:log2";
$query = $pdo->prepare($smt);
$query->execute(array('log'=>1,'log2'=>$msgID));

?>