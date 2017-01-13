<?php
include('../../../config/connect.php');
include('../../../controller/siteController.php');
$pdo = connect();

if (isset($_GET['q'])){
    $q =$_GET['q'];

    $smt = "SELECT leave_name FROM leave_type where leave_name =:log";
    $query = $pdo->prepare($smt);
    $query->execute(array('log'=>$q));
    $result = $query->fetchAll();
    $rownum = $query->rowCount();


    if($rownum !== 0){
        echo "Leave Type  already exist!!!";
    }
}

?>