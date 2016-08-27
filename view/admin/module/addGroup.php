<?php
include('../../../controller/siteController.php');
include('../../../config/connect.php');
$pdo = connect();

$deptID = $_POST['groups'];
$groupName = $_POST['group_name'];

try {
    $sql = "INSERT INTO group_detail(dept_id,group_name) VALUES (:depID,:groupName)";
    $query = $pdo->prepare($sql);
    $query->execute(array('depID' => $deptID,'groupName'=>$groupName));

    header("Location:../roster.php?group=done");

}catch(PDOException $e){
    header("Location:../../layouts/error.php");
}