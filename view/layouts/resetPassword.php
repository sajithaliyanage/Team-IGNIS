<?php
include('../../config/connect.php');
$pdo = connect();

$email = $_GET['email'];
$newpassword = $_POST['new_pswd'];
$confirmpasssword = $_POST['con_pswd'];

if ($newpassword == $confirmpasssword) {
    $pswd = password_hash($_POST['new_pswd'], PASSWORD_DEFAULT);

    $sqls = "UPDATE employee SET password=:newpassword where email=:empEmail";
    $querys = $pdo->prepare($sqls);
    $querys->execute(array('newpassword' => $pswd, 'empEmail' => $email));

    header('Location:../../index.php?success');
} else {
    header('Location:../../index.php?fail');
}

?>