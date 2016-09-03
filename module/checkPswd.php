<?php
include('../controller/siteController.php');
include('../config/connect.php');

$pdo = connect();

$password=$_GET['q'];

$sql = "SELECT password FROM employee where comp_id=:empID";
$query = $pdo->prepare($sql);
$query->execute(array('empID'=>$empID));
$result = $query->fetch();

try{
    //check passswrd ar equal or not
    if($result["password"]==$password) {
        echo "<font color=\"green\">Password match</font>!";

    }else{
        echo "<font color=\"green\">Provide valid password</font>!";
    }


}catch (PDOException $e){
    header("Location : ../view/layouts/error.php");
}