<?php
include('../config/connect.php');
include('../controller/siteController.php');
include('../module/xssValidation.php');
$pdo = connect();
include('../module/SendForgetEmail.php');

$email = xss_clean($_POST['companyID']);
try{
    $sql = "SELECT comp_id,password FROM employee WHERE email=:log";
    $query = $pdo->prepare($sql);
    $query->execute(array('log'=>$email));
    $result = $query->fetch();
    $numRow = $query->rowCount();
    $encode = md5($result['password']);

    if($numRow == 1){
        $val = sendEmail($email,$encode);
        if($val){
            header("Location:../view/layouts/checkYourEmail.php");
        }else{
            header("Location:../view/layouts/error.php");
        }

    }else{
        header("Location:../view/layouts/forget_password.php?fail");
    }

}catch(PDOException $e){
    header("Location:../view/layouts/error.php");
}
