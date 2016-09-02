<?php
include('../controller/siteController.php');
include('../config/connect.php');

$pdo = connect();

$curPswd = $_POST['cur_pswd'];
$newPswd = $_POST['new_pswd'];
$conPswd = $_POST['con_pswd'];

$sql = "SELECT password FROM employee where comp_id=:empID";
$query = $pdo->prepare($sql);
$query->execute(array('empID'=>$empID));
$result = $query->fetch();

try{
    if($result["password"]==$curPswd) {
        if ($newPswd == $conPswd) {
            $sql = "UPDATE employee SET password=:newPswd where comp_id=:empID ";
            $query = $pdo->prepare($sql);
            $query->execute(array('newPswd' => $newPswd, 'empID' => $empID));
            header( 'Location:../view/site/profile.php?success' ) ;
        }else{
            header("Location : ../view/layouts/error.php");
        }
    }

}catch (PDOException $e){
    header("Location : ../view/layouts/error.php");
}