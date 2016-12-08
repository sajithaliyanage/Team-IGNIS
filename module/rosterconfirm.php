<?php
include('../controller/siteController.php');
include('../config/connect.php');
$pdo = connect();


$appliedShiftId = $_GET['shiftid'];

if ($_POST['submit'] == 'done') {

    $sql = "UPDATE shifting SET status=:log where shifting_id=:shiftId ";
    $query = $pdo->prepare($sql);
    $query->execute(array('log' => "approved",'shiftId' => $appliedShiftId,));
    header("Location:../view/site/roster.php?job=done");


} else if ($_POST['submit'] == 'reject') {
    echo 'reject';
    $sql = "UPDATE shifting SET status=:log where shifting_id=:shiftId ";
    $query = $pdo->prepare($sql);
    $query->execute(array('log' => "rejected",'shiftId' => $appliedShiftId,));
    header("Location:../view/site/roster.php?job=done");


}


?>