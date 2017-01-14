<?php
include('../../../config/connect.php');
include('../../../controller/siteController.php');
$pdo = connect();

if(isset($_GET['q7'])){
    $group=$_GET['q7'];

    $smt = "SELECT group_name FROM group_detail where group_name =:log";
    $query = $pdo->prepare($smt);
    $query->execute(array('log'=>$group));
    $result = $query->fetchAll();
    $rownum = $query->rowCount();

    if($rownum!=0){

        echo "This Group is already exisits";

    }






}



?>