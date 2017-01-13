<?php

include('../../../config/connect.php');
include('../../../controller/siteController.php');
$pdo = connect();

if (isset($_GET['q'])){
    $q =$_GET['q'];

    $smt = "SELECT comp_id FROM employee where comp_id =:log";
    $query = $pdo->prepare($smt);
    $query->execute(array('log'=>$q));
    $result = $query->fetchAll();
    $rownum = $query->rowCount();
    //print_r($rownum)

    if($rownum !== 0){
        echo "ID already exist!!!";
    }
    

}
?>




