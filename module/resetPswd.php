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
    //check passswrd ar equal or not
    if($result["password"]==$curPswd) {
        if ($newPswd == $conPswd) {
            $sql = "UPDATE employee SET password=:newPswd where comp_id=:empID ";
            $query = $pdo->prepare($sql);
            $query->execute(array('newPswd' => $newPswd, 'empID' => $empID));
<<<<<<< HEAD
            header( 'Location:../view/site/profile.php?success' ) ;
        }else{
            header("Location : ../view/layouts/error.php");
=======
            header( 'Location:../view/site/profile.php?changed' ) ;
>>>>>>> f519d160d7dd645ba88db712778ed08664208d43
        }
    }

}catch (PDOException $e){
    header("Location : ../view/layouts/error.php");
}