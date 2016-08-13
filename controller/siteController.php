<?php
$isLoggedin = false;
ini_set('session.cookie_httponly',true);

session_start();
$empName = null;
$empID = null;
$empRole = null;

if(isset($_SESSION['empID']) && !empty($_SESSION['empID'])) {
    $isLoggedin = true;
    $empName = $_SESSION['empName'];
    $empID = $_SESSION['empID'];
    $empRole = $_SESSION['empRole'];
}

//if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 60)) {
//    session_unset();
//    session_destroy();
//}
//$_SESSION['LAST_ACTIVITY'] = time();

?>