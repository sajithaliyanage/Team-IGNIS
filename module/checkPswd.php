<?php
include('../controller/siteController.php');
include('../config/connect.php');
include ('xssValidation.php');

$pdo = connect();

$password=xss_clean($_GET['q']);

$sql = "SELECT password FROM employee where comp_id=:empID";
$query = $pdo->prepare($sql);
$query->execute(array('empID'=>$empID));
$result = $query->fetch();

try{
    //check passswrd is equal or not with existing password
    if($result["password"]==$password) {
        echo "<font color=\"green\">Password matches</font>!";

    }else{
        echo "<font color=\"red\">Provide existing password</font>!";
    }


}catch (PDOException $e){
    header("Location : ../view/layouts/error.php");
}