<?php
$isLoggedin = false;
ini_set('session.cookie_httponly',true);

session_start();
$empName = null;
$empID = null;
$empRole = null;
$empImage = null;

if(isset($_SESSION['empID']) && !empty($_SESSION['empID'])) {
    $isLoggedin = true;
    $empName = $_SESSION['empName'];
    $empID = $_SESSION['empID'];
    $empRole = $_SESSION['empRole'];
    $empImage = $_SESSION['image'];

}

//Session Destroy in 60 seconds
//if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 60)) {
//    session_unset();
//    session_destroy();
//    header('Location:http://localhost/lms/Team-Ignis/index.php');
//}
//$_SESSION['LAST_ACTIVITY'] = time();
//


?>